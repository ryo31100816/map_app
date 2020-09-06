@extends('layouts.layout')

@section('content')
    <table class="table table-striped table-hover">
    @if(isset($histories[0]))
        @foreach($histories as $history)
            <tr>
                <td>
                    <a href={{ route('history.show',['id' => $history->id]) }}  class="btn btn-outline-primary">詳細</a>
                </td>
                <td>{{ $history->name }}</td>
                <td>{{ $history->address }}</td>
            </tr>
        @endforeach
    @else
        <p>履歴がありません。</p>
    @endif
    </table>
@endsection
