@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Leerlingen toevoegen</h2>
            </div>
            <div class="col-md-2 offset-3">
                <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
        <br>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        {!! Form::open(array('route' => 'storeList','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Leerlingen:</strong>
                    {!! Form::textarea('name', null, array('placeholder' => '99034633,','class' => 'form-control input-lg')) !!}
                    <small id="nameHelp" class="form-text text-muted">U kunt een lijst plakken met leerlingnummers geschijden met een comma.</small>
                    <small id="nameHelp" class="form-text text-muted">De laatste leerling moet geen comma bevatten.</small>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>group:</strong>
                    {!! Form::select('groups[]', $groups,[], array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection