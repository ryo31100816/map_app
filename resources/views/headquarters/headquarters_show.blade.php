@extends('layouts.layout')

@section('content')
  <h1>{{ $title }}</h1>
  @if(isset($headquarters))
    <p>{{ $headquarters->address }}</p>
    <p>{{ $headquarters->latitude }}</p>
    <p>{{ $headquarters->longitude }}</p>
    <p><a href={{ route('headquarters.edit', ['id' => $headquarters->id]) }} class="btn btn-outline-primary">編集</a></p>
  @else
    <p>本社の登録がありません。</p>
  @endif
@endsection