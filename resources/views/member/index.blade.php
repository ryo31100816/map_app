@extends('layouts.layout')

@section('content')
    <div id="map"></div>
    <table class="table table-striped table-hover">
    <div><a href={{ route('member.new') }} class="btn btn-outline-primary">新規</a></div>
    <div><a href={{ route('location.list') }} class="btn btn-outline-primary">Location</a></div>
    <div><a href={{ route('history.list') }} class="btn btn-outline-primary">History</a></div>
        @foreach($members as $member)
            <tr>
                <td>
                <a href={{ route('member.show',['id' => $member->id]) }}  class="btn btn-outline-primary">編集</a>
                </td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->address }}</td>
            </tr>
        @endforeach
    </table>
@endsection