@extends('layouts.app')

@section('title', 'Publish')

@section('content')
    <div class="card card-xxl-stretch">
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bolder mb-2 text-dark">Publisher table</span>
            </h3>
            <div class="d-flex">
                <div class="card-toolbar">
                    <a href="{{ route('publish.create') }}" class="btn btn-sm btn-primary fw-bolder me-2">
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-5">
            <table class="table table-responsive table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0" id="myTable">
                <thead>
                    <tr class="fw-bold fs-4 text-gray-800">
                        <th scope="col">No</th>
                        <th scope="col">Publisher name</th>
                        <th class="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publish as $pube)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pube->name }}</td>
                            <td>
                                <form action="{{ route('publish.destroy', $pube->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('publish.show', $pube->id) }}">
                                        <i class="fa-solid fa-arrows-to-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" href="{{ route('publish.edit', $pube->id) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure to delete {{ $pube->name }}?')"
                                        class="btn btn-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
