@extends('layouts.layout')

@section('content')
  <p>{{ $location->name }}</p>
  <p>{{ $location->address }}</p>

  <p><a href={{ route('location.edit', ['id' => $location->id]) }} class="btn btn-outline-primary">編集</a></p>
  <p><a href={{ route('location.list') }} class="btn btn-outline-primary">戻る</a></p>

    <div>
    {{ Form::open(['method'=>'delete','route'=>['location.delete',$location->id]]) }}
      {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
    {{ Form::close() }}
    </div>
@endsection