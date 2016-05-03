@extends('layouts.default')
@section('content')
    <h1>Basic Sample</h1>
    <div>
        <form method="POST" action="{{route('user.apply')}}">
            {!! csrf_field() !!}
            <input type="hidden" name="name" value="{{ request('name') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">
            <div>
                <label for="name">name</label>
                {{ request('name') }}
            </div>
            <div>
                <label for="email">email</label>
                {{ request('email') }}
            </div>
            <button type="submit" name="register">register</button>
            <button type="submit" name="_return" value="return">back</button>
        </form>
    </div>
@stop
