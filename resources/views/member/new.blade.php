@extends('layouts.map_layout')

@section('content')
    {{ Form::open(['route' => 'member.store']) }}
    <div class="containrer">
        <div class="row">
            <div class='form-group col-lg-6'>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'area']) }}
                {{ $errors->first('name') }}
            </div>
            <div class='form-group col-lg-6'>
                {{ Form::label('address', 'Address:') }}
                {{ Form::text('address', null, ['class' => 'area']) }}
                {{ $errors->first('address') }}
            </div>
        </div>
        <div class="row">
            <div class='form-group col-lg-6'>
                {{ Form::label('latitude', 'Lat:') }}
                {{ Form::text('latitude', null, ['id' => 'latitude', 'class' => 'area']) }}
                {{ $errors->first('latitude') }}
            </div>
            <div class='form-group col-lg-6'>
                {{ Form::label('longitude', 'Lng:') }}
                {{ Form::text('longitude', null, ['id' => 'longitude', 'class' => 'area']) }}
                {{ $errors->first('longitude') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
        <a href={{ route('member.list') }}>一覧に戻る</a>
    </div>
    {{ Form::close() }}
@endsection