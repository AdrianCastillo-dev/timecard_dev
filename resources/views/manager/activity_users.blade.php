@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">
            <h1 style='font-size:20px'> <center>Users</center> </h1>
        </div>
        
        <div class="card-body"> 
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                    <div class="col-10 offset-1">
                        
                            <table class="table table-bordered table-responsive-lg">
                                <tr>
                                    <th>Name</th>
                                    <th>Time</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->s}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection