
@extends('layout.main')

@section('content')
<div>
    <hr>
    <div>
        <form action="{{ route('worker.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
            <input type="text" name="description" placeholder="description"
                   value="{{ request()->get('description') }}">
            <input id="isMarried" type="checkbox" name="is_married"
                {{ request()->get('is_married') == 'on' ? ' checked' : ''}}
            >
            <label for="isMarried">Is married</label>
            <input type="submit">
            <a href="{{ route('worker.index') }}">Reset</a>
        </form>
    </div>
         <hr>
        @foreach($workers as $worker)
            <div>
                <div>Name: {{$worker->name}}</div>
                <div>Surname: {{$worker->surname}}</div>
                <div>Email: {{$worker->email}}</div>
                <div>Age: {{$worker->age}}</div>
                <div>Description: {{$worker->description}}</div>
                <div>Is_married: {{$worker->is_married}}</div>
                <div>
                    <a href="{{route('worker.show',$worker->id)}}">Look</a>
                    <div>
                        <a href="{{route('worker.edit',$worker->id)}}">Edit</a>
                    </div>
                    <div>
                        <a href="{{route('worker.create')}}">Add</a>
                    </div>
                    <div>
                        <form action="{{route('worker.delete', $worker->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        <hr>
        @endforeach
    <div class="my-nav">
        {{$workers->withQueryString()->links()}}
    </div>



</div>
@endsection

