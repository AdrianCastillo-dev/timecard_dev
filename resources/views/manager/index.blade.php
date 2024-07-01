@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1 style='font-size:20px'> <center>Manager</center> </h1>
        </div>
        <div class="card-body">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="col-10 offset-1">
                        <table class="table table-bordered table-responsive-lg">
                            <tr>
                                <th>Option</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>New Activity</td>
                                <th> 
                                    <a href="/manager/activity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                    </svg>
                                    </a> 
                                </th>
                            </tr>
                            <tr>
                                <td>Assign APS to user </td>
                                <th> 
                                    <a href="/manager/aps">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                    </svg>
                                    </a> 
                                </th>
                            </tr>
                            <tr>
                                <td>Validate Lead Users </td>
                                <th> 
                                    <a href="/manager/users">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                    </svg>
                                    </a> 
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection