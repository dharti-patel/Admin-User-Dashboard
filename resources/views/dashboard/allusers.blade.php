@extends('layouts.master')

@section('title')
    All Users
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                    <h3>Users</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-right">Edit</th>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($users as $user)
                            @if($user->status == 1)
                                @php
                                $status = 'Active';
                                @endphp
                            @else
                                @php
                                $status = 'Inactive';
                                @endphp
                            @endif
                            <tr>
                                <td>{{$i}}</td>
                                <td><img src="{{ asset('storage/profileImages/' . $user->image) }}" class="img-thumbnail img-responsive"/></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$status}}</td>
                                <td class="text-right"><a href="/edit-user-info/{{$user->id}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection