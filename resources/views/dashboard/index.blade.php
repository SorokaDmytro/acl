@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  Dashboard
                  <br>
                  {{ Html::linkAction('UsersController@new', 'Create a new user') }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
