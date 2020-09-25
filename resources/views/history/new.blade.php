@extends('layouts.route_layout')

@section('content')
    {{ Form::open(['route' => 'history.store']) }}
    <div class="container">
        <p>{{ $member->name }}</p>
        <p>{{ $member->address }}</p>
        <p>{{ $headquarters->address }}</p>
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
      {{--  {{ Form::select('location',$locations ,'',['placeholder' => '行先を選択してください']) }} --}}
        <select name="location" size="10">
            <option value='' disabled selected style='display:none;'>選択してください</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('history.list') }}>戻る</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection