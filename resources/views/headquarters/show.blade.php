@extends('layouts.layout')

@section('content')
  @if(isset($headquarters))
  <table class="table table-striped table-hover">
  <tr>
    <td>
    <a href={{ route('headquarters.edit', ['id' => $headquarters->id]) }} class="btn btn-outline-primary">編集</a>
    </td>
    <td>{{ $headquarters->address }}</td>
    <td>{{ $headquarters->latitude }}</td>
    <td>{{ $headquarters->longitude }}</td>
  </tr>
  </table>
  @else
    <p>本社の登録がありません。</p>
  @endif
@endsection