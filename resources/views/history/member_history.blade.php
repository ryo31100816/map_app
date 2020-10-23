@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="container row">
            @can('admin')
                <div><a href={{ route( 'history.new', [$id]) }} class="btn btn-outline-primary">出張登録</a></div>
            @endcan
            <div class="ml-auto">件数：{{ $histories->count() }}</div>
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
    </div>
@endsection
