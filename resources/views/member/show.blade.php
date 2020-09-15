@extends('layouts.layout')

@section('content')
<table class="table table-striped table-hover">
  <tr>
    <td>
    <a href={{ route('member.edit', ['id' => $member->id]) }} class="btn btn-outline-primary">編集</a>
    <a href={{ route('history.getByMemberId', ['id' => $member->id]) }} class="btn btn-outline-primary">履歴</a>
    </td>
    <td>{{ $member->name }}</td>
    <td>{{ $member->address }}</td>
    <td>
    {{ Form::open(['method'=>'delete','route'=>['member.delete',$member->id]]) }}
      {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
    {{ Form::close() }}
    </td>
  </tr>
  <div><a href={{ route('member.list') }} class="btn btn-outline-primary">戻る</a></div>
@endsection