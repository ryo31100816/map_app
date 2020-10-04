@extends('layouts.layout')

@section('content')
  <div class="row">
    <div class="container">
      <a href={{ route('location.list') }} class="btn btn-outline-primary">戻る</a>
    </div>
    <table class="table table-striped table-hover">
    <tr>
      <td>
      @can('admin')
      <a href={{ route('location.edit', ['id' => $location->id]) }} class="btn btn-outline-primary">編集</a>
      @endcan
      </td>
      <td>{{ $location->name }}</td>
      <td>{{ $location->address }}</td>
      <td>
      @can('admin')
      {{ Form::open(['method'=>'delete','route'=>['location.delete',$location->id]]) }}
        {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
      {{ Form::close() }}
      @endcan
      </td>
    </tr>
    </table>
  </div>
@endsection