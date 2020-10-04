@extends('layouts.route_layout')

@section('content')
    <div class="container">
        <p>{{ $member->user->name }}</p>
        <p>{{ $member->address }}</p>
        <p>{{ $headquarters->address }}</p>
        <a href={{ route('history.list') }}>戻る</a> 
        {{ Form::open(['route' => 'history.store']) }}
            <div class="row">
                {{ Form::hidden('member_id', $member->id, ['id' => 'member_id']) }}
                <div class="form-group">
                {{ Form::input('date', 'trip_date', '', ['class' => 'trip_date']) }}
                </div>
                <div class="start_check hide">
                {{ Form::label('start1', '本社:') }}
                {{ Form::radio('start', '0', false, ['class' => 'start']) }}
                {{ Form::label('start2', '自宅:') }}
                {{ Form::radio('start', '1', false, ['class' => 'start']) }}
                </div>
                <select id="location_list" class="end hide" name="end" size="10">
                    <option value='' disabled selected style='display:none;'>選択してください</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
                <div class="location_list hide">
                {{ Form::input('text', 'list_word', '', ['class' => 'search','id' => 'list_word']) }}
                <p id="list_search" class="btn btn-primary">検索</p>
                </div>
                <div class="form-group submit hide">
                    {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection