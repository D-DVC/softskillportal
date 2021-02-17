@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Klas: {{$group->name}}</h2>
        </div>
        <div class="col-md-4 offset-2">
            <a class="btn btn-secondary " href="{{ route('users.index') }}"> Back</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$group->id) }}">Edit Klas</a>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $group->name }}
            </div>
        </div>
    </div>
</div>
@endsection
