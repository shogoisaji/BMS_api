<?php

namespace App\Http\Controllers;

use App\Models\StockBook;
use Illuminate\Http\Request;

class StockBookController extends Controller
{
    // main page
    public function list()
    {
        $stockBooks = StockBook::paginate(10);

        return response()->json(['stock_books' => $stockBooks], 200);
    }

    public function detail($id)
    {
        $stockBook = StockBook::with(['comments.user',  'rentals'])->find($id);

        if ($stockBook) {
            return response()->json(['stock_book' => $stockBook], 200);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        $book = $client->searchBook($request->isbn);
        $stockBook = new StockBook();
        $stockBook->title = $book[0]->volumeInfo->title ?? 'no title';
        $stockBook->author = $book[0]->volumeInfo->authors[0] ?? 'null';
        $stockBook->isbn = $book[0]->volumeInfo->industryIdentifiers[1]->identifier ?? '1234567891012';
        $stockBook->image = $book[0]->volumeInfo->imageLinks->thumbnail ?? null;
        $stockBook->save();

        return response()->json(['success' => 'Book registered successfully'], 201);
    }

    public function return($id)
    {
        // StockBook Model save table
        $stockBook = StockBook::find($id);
        if ($stockBook) {
            $stockBook->is_rental = false;
            $stockBook->save();

            // Rental Model save table
            $rental = \App\Models\Rental::where('stock_book_id', $id)->latest('created_at')->first();
            if ($rental) {
                $rental->returned_date = now();
                $rental->save();
            }

            return response()->json(['success' => 'Book returned successfully'], 200);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }
}