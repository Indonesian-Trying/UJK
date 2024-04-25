@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="card card-xxl-stretch">
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bolder mb-2 text-dark">Books table</span>
            </h3>
            @role('admin')
            <div class="d-flex">
                <div class="card-toolbar">
                    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary fw-bolder me-2">
                        Create
                    </a>
                </div>
            </div>
            @endrole
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            <!--begin::Table-->
            <table class="table table-responsive table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                <thead>
                    <tr class="fw-bold fs-4 text-gray-800">
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Writer</th>
                        <th scope="col">Category</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Year</th>
                        <th scope="col" width="15%">Cover</th>
                        <th scope="col">Pdf</th>
                        @role('admin')
                        <th class="col">Actions</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $back)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $back->title }}</td>
                            <td>{{ $back->isbn }}</td>
                            <td>{{ $back->writer }}</td>
                            <td>{{ $back->publishes }}</td>
                            <td>{{ $back->category }}</td>
                            <td>{{ $back->year }}</td>
                            <td>
                                @if ($back->img)
                                    <img src="{{ asset('storage/images/' . $back->img) }}"
                                        alt="{{ $back->title }}'s cover"width="100%" height="100%"">
                                @else
                                    <p>No Picture</p>
                                @endif
                            </td>
                            <td>
                                @if ($back->pdf)
                                    <a href="{{ route('books.read', $back->id) }}" method="POST" target="_BLANK">Read
                                        Book</a>
                                @else
                                    <p>No PDF</p>
                                @endif
                            </td>
                            @role('admin')
                                <td>
                                    <form action="{{ route('books.destroy', $back->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('books.show', $back->id) }}">
                                            <i class="fa-solid fa-arrows-to-eye"></i>
                                        </a>

                                        <a class="btn btn-primary" href="{{ route('books.edit', $back->id) }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <!-- Button trigger modal -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure to delete {{ $back->title }}?')"
                                            class="btn btn-danger">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
