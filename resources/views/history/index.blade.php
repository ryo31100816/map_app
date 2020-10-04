@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-center text-lg-left">
                <a href={{ route('member.list') }} class="btn btn-outline-primary">メンバー</a>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                {{ Form::open(['method' => 'GET', 'route' => 'history.list']) }}
                    {{ Form::input('text', 'search', null, ['placeHolder' => '日付']) }}
                    {{ Form::submit('検索', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @if(isset($histories[0]))
    <table class="table table-striped table-hover">
    @foreach($histories as $history)
        <tr>
            <td>
            <a href={{ route('history.show',['id' => $history->id]) }}  class="btn btn-outline-primary">詳細</a>
            </td>
            <td>{{ $history->trip_date }}</td>
            <td>{{ $history->member->user->name }}</td>
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
