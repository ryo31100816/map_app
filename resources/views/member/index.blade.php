@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-center text-lg-left">
                @can('admin')
                <a href={{ route('member.new') }} class="btn btn-outline-primary">新規</a>
                @endcan
                <a href={{ route('location.list') }} class="btn btn-outline-primary">行先</a>
                <a href={{ route('history.list') }} class="btn btn-outline-primary">履歴</a>
                <a href={{ route('headquarters.show') }} class="btn btn-outline-primary">本社</a>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                @can('admin')
                {{ Form::open(['method' => 'GET', 'route' => 'member.list']) }}
                    {{ Form::input('text', 'search', null, ['placeholder' => '名前']) }}
                    {{ Form::submit('検索', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
                @endcan
            </div>
            <div class="ml-auto">件数：{{ $members->count() }}</div>
        </div>
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