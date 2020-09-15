@extends('layouts.map_layout')

@section('content')
    {{ Form::model($headquarters,['route' => ['headquarters.update',$headquarters->id]]) }}
        <div class='form-group'>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null) }}
            {{ $errors->first('address') }}
        </div>
        <div class='form-group'>
            {{ Form::label('latitude', 'Latitude:') }}
            {{ Form::text('latitude', null, ['id' => 'latitude']) }}
            {{ $errors->first('latitude') }}
        </div>
        <div class='form-group'>
            {{ Form::label('longitude', 'Longitude:') }}
            {{ Form::text('longitude', null, ['id' => 'longitude']) }}
            {{ $errors->first('longitude') }}
        </div>
        <div class="form-group">
            {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('headquarters.show', ['id' => $headquarters->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection