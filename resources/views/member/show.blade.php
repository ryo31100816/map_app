@extends('layouts.layout')

@section('content')
  <p>{{ $member->name }}</p>
  <p>{{ $member->address }}</p>

  <p><a href={{ route('member.edit', ['id' => $member->id]) }} class="btn btn-outline-primary">編集</a></p>
  <p><a href={{ route('history.getByMemberId', ['id' => $member->id]) }} class="btn btn-outline-primary">履歴</a></p>
  <p><a href={{ route('member.list') }} class="btn btn-outline-primary">戻る</a></p>

    <div>
    {{ Form::open(['method'=>'delete','route'=>['member.delete',$member->id]]) }}
      {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
    {{ Form::close() }}
    </div>
@endsection