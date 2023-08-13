
@extends('layout.main')

@section('content')
<div>
         <hr>
            <div>
                <div>Name: {{$worker->name}}</div>
                <div>Surname: {{$worker->surname}}</div>
                <div>Email: {{$worker->email}}</div>
                <div>Age: {{$worker->age}}</div>
                <div>Description: {{$worker->description}}</div>
                <div>Is_married: {{$worker->is_married}}</div>
                <div>
                    <a href="{{route('worker.edit',$worker->id)}}">Edit</a>
                    <a href="{{route('worker.index')}}">Back</a>
                </div>
            </div>
        <hr>

</div>

@endsection
