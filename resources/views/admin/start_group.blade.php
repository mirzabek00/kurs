<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Start group</title>
</head>
<body>
    <h1>Start Group</h1>
    <form action="{{route('start_group')}}" method="post">
        @csrf
        <label for="teacher">Select Teacher:</label>
        <select name="teacher_id" id="teacher">
            @foreach ($teachers as $t)
            <option value="{{$t->id}}">{{$t->first_name}} {{$t->last_name}}</option>
            @endforeach
        </select><br><br>
        <label for="group">Select Group:</label>
        <select name="group_id" id="group">
            @foreach ($groups as $g)
            <option value="{{$g->id}}">{{$g->name}}</option>
            @endforeach
        </select>
        <br><br>
        <label for="subject">Select Subject:</label>
        <select name="subject_id" id="subject">
            @foreach ($subjects as $s)
            <option value="{{$s->id}}">{{$s->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Start">
    </form>
</body>
</html>