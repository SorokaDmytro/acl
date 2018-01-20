@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new user</div>
                <div class="panel-body">

                  {!! Form::open(['action' => 'UsersController@create', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                      {!! Form::label('name', 'Username', ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    @can('set-user-role')
                      <div class="form-group">
                        {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                          {!! Form::select('role', ['employee' => 'Employee', 'admin' => 'Admin']) !!}
                        </div>
                      </div>
                    @endcan

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4 user-submit-btn">
                        {!! Form::submit('create', ['class' => 'btn btn-primary']) !!}
                      </div>
                    </div>
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop
