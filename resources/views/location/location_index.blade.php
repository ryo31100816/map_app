@extends('layouts.layout')

@section('content')
    <table class="table table-striped table-hover">
    <div><a href={{ route('location.new') }} class="btn btn-outline-primary">新規</a></div>
        @foreach($locations as $location)
            <tr>
                <td>
                    <a href={{ route('location.show',['id' => $location->id]) }}  class="btn btn-outline-primary">編集</a>
                </td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
            </tr>
        @endforeach
    </table>
@endsection
