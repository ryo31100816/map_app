<div class="container">
    <div class="row">
        <div class="form-group col-lg-1">
            {{ Form::label('name', 'Name:') }}
        </div>
        <div class="form-group col-lg-5">
            {{ Form::text('name', null, ['class' => 'area']) }}
            {{ $errors->first('name') }}
        </div>
        <div class="form-group col-lg-1">
            {{ Form::label('address', 'Address:') }}
        </div>
        <div class="form-group col-lg-5">
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
    {{ Form::submit('登録', ['class' => 'btn btn-primary ml-3']) }}
</div>