@extends('layouts.map_layout')

@section('content')
    {{ Form::open(['route' => 'location.store']) }}
        @include('layouts.form')
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('location.list') }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection