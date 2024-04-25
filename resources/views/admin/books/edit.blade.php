@extends('layouts.app')
@section('content')
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0 flex-column">
                    <h3 class="fw-bolder m-0">Edit Book</h3>
                </div>
                <a href="{{ route('books.index') }}"
                    class="btn btn-flex btn-light btn-light btn-active-primary fw-bolder align-self-center">
                    <span class="svg-icon svg-icon-muted svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z"
                                fill="black" />
                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="black" />
                        </svg>
                    </span>Return</a>
            </div>
            <form class="form" action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body p-9">
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Title</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('title')is-invalid @enderror"
                            type="text" id="title" name="title"
                            value="{{ old('title') ? old('title') : $book->title }}" />
                        @error('title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Writer</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('writer')is-invalid @enderror"
                            type="text" id="writer" name="writer"
                            value="{{ old('writer') ? old('writer') : $book->writer }}" />
                        @error('writer')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Publisher</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('publishes')is-invalid @enderror"
                            type="text" id="publishes" name="publishes"
                            value="{{ old('publishes') ? old('publishes') : $book->publishes }}" />
                        @error('publishes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Category</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('category')is-invalid @enderror"
                            type="text" id="category" name="category"
                            value="{{ old('category') ? old('category') : $book->category }}" />
                        @error('category')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Year of Publishing</span>
                        </label>
                        <input
                            class="form-control form-control form-control-solid @error('year')is-invalid @enderror"
                            type="text" id="year" name="year"
                            value="{{ old('year') ? old('year') : $book->year }}" />
                        @error('year')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Cover</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('pdf')is-invalid @enderror"
                            type="file" id="img" name="img"
                            value="{{ old('img') ? old('img') : $book->img }}" />
                        @error('img')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">PDF</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('pdf')is-invalid @enderror"
                            type="file" id="pdf" name="pdf"
                            value="{{ old('pdf') ? old('pdf') : $book->pdf }}" />
                        @error('pdf')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="card-footer d-flex justify-content-center py-6 px-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
