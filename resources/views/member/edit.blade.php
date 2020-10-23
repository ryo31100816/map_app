@extends('layouts.map_layout')

@section('content')
    {{ Form::model($member,['route' => ['member.update',$member->id]]) }}
        <div class="container-fluid">
            <a href={{ route('member.show', ['id' => $member->id]) }} class="btn btn-outline-primary">戻る</a>
        </div>
        @include('layouts.form')
    {{ Form::close() }}
@endsection