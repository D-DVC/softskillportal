@extends('layouts.app')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Group Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('groups.create') }}"> Create New Group</a>
            <a class="btn btn-success" href="{{ route('users.index') }}"> return to Users</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $group)
        <tr>
            <td>{{ $group->id }}</td>>
            <td>{{ $group->name }}</td>>
            <td>
                <a class="btn btn-info" href="{{ route('groups.show',$group->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('groups.edit',$group->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['groups.destroy', $group->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>


