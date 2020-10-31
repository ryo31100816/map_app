@extends('layouts.map_layout')

@section('content')
    <div class="container-fluid">
        <a href={{ route('headquarters.show', ['id' => $headquarters->id]) }} class="btn btn-outline-primary">戻る</a>
    </div>
    {{ Form::model($headquarters,['route' => ['headquarters.update',$headquarters->id]]) }}
    <div class="container">
    {{ Form::radio('search', 'address',true, ['id' => 'address_search', 'class' => 'form-check-input hide']) }}
        <div class="row">
            <div class="form-group col-lg-1">
                {{ Form::label('address', 'Address:') }}
            </div>
            <div class="form-group col-lg-11">
                {{ Form::text('address', null, ['class' => 'area']) }}
                {{ $errors->first('address') }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                {{ Form::label('latitude', 'Lat:') }}
            </div>
            <div class="form-group col-lg-5">
                {{ Form::text('latitude', null, ['id' => 'latitude', 'class' => 'area']) }}
                {{ $errors->first('latitude') }}
            </div>
            <div class="form-group col-lg-1">
                {{ Form::label('longitude', 'Lng:') }}
            </div>
            <div class="form-group col-lg-5">
                {{ Form::text('longitude', null, ['id' => 'longitude', 'class' => 'area']) }}
                {{ $errors->first('longitude') }}
            </div>
        </div>
        <div id="search" class="btn btn-primary">取得</div>
        {{ Form::submit('編集', ['class' => 'btn btn-primary ml-3']) }}
    </div>     
    {{ Form::close() }}
@endsection