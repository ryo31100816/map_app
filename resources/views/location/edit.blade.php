@extends('layouts.map_layout')

@section('content')
    {{ Form::model($location,['route' => ['location.update',$location->id]]) }}
        @include('layouts.form')
        <div class="form-group">
            {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('location.show', ['id' => $location->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection