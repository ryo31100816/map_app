@extends('layouts.map_layout')

@section('content')
    {{ Form::open(['route' => 'member.store']) }}
        <div class="container-fluid">
            <a href={{ route('member.list') }} class="btn btn-outline-primary">一覧へ</a>
        </div>
        @include('layouts.form')
    {{ Form::close() }}
@endsection