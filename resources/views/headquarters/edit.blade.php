@extends('layouts.map_layout')

@section('content')
    {{ Form::model($headquarters,['route' => ['headquarters.update',$headquarters->id]]) }}
    <div class="container">
        <div class="row">
            <div class="form-group col-lg-1">
                {{ Form::label('address', 'Address:') }}
            </div>
            <div class="form-group col-lg-11">
                {{ Form::text('address', null, ['class' => 'area']) }}
                {{ $errors->first('address') }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                {{ Form::label('latitude', 'Latitude:') }}
            </div>
            <div class="form-group col-lg-5">
                {{ Form::text('latitude', null, ['id' => 'latitude', 'class' => 'area']) }}
                {{ $errors->first('latitude') }}
            </div>
            <div class="form-group col-lg-1">
                {{ Form::label('longitude', 'Longitude:') }}
            </div>
            <div class="form-group col-lg-5">
                {{ Form::text('longitude', null, ['id' => 'longitude', 'class' => 'area']) }}
                {{ $errors->first('longitude') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
        <a href={{ route('headquarters.show', ['id' => $headquarters->id]) }}>戻る</a>
    </div>
    {{ Form::close() }}
@endsection