@extends('layouts.app')

@section('content')
    <div class="container">
        @guest
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                       <h1 class=" row justify-content-center">Welcome</h1>
                       <h4 class=" row justify-content-center">Please Sign-in</h4>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('You are signed in') }}</div>
                   <h1 class=" row justify-content-center"></h1>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
        @endguest

    </div>
@endsection
