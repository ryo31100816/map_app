<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="form-check form-check-inline">
            {{ Form::radio('search', 'name', true, ['id' => 'name_search', 'class' => 'form-check-input']) }}
            {{ Form::label('name_search', '名前で検索', ['class' => 'form-check-label']) }}
        </div>
        <div class="form-check form-check-inline">
            {{ Form::radio('search', 'address', false, ['id' => 'address_search', 'class' => 'form-check-input']) }}
            {{ Form::label('address_search', '住所で検索', ['class' => 'form-check-label']) }}
        </div>
        <div id="search" class="btn btn-primary">取得</div>
    </div>
    <div class="row">
        <div class="form-group col-lg-1">
            {{ Form::label('name', 'Name:') }}
        </div>
        <div class="form-group col-lg-5">
            {{ Form::text('name', null, ['id' => 'name', 'class' => 'area']) }}
            {{ $errors->first('name') }}
        </div>
        <div class="form-group col-lg-1">
            {{ Form::label('address', 'Address:') }}
        </div>
        <div class="form-group col-lg-5">
            {{ Form::text('address', null, ['id' => 'address', 'class' => 'area']) }}
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
    {{ Form::submit('登録', ['class' => 'btn btn-primary ml-3']) }}
</div>