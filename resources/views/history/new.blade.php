@extends('layouts.route_layout')

@section('content')
    <div class="container form-area">
        <a href={{ route('history.list') }} class="btn btn-outline-primary">戻る</a> 
        <div class="row justify-content-around">
            <p>氏名：</p>
            <p>{{ $member->name }}</p>
            <p>自宅住所：</p>
            <p>{{ $member->address }}</p>
            <p>本社住所：</p>
            <p>{{ $headquarters->address }}</p>
        </div>
        {{ Form::open(['route' => 'history.store']) }}
            <div class="row text-center">
                {{ Form::hidden('member_id', $member->id, ['id' => 'member_id']) }}
                {{ Form::hidden('distance', "", ['id' => 'distance']) }}
                <div class="col-sm-12 col-md-2">
                {{ Form::input('date', 'trip_date', '', ['class' => 'trip_date']) }}
                {{ $errors->first('trip_date') }}
                </div>
                <div class="col-sm-12 col-md-2 start_check hide">
                    <p>出発地</p>
                    {{ Form::label('start1', '本社:') }}
                    {{ Form::radio('start', '0', false, ['class' => 'start']) }}
                    {{ Form::label('start2', '自宅:') }}
                    {{ Form::radio('start', '1', false, ['class' => 'start']) }}
                    {{ $errors->first('start') }}
                </div>
                <div class="row col-sm-12 col-md-4 location_list hide">
                    <p>目的地</p>
                    <select id="location_list" class="end" name="location_id" size="4">
                        <option value='' disabled selected style='display:none;'>選択してください</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                    <div>
                    {{ Form::input('text', 'list_word', '', ['class' => 'search','id' => 'list_word']) }}
                    <p id="list_search" class="btn btn-primary">検索</p>
                    </div>
                    {{ $errors->first('end') }}
                </div>
                <div class=" col-sm-12 col-md-2 submit hide">
                    {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection