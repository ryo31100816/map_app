@extends('layouts.layout')

@section('content')
    <div class="menu_bar">
        @can('admin')
        <div><a href={{ route('member.new') }} class="btn btn-outline-primary">新規</a></div>
        @endcan
        <div><a href={{ route('location.list') }} class="btn btn-outline-primary">行先</a></div>
        <div><a href={{ route('history.list') }} class="btn btn-outline-primary">履歴</a></div>
        <div><a href={{ route('headquarters.show') }} class="btn btn-outline-primary">本社</a></div>
        @can('admin')
        {{ Form::open(['method' => 'GET', 'route' => 'member.list', 'class' => 'search_form']) }}
            {{ Form::input('text', 'search', null, ['placeholder' => '名前']) }}
            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        @endcan
    </div>
    <table class="table table-striped table-hover">
        @foreach($members as $member)
            <tr>
                <td>
                <a href={{ route('member.show',['id' => $member->id]) }}  class="btn btn-outline-primary">詳細</a>
                </td>
                @isset($member->user->name)
                    <td>{{ $member->user->name }}</td>
                @else
                    <td>{{ $member->name }}</td>
                @endisset
                <td>{{ $member->address }}</td>
            </tr>
        @endforeach
    </table>
@endsection