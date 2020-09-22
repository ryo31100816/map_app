@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="container">
            @can('admin')
            <div><a href={{ route('location.new') }} class="btn btn-outline-primary">新規</a></div>
            @endcan
            <div><a href={{ route('member.list') }} class="btn btn-outline-primary">メンバー</a></div>
            {{ Form::open(['method' => 'GET', 'route' => 'location.list']) }}
                {{ Form::input('text', 'search', null) }}
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        <table class="table table-striped table-hover">
            @foreach($locations as $location)
                <tr>
                    <td>
                        @can('admin')
                        <a href={{ route('location.show',['id' => $location->id]) }}  class="btn btn-outline-primary">編集</a>
                        @endcan
                    </td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
