<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorite = Favorite::latest()->paginate(5);
        // dd($favorite);
        return view('user.favorites.index', compact('favorite'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = Book::all();

        return view('admin.books.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'writer' => 'required',
            'year' => 'required',
            'publishes' => 'required',
            'category' => 'required',
            'synop' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Something went wrong');
        } else {
            $favorite = new Favorite([
                'title' => $request->get('title'),
                'writer' => $request->get('writer'),
                'year' => $request->get('year'),
                'publishes' => $request->get('publishes'),
                'category' => $request->get('category'),
                'synop' => $request->get('synop')
            ]);

            $favorite->save();
        }

        return redirect()->route('favorite.index')->with('success', 'Has been added to your favourites');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favoritek->delete();

        return redirect()->route('favorites.index')->with('success', 'Data deletion successful!');
    }
}
