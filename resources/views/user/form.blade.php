@extends('layouts.default')
@section('content')
    <h1>Basic Sample</h1>
    <div>
        <form method="POST" action="{{route('user.confirm')}}">
            {!! csrf_field() !!}
            <div>
                <label for="name">name</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name">
                @if($errors->first('name'))<br />{{$errors->first('name')}} @endif
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" value="{{ old('email') }}" id="email">
                @if($errors->first('email'))<br />{{$errors->first('email')}} @endif
            </div>
            <button type="submit" name="confirm">confirm</button>
        </form>
    </div>
@stop
