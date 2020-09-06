@extends('layouts.layout')

@section('content')
<h1>{{ $title }}</h1>
    <input id="start" type="text" value="東京駅">
    <input id="end" type="text" value="甲府駅"> 
    {{ Form::open(['route' => 'history.store']) }}
        <div class='form-group'>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('history.list') }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection