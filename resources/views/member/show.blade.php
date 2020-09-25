@extends('layouts.layout')

@section('content')
<div calss="row">
  <div class="container">
    <div><a href={{ route('member.list') }} class="btn btn-outline-primary">戻る</a></div>
  </div>
  <table class="table table-striped table-hover">
    <tr>
      <td>
      @can('admin')
      <a href={{ route('member.edit', ['id' => $member->id]) }} class="btn btn-outline-primary">編集</a>
      @endcan
      <a href={{ route('history.getByMemberId', ['id' => $member->id]) }} class="btn btn-outline-primary">出張</a>
      </td>
      <td>{{ $member->name }}</td>
      <td>{{ $member->address }}</td>
      <td>
      @can('admin')
      {{ Form::open(['method'=>'delete','route'=>['member.delete',$member->id]]) }}
        {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
      {{ Form::close() }}
      @endcan
      </td>
    </tr>
  </table>
@endsection