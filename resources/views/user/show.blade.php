@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row border-bottom border-primary">
            <div class="col-md-6 ">
                <h2>{{$user->name}}'s Profile</h2>
            </div>
            <div class="col-md-4 offset-2">
                <a class="btn btn-secondary " href="{{ route('users.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit Profile</a>
            </div>

        </div>
        <br>
        <div class="row">
            <div style="height: 75px;" class="bg-secondary d-flex align-items-center d-flex justify-content-center col-md-1 border rounded border-secondary">
               <strong>D&D</strong>
            </div>
            <div class="col-md-2">
                <h5 >{{$user->name}}</h5>
                {{$user->email}}
                @foreach ($user->groups as $group)

                    @if($group->pivot->user_id === $user->id)
                        <a class="" href="{{ route('groups.show',  $group->id) }}">{{ $group->name }}</a>
                    @endif
                @endforeach
            </div>
            <div class="col-md-1">
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
@endsection