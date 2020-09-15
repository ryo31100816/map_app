@extends('layouts.layout')

@section('content')
    {{ Form::open(['method' => 'GET', 'route' => 'history.list']) }}
    {{ Form::input('text', 'search', null) }}
    {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    @if(isset($histories[0]))
        <table class="table table-striped table-hover">
        @foreach($histories as $history)
            <tr>
                <td>
                <a href={{ route('history.show',['id' => $history->id]) }}  class="btn btn-outline-primary">詳細</a>
                </td>
                <td>{{ $history->name }}</td>
                <td>{{ $history->address }}</td>
            </tr>
        @endforeach
        </table>
    @else
        <p>履歴がありません。</p>
    @endif
@endsection
