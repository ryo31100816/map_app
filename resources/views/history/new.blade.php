@extends('layouts.route_layout')

@section('content')
    {{ Form::open(['route' => 'history.store']) }}
    <div class="item">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '東京駅', ['id' => 'start_name']) }}
        
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null, ['id' => 'start_address']) }}

            {{ Form::label('latitude', 'Latitude:') }}
            {{ Form::text('latitude', null, ['id' => 'start_latitude']) }}

            {{ Form::label('longitude', 'Longitude:') }}
            {{ Form::text('longitude', null, ['id' => 'start_longitude']) }}
    </div>
    <div class="item">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '甲府駅', ['id' => 'end_name']) }}

            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null, ['id' => 'end_address']) }}

            {{ Form::label('latitude', 'Latitude:') }}
            {{ Form::text('latitude', null, ['id' => 'end_latitude']) }}

            {{ Form::label('longitude', 'Longitude:') }}
            {{ Form::text('longitude', null, ['id' => 'end_longitude']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
        <a href={{ route('history.list') }}>戻る</a>
    </div>
    {{ Form::close() }}
@endsection