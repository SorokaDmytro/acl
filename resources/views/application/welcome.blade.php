@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Access control list</h1>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif

          @guest
            <h2>Hi there ;)</h2>
            <br><br>
            Owner account access
            <br>
            login: owl@test.ru
            <br>
            password: 123123
          @else
            <h2>You are logged in!</h2>
          @endguest
        </div>
    </div>
</div>
@stop
