@extends('layouts.layout')

@section('content')
  <div class="row">
    <div class="container">
      <div><a href={{ route('member.list') }} class="btn btn-outline-primary">メンバー</a></div>
    </div>
    @if(isset($headquarters))
    <table class="table table-striped table-hover">
    <tr>
      <td>
      @can('admin')
      <a href={{ route('headquarters.edit', ['id' => $headquarters->id]) }} class="btn btn-outline-primary">編集</a>
      @endcan
      </td>
      <td>{{ $headquarters->address }}</td>
      <td>{{ $headquarters->latitude }}</td>
      <td>{{ $headquarters->longitude }}</td>
    </tr>
    </table>
    @else
      <p>本社の登録がありません。</p>
    @endif
  </div>
@endsection