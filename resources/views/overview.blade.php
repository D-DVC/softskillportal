@extends('layouts.app')

@section('content')

@foreach($data as $characters)
    <div class="char">
        <li>Name : {{$characters->name}}</li>
        <li>Gender : {{$characters->gender}}</li>
        <li>Race : {{$characters->race}}</li>
        <li>Class : {{$characters->class}}</li>
        <li>Hair colour : {{$characters->hair}}</li>
        <li>Skin colour : {{$characters->skin}}</li>
        <li>Eye colour : {{$characters->eyes}}</li>
        <li>Age (years) : {{$characters->age}}</li>
        <li>Size (height cm) : {{$characters->size}}</li>
        <li>Weight (kg) : {{$characters->weight}}</li>
        <li>Special features : {{$characters->appearance}}</li>
    </div>
@endforeach

<style>
.char{
    margin:0 auto;
    font-family:Arial;
    width:600px;
    border: solid;
    border-color: red;

}
</style>