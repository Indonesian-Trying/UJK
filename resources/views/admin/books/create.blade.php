@extends('layouts.app')

@section('content')
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0 flex-column">
                    <h3 class="fw-bolder m-0">Add Book</h3>
                </div>
                <a href="{{ route('books.index') }}" class="btn btn-flex  btn-light btn-active-primary">
                    <span class="svg-icon svg-icon-muted svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z"
                                fill="black" />
                            <path opacity="0.5" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="black" />
                        </svg>
                    </span>Return</a>
            </div>
            <form class="form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body p-9">
                    <div class="fv-row mb-5">
                        <label for="title" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Title</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('title')is-invalid @enderror"
                            type="text" id="title" name="title" value="{{ old('title') }}" autocomplete="title" />
                        @error('title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="isbn" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">ISBN</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('isbn')is-invalid @enderror"
                            type="number" id="isbn" name="isbn" value="{{ old('isbn') }}" />
                        @error('isbn')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="writer" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Writer</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('writer')is-invalid @enderror"
                            type="text" id="writer" name="writer" value="{{ old('writer') }}" />
                        @error('writer')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="publishes" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Publisher</span>
                        </label>
                        <select name="publishes" id="publishes"
                            class="form-control form-control-solid @error('publishes')is-invalid @enderror">
                            <option selected disabled value="">Select Publisher</option>
                            @foreach ($publish as $pub)
                                <option value="{{ $pub->name }}"{{ old('publishes') == $pub->name ? 'selected' : '' }}>
                                    {{ $pub->name }}</option>
                            @endforeach
                            </option>
                        </select>
                        @error('publishes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="category" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Category</span>
                        </label>
                        <select name="category" id="category"
                            class="form-control form-control-solid @error('category')is-invalid @enderror">
                            <option selected disabled value="">Choose category</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->name }}"{{ old('category') == $cat->name ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                            </option>
                        </select>
                        @error('category')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="year" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Year of Publishing</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('year')is-invalid @enderror"
                            id="year" type="number" min="1000" max="2024" name="year"
                            value="{{ old('year') }}" />
                        @error('year')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="synop" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Synopsis</span>
                        </label>

                        <textarea class="form-control form-control form-control-solid @error('synop')is-invalid @enderror" id="synop"
                            name="synop">{{ old('synop') }}</textarea>
                        @error('synop')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="img" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Insert Image</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('pdf')is-invalid @enderror"
                            type="file" id="img" name="img" accept=".png, .jpg, .jpeg"
                            value="{{ old('img') }}" />
                        </label>
                        @error('img')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-5">
                        <label for="pdf" class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Pdf</span>
                        </label>
                        <input class="form-control form-control form-control-solid @error('pdf')is-invalid @enderror"
                            type="file" id="pdf" name="pdf" value="{{ old('pdf') }}">
                        @error('pdf')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center py-6 px-9">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
