@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="container">
            @can('admin')
            <div><a href={{ route('member.new') }} class="btn btn-outline-primary">新規</a></div>
            @endcan
            <div><a href={{ route('location.list') }} class="btn btn-outline-primary">行先</a></div>
            <div><a href={{ route('history.list') }} class="btn btn-outline-primary">履歴</a></div>
            <div><a href={{ route('headquarters.show') }} class="btn btn-outline-primary">本社</a></div>
            {{ Form::open(['method' => 'GET', 'route' => 'member.list']) }}
                {{ Form::input('text', 'search', null) }}
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        <table class="table table-striped table-hover">
            @foreach($members as $member)
                <tr>
                    <td>
                    <a href={{ route('member.show',['id' => $member->id]) }}  class="btn btn-outline-primary">詳細</a>
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->address }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection