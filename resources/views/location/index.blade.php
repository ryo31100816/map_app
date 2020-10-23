@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-center text-lg-left">
                @can('admin')
                <a href={{ route('location.new') }} class="btn btn-outline-primary">新規</a>
                @endcan
                <a href={{ route('member.list') }} class="btn btn-outline-primary">メンバー</a>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                {{ Form::open(['method' => 'GET', 'route' => 'location.list']) }}
                    {{ Form::input('text', 'search', null, ['placeHolder' => '目的地']) }}
                    {{ Form::submit('検索', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>
            <div class="ml-auto">件数：{{ $locations->count() }}</div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        @foreach($locations as $location)
            <tr>
                <td>
                    @can('admin')
                    <a href={{ route('location.show',['id' => $location->id]) }}  class="btn btn-outline-primary">詳細</a>
                    @endcan
                </td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
            </tr>
        @endforeach
    </table>
@endsection
