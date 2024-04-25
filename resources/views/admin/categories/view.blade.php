@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="card card-xxl-stretch">
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="fw-bolder mb-2 text-dark">Categories Detail</span>
        </h3>
        <div class="d-flex">
            <div class="card-toolbar">
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary fw-bolder">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr002.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="black"/>
                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="black"/>
                        </svg>
                    </span>
                    Return
                </a>
            </div>
        </div>
    </div>
    <div class="card-body pt-5">
        <div class="row mb-10">
            <label class="col-lg-4 fw-bold text-muted">Category Name</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $data->name }}</span>
            </div>
        </div>
        <div class="row mb-10">
            <label class="col-lg-4 fw-bold text-muted">Created At</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
        <div class="row mb-10">
            <label class="col-lg-4 fw-bold text-muted">Updated At</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ Carbon\Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
