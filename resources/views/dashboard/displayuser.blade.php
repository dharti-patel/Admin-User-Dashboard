@extends('layouts.master')

@section('title')
    User Info
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../assets/img/bg5.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('storage/profileImages/' . $user->image) }}" alt="User-image">
                                        <h5 class="title">{{$user->name}}</h5>
                                    </a>
                                    <p class="description"></p>
                                </div>
                                <p class="description text-center">{{$user->email}}</p>
                                <p class="description text-center">{{$user->mobile_no}}</p>
                                <p class="description text-center">{{$user->country}}</p>
                                <p class="description text-center">{{$user->state}}</p>
                                <p class="description text-center">{{$user->pincode}}</p>
                                <p class="description text-center"><a href="/edit-user-info/{{$user->id}}" class="btn btn-success">Edit</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection