@extends('layouts.layout')

@section('content')
<div><a href={{ route('location.list') }} class="btn btn-outline-primary">戻る</a></div>
<table class="table table-striped table-hover">
<tr>
  <td>
  <a href={{ route('location.edit', ['id' => $location->id]) }} class="btn btn-outline-primary">編集</a>
  </td>
  <td>{{ $location->name }}</td>
  <td>{{ $location->address }}</td>
  <td>
  {{ Form::open(['method'=>'delete','route'=>['location.delete',$location->id]]) }}
    {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
  {{ Form::close() }}
  </td>
</tr>
</table>
@endsection