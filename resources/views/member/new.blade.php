@extends('layouts.map_layout')

@section('content')
    {{ Form::open(['route' => 'member.store']) }}
        @include('layouts.form')
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('member.list') }}>一覧に戻る</a>
        </div>
    {{ Form::close() }}
@endsection