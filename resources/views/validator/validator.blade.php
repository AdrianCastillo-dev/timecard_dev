@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <center>
            <h1>TimeCard Users</h1>
            </center>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-10 offset-1">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>APS</th>
                            <th>Type Activities</th>
                            <th>Status</th>
                            <th>Validated</th>
                            <th>Drop</th>
                        </tr>
                        @foreach($data as $dat)
                            @if($dat->type == 1 || $id_user == 3)
                                <tr>
                                    <td>{{$dat->d}}</td>
                                    <td>{{$dat->title}}</td>
                                    <td>{{$dat->description}}</td>
                                    <td>{{$dat->estimated_time}}</td>
                                    <td>{{$dat->activities}}</td>
                                    <td>{{$dat->name}}</td>
                                    @if($dat->status_d == '1')
                                        <td style="background-color: red;">Not Submit</td>
                                    @endif
                                    @if($dat->status_d == '2')
                                        <td style="background-color: yellow;">Submit</td>
                                    @endif
                                    @if($dat->status_d == '3')
                                        <td style="background-color: green;">Validated</td>
                                    @endif
                                    <td>
                                    @if($dat->status_d != '3')
                                        <center>
                                            <a class="btn btn-success" href="/validator/validated/{{$dat->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                                </svg>
                                            </a>
                                        </center>
                                    @endif
                                    @if($dat->status_d == '3')
                                        <p>Validated</p>
                                    @endif
                                    </td>
                                    <td>
                                        <center>
                                            <a class="btn btn-danger" href="/validator/drop/{{$dat->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                </svg>
                                            </a>
                                        </center>
                                        
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
