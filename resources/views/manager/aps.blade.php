@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1 style='font-size:20px'> <center>APS</center> </h1>
        </div>
        
        <div class="card-body">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="col-10 offset-1">
                            <table class="table table-bordered table-responsive-lg">
                                <tr>
                                    <th>Name User</th>
                                    <th>Email</th>
                                    <th>APS</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($aps as $ap)
                                <tr>
                                    <td>{{$ap->name}}</td>
                                    <td>{{$ap->email}}</td>
                                    <td>{{$ap->aps_name}}</td>
                                    <td>{{$ap->a_u_date}}</td>
                                    <td>
                                        <a href="/manager/aps/drop/{{$ap->aps_id}}" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    
                    <div class="col">
                        @if($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{url('/manager/aps/submit')}}" class="form" role="form" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-responsive-lg" style="font-size: 12px">
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                <select name="user" id="user" class="form-control" rows="1" require>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>APS</th>
                                            <td>
                                                <select name="aps" id="aps" class="form-control" rows="1" require>
                                                    @foreach($aps_get as $get)
                                                        <option value="{{$get->id}}">{{$get->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit" id="submit" class="btn btn-success"> Submit </button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection