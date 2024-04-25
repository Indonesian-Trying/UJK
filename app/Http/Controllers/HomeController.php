<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book = Book::latest()->paginate(5);

        return view('home', compact('book'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function show(Book $book)
    {
        return view('show', compact('book'));
    }

    public function read(Book $book)
    {
        $pathToFile = public_path('storage/pdfs/' . $book->pdf);
        dd($pathToFile);
        if (file_exists($pathToFile)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $book->pdf . '"',
            ];
            return response()->file($pathToFile, $headers);
        
        } else {
            abort(404); // File not found
        }
    }
}
