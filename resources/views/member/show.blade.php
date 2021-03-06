@extends('layouts.layout')

@section('content')
<div calss="row">
  <div class="container">
    <a href={{ route('member.list') }} class="btn btn-outline-primary">戻る</a>
  </div>
  <table class="table table-striped table-hover">
    <tr>
      <td>
      @can('admin')
      <a href={{ route('member.edit', ['id' => $member->id]) }} class="btn btn-outline-primary">編集</a>
      @endcan
      <a href={{ route('history.getByMemberId', ['id' => $member->id]) }} class="btn btn-outline-primary">出張</a>
      </td>
      @isset($member->user->name)
          <td>{{ $member->user->name }}</td>
      @else
          <td>{{ $member->name }}</td>
      @endisset
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
</div>
@endsection