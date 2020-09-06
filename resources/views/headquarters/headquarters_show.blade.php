@extends('layouts.layout')

@section('content')
  <h1>detail</h1>
  <p>{{ $headquarters->trip_day }}</p>
  <p>{{ $headquarters->address }}</p>

  <p><a href={{ route('headquarters.edit', ['id' => $member->id]) }} class="btn btn-outline-primary">編集</a></p>

@endsection