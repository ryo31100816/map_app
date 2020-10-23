@extends('layouts.map_layout')

@section('content')
    {{ Form::open(['route' => 'location.store']) }}
        <div class="container-fluid">
            <a href={{ route('location.list') }} class="btn btn-outline-primary">一覧へ</a>
        </div>
        @include('layouts.form')
    {{ Form::close() }}
@endsection