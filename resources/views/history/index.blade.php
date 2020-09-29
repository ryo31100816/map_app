@extends('layouts.layout')

@section('content')
    <div class="menu_bar">
        <div><a href={{ route('member.list') }} class="btn btn-outline-primary">メンバー</a></div>
        {{ Form::open(['method' => 'GET', 'route' => 'history.list', 'class' => 'search_form']) }}
            {{ Form::input('text', 'search', null, ['placeHolder' => '日付']) }}
            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    @if(isset($histories[0]))
    <table class="table table-striped table-hover">
    @foreach($histories as $history)
        <tr>
            <td>
            <a href={{ route('history.show',['id' => $history->id]) }}  class="btn btn-outline-primary">詳細</a>
            </td>
            <td>{{ $history->trip_date }}</td>
            <td>{{ $history->member->name }}</td>
            @if($history->start === 0)
                <td>本社</td>
            @else
                <td>自宅</td>
            @endif
            <td>{{ $history->location->name }}</td>
        </tr>
    @endforeach
    </table>
    @else
        <p>履歴がありません。</p>
    @endif
@endsection
