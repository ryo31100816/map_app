@extends('layouts.layout')

@section('content')
  <div class="row">
    <div class="container">
      <div><a href={{ route('history.list') }} class="btn btn-outline-primary">戻る</a></div>
    </div>
  @if(isset($histories[0]))
  <table class="table table-striped table-hover">
    @foreach($histories as $history)
    <tr>
      <td>{{ $history->trip_date }}</td>
      <td>{{ $history->address }}</td>
    </tr>
    @endforeach
  </table>
  @else
    <p>履歴がありません。</p>
  @endif
  </div>
@endsection