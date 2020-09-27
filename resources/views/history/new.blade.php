@extends('layouts.route_layout')

@section('content')
    {{ Form::open(['route' => 'history.store']) }}
    <div class="container">
        <p>{{ $member->name }}</p>
        <p>{{ $member->address }}</p>
        <p>{{ $headquarters->address }}</p>
        <a href={{ route('history.list') }}>戻る</a>
      {{--  {{ Form::select('location',$locations ,'',['placeholder' => '行先を選択してください']) }} --}}
        {{ Form::open(['route' => 'history.store']) }}
            <div class="row">
                <div class="form-group">
                {{ Form::input('date', 'trip_date', '', ['class' => 'trip_date']) }}
                </div>
                <div class="start_check hide">
                {{ Form::label('start1', '本社:') }}
                {{ Form::radio('start', '本社', false, ['class' => 'start','id' => 'start']) }}
                {{ Form::label('start2', '自宅:') }}
                {{ Form::radio('start', '自宅', false, ['class' => 'start','id' => 'end']) }}
                </div>
                <select class="end hide" name="end" size="10">
                    <option value='' disabled selected style='display:none;'>選択してください</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
                <div class="location_list hide">
                {{ Form::input('text', 'search', '', ['class' => 'search','v-model' => 'location_search']) }}
                <p id="locaiton_list" class="btn btn-primary">検索</p>
                </div>
                <div class="form-group submit hide">
                    {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}


        <div class="row">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', '東京駅', ['id' => 'start_name']) }}
            
                {{ Form::label('address', 'Address:') }}
                {{ Form::text('address', null, ['id' => 'start_address']) }}

                {{ Form::label('latitude', 'Latitude:') }}
                {{ Form::text('latitude', null, ['id' => 'start_latitude']) }}

                {{ Form::label('longitude', 'Longitude:') }}
                {{ Form::text('longitude', null, ['id' => 'start_longitude']) }}
        </div>
        <div class="row">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', '甲府駅', ['id' => 'end_name']) }}

                {{ Form::label('address', 'Address:') }}
                {{ Form::text('address', null, ['id' => 'end_address']) }}

                {{ Form::label('latitude', 'Latitude:') }}
                {{ Form::text('latitude', null, ['id' => 'end_latitude']) }}

                {{ Form::label('longitude', 'Longitude:') }}
                {{ Form::text('longitude', null, ['id' => 'end_longitude']) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection