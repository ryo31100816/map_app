@extends('layouts.map_layout')

@section('content')
    {{ Form::model($member,['route' => ['member.update',$member->id]]) }}
        <div class='form-group'>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null, ['id' => 'address']) }}
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
            {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('member.show', ['id' => $member->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection