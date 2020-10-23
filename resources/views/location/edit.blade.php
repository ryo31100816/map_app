@extends('layouts.map_layout')

@section('content')
    {{ Form::model($location,['route' => ['location.update',$location->id]]) }}
        <div class="container-fluid">
            <a href={{ route('location.show', ['id' => $location->id]) }} class="btn btn-outline-primary">戻る</a>
        </div>
        @include('layouts.form')
    {{ Form::close() }}
@endsection