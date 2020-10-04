@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row">
    <a href={{ route('history.list') }} class="btn btn-outline-primary">戻る</a>
    {{ Form::open(['method'=>'delete','route'=>['history.delete',$history->id], 'class' => 'delete-btn']) }}
      {{Form::submit('削除',['class' => 'btn btn-outline-secondary']) }}
    {{ Form::close() }}
    </div>
  </div>
  <table class="table table-striped table-hover">
    <tr>
      <td>出張日：{{ $history->trip_date }}</td>
    </tr>
    <tr>
      <td>名前：{{ $history->member->name }}</td>
    </tr>
    <tr>
      @if($history->start === 0)
        <td>出発： 本社</td>
      @else
        <td>出発： 自宅 {{ $history->member->address }}</td>
      @endif
    </tr>
    <tr>
      <td>目的地：{{ $history->location->name }} {{ $history->location->address }}</td>
    </tr>
  </table>
@endsection