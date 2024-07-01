@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1 style='font-size:20px'> <center>Users</center> </h1>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                <center>
                    {{ session('success') }}
                </center>
            </div>
        @endif
        <div class="card-body">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="col-10 offset-1">
                            <table class="table table-bordered table-responsive-lg">
                                <tr>
                                    <th>Name User</th>
                                    <th>Email</th>
                                    <th>Type User</th>
                                    <th>Make Leader</th>
                                    <th>Desaser Leader</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->flag == '1')
                                        <td style="background-color: #90EE90;">Admin</td>
                                    @endif
                                    @if($user->flag == '2')
                                        <td style="background-color: #ADD8E6;">Leader</td>
                                    @endif
                                    @if($user->flag == '3')
                                        <td style="background-color: #D3D3D3;">User</td>
                                    @endif
                                    @if($user->flag == '2')
                                        <td>Leader assigned</td>
                                    @endif
                                    @if($user->flag != '2')
                                        <td>
                                            <a href="/manager/users/{{$user->id}}/1" class="btn" style="background-color: #ADD8E6;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                            </svg>
                                            </a>
                                        </td>
                                    @endif
                                    @if($user->flag == '3')
                                        <td>User assigned</td>
                                    @endif
                                    @if($user->flag != '3')
                                        <td>
                                            <a href="/manager/users/{{$user->id}}/2" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                                            </svg>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection