@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="card card-xxl-stretch">
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bolder mb-2 text-dark">Create Categories</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('categories.index') }}" class="btn btn-flex  btn-light btn-active-primary">
                    <span class="svg-icon svg-icon-muted svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="white">
                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z"
                                fill="black" />
                            <path opacity="0.5"d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="black" />
                        </svg>
                    </span>
                    Return
                </a>
            </div>
        </div>
        <form class="form" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="card-body pt-5">
                <div class="fv-row mb-5">
                    <label for="name" class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Category Name</span>
                    </label>
                    <input class="form-control form-control form-control-solid @error('name')is-invalid @enderror"
                        type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name" />
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center ">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
