@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                 @endif
                <h1 class="text-center mt-5">Welcome To Dashboard</ht>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection