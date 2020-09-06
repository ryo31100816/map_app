@extends('layouts.map_layout')

@section('content')
<h1>{{ $title }}</h1>
    {{ Form::open(['route' => 'member.store']) }}
        <div class='form-group'>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('latitude', 'Latitude:') }}
            {{ Form::text('latitude', null, ['id' => 'latitude']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('longitude', 'Longitude:') }}
            {{ Form::text('longitude', null, ['id' => 'longitude']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('member.list') }}>一覧に戻る</a>
        </div>
    {{ Form::close() }}
@endsection