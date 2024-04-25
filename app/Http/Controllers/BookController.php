<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::latest()->paginate(5);
        // dd($book);
        return view('admin.books.index', compact('book'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publish = Publish::all();
        $category = Category::all();

        return view('admin.books.create', compact('publish', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'writer' => 'required',
            'isbn' => 'required|min:13|max:13',
            'synop' => 'required',
            'publishes' => 'required',
            'category' => 'required',
            'year' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'pdf' => 'required|mimes:pdf|max:50000',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        if ($request->hasFile('pdf')) {
            $pdfName = $request->title . '.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->storeAs('public/pdfs', $pdfName);
        } else {
            $pdfName = null;
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Something went wrong');
        } else {
            $book = new Book([
                'title' => $request->get('title'),
                'writer' => $request->get('writer'),
                'publishes' => $request->get('publishes'),
                'category' => $request->get('category'),
                'synop' => $request->get('synop'),
                'isbn' => $request->get('isbn'),
                'year' => $request->get('year'),
                'img' => $imageName,
                'pdf' => $pdfName,
            ]);

            $book->save();
        }

        return redirect()->route('books.index')->with('success', 'Book recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // dd($book);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publish = Publish::all();
        $category = Category::all();

        return view('admin.books.edit', compact('book', 'publish', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'isbn' => 'required',
            'synop' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'year' => 'required|numeric',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'pdf' => 'required|mimes:pdf|max:50000',
        ]);

        if ($request->hasFile('img')) {
            if ($book->img) {
                Storage::delete('public/images/' . $book->img);
            }
            $imageName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->storeAs('public/images', $imageName);
        } else {
            $imageName = $book->img;
        }
        
        if ($request->hasFile('pdf')) {
            if ($book->pdf) {
                Storage::delete('public/pdfs/' . $book->pdf);
            }
            $pdfName = $book->title . '.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->storeAs('public/pdfs', $pdfName);
        } else {
            $pdfName = $book->pdf;
        }

        $book->update([
            'title' => $request->get('title'),
            'writer' => $request->get('writer'),
            'publishes' => $request->get('publishes'),
            'category' => $request->get('category'),
            'synop' => $request->get('synop'),
            'isbn' => $request->get('isbn'),
            'year' => $request->get('year'),
            'img' => $imageName,
            'pdf' => $pdfName,
        ]);

        return redirect()->route('book.index')->with('success', 'Book edit successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deletion successful!');
    }

    public function read(Book $book)
    {
        $pathToFile = public_path('storage/pdfs/' . $book->pdf);
        // dd($pathToFile);
        if (file_exists($pathToFile)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $book->pdf . '"',
            ];
            return response()->file($pathToFile, $headers);
        } else {
            abort(404);
        }
    }
}
