<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // use api google books
    public function search(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        if ($request->has('keyword'))  {
            $keyword = $request->input('keyword');
            $books = $client->searchBook($keyword);
        } else {
            $books = $client->searchBook('books');
        }
        return response()->json(['books' => $books], 200);
    }

    public function searchForm()
    {
        if (auth()->user()->is_admin) {
            return response()->json(['message' => 'Access granted'], 200);
        }
        return response()->json(['message' => 'Access denied'], 403);
    }

    public function searchResult(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        if ($request->has('keyword'))  {
            $keyword = $request->input('keyword');
            $books = $client->searchBook($keyword);
        } else {
            $books = $client->searchBook('books');
        }
        return response()->json(['books' => $books], 200);
    }
}
