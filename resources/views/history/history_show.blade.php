@extends('layouts.layout')

@section('content')

<h1>{{ $title }}</h1>

@if(isset($histories[0]))
  @foreach($histories as $history)
  <p>{{ $history->trip_date }}</p>
  <p>{{ $history->address }}</p>
  @endforeach
@else
  <p>履歴がありません。</p>
@endif
<p><a href={{ route('history.list') }} class="btn btn-outline-primary">戻る</a></p>
@endsection