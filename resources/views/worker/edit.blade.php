
@extends('layout.main')

@section('content')
<div>
         <hr>
            <div>
                <form action="{{route('workers.update',$worker->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    @error('name')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="text" name="name" placeholder="name" value="{{old('name') ?? $worker->name}}"></div>
                    @error('surname')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="text" name="surname" placeholder="surname" value="{{old('surname') ?? $worker->surname}}"></div>
                    @error('email')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="email" name="email" placeholder="email" value="{{ old('email') ?? $worker->email}}"></div>
                    @error('age')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="number" name="age" placeholder="age" value="{{old('age') ?? $worker->age}}"></div>
                    @error('description')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><textarea name="description" type="description" placeholder="description">
                            {{old('description') ?? $worker->description}}
                        </textarea></div>
                    @error('is_married')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px">
                        <label for="is_married">Is_married</label>
                        <input id="is_married" type="checkbox" name="is_married"
                            {{$worker->is_married ? 'checked' : ''}}
                        >
                    </div>
                    <div style="margin-bottom: 10px"><button type="submit" value="Save">Save</button></div>
                </form>
            </div>
                   <a href="{{route('workers.index')}}">Back</a>
</div>

@endsection
