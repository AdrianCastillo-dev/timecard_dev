@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        
        <div class="card-header">
            <h1 style='font-size:20px'> <center>TimeCard for {{ Session::get('name') }}</center> </h1>
        </div>
        
        <div class="card-body">

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="col-10 offset-1">
                        <table class="table table-bordered table-responsive-lg">
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Time</th>
                                <th>Type Activities</th>
                                <th>APS</th>
                                <th>Status</th>
                            </tr>
                            @foreach($data_t as $data)
                                <tr>
                                    <td>{{$data->d}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->estimated_time}}</td>
                                    <td>{{$data->activities}}</td>
                                    <td>{{$data->name}}</td>
                                    @if($data->status_d == '1')
                                        <td style="background-color: red;">Not Submit</td>
                                    @endif
                                    @if($data->status_d == '2')
                                        <td style="background-color: yellow;">Submit</td>
                                    @endif
                                    @if($data->status_d == '3')
                                        <td style="background-color: green;">Validated</td>
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <p></p>
                        <h2 style='font-size:18px'> Current date: {{$date}} </h2>
                    </div>
                    @if($st->st == '0')
                    <div>
                        @if($errors->has('time'))
                            <div class="alert alert-danger">
                                {{ $errors->first('time') }}
                            </div>
                        @endif
                        <form action="{{url('/data/submit')}}" class="form" role="form" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-responsive-lg" style="font-size: 12px">
                                        <tr>
                                            <th>Title</th>
                                            <td><textarea name="title" id="title" class="form-control" rows="1" require></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><textarea name="description" id="description" class="form-control" rows="1" require></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Estimated Time</th>
                                            <td><textarea name="time" id="time" class="form-control" rows="1" require></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Type Activities</th>
                                            <td>
                                                <select name="type" id="type" class="form-control" rows="1" require>
                                                    @foreach($type_activities as $type)
                                                        <option value="{{$type->id}}">{{$type->activities}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>APS</th>
                                            <td>
                                                <select name="aps" id="aps" class="form-control" rows="1" require>
                                                    @foreach($aps_get as $aps)
                                                    <option value="{{$aps->id}}">{{$aps->name}}</option>
                                                    @endforeach 
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>
                                                <select name="dias" id="dias" class="form-control" rows="1" require>
                                                @foreach($dias_del_mes as $dias)
                                                    <option value="{{$dias}}">{{$dias}}</option>
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
                    @endif
                    @if($st->st=='1')
                    <div>
                        <h2 style='font-size:18px'>TimeCare Submit</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection