@extends('layouts.map_layout')

@section('content')
    {{ Form::model($member,['route' => ['member.update',$member->id]]) }}
        @include('layouts.form')
        <div class="form-group">
            {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('member.show', ['id' => $member->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection