<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Create page
<div>
         <hr>
            <div>
                <form action="{{route('worker.store')}}" method="POST">
                    @csrf
                    @error('name')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="text" name="name" placeholder="name" value="{{old('name')}}"></div>
                    @error('surname')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="text" name="surname" placeholder="surname" value="{{old('surname')}}"></div>
                    @error('email')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="email" name="email" placeholder="email" value="{{old('email')}}"></div>
                    @error('age')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><input type="number" name="age" placeholder="age" value="{{old('age')}}"></div>
                    @error('description')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px"><textarea name="description" type="description" placeholder="description">{{old('description')}}</textarea></div>
                    @error('is_married')<div>{{$message}}</div>@enderror
                    <div style="margin-bottom: 10px">
                        <label for="is_married">Is_married</label>
                        <input
                            {{old('is_married')=='on' ? 'checked' : ''}}
                            id="is_married" type="checkbox" name="is_married">
                    </div>
                    <div style="margin-bottom: 10px"><button type="submit" value="Add">Add</button></div>
                </form>
            </div>
                     <a href="{{route('worker.index')}}">Back</a>
</div>

</body>
</html>
