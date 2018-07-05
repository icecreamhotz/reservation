@extends('admin.app')

@section('content')
{!! Form::open(['route' => 'user.login.submit', 'method' => 'post']) !!}
    {{ csrf_field() }}
    Username <input type="text" name="email" id="email"><br>
    Password <input type="text" name="password" id="password"><br>
    {{ Form::submit('Click Me!', ['type' => 'submit']) }}
{!! Form::close() !!}
@endsection
