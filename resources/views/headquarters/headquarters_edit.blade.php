@extends('layouts.layout')

@section('content')
<h1>edit</h1>
    {{ Form::model($headquarters,['route' => ['headquarters.update',$headquarters->id]]) }}
        <div class='form-group'>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('編集する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('headquarters.show', ['id' => $headquarters->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection