<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\StockBook;
use Auth;
use Illuminate\Http\Request;

class RentalBookController extends Controller
{
    public function rental(Request $request)
    {
        $stockBook = StockBook::find($request);
        if ($stockBook->is_rental) {
            return response()->json(['error' => 'This book is already rented.'], 400);
        }

        // Rental Model save table
        $rental = new Rental;
        $rental->user_id = auth()->id();
        $rental->stock_book_id = $stockBook->stock_book_id;
        $rental->rental_date = now();
        $rental->return_date = now()->addDays(7);
        $rental->save();

        // StockBook Model save table
        $stockBook->is_rental = true;
        $stockBook->save();

        return response()->json(['success' => 'The book has been rented.'], 200);
    }

// login user rental history list
    public function list()
    {
        $userId = Auth::id();
        $rentals = Rental::with('stockBook')->where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return response()->json($rentals, 200);
    }
}