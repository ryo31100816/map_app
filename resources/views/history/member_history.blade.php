@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="container">
        @can('admin')
            <div><a href={{ route( 'history.new', [$id]) }} class="btn btn-outline-primary">出張登録</a></div>
        @endcan
        </div>
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
    </div>
@endsection
