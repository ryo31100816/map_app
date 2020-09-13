@extends('layouts.layout')

@section('content')
    <table class="table table-striped table-hover">
    <div><a href={{ route('member.new') }} class="btn btn-outline-primary">新規</a></div>
    <div><a href={{ route('location.list') }} class="btn btn-outline-primary">行先</a></div>
    <div><a href={{ route('history.list') }} class="btn btn-outline-primary">履歴</a></div>
    <div><a href={{ route('headquarters.show') }} class="btn btn-outline-primary">本社</a></div>
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