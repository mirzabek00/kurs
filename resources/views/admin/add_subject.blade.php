<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Subject</title>
</head>
<body>
    <h1>Create new subject</h1>
    <form action="{{route('create_subject')}}" method="post">
        @csrf
        <label for="name">Subject Name:</label>
        <input type="text" name="name" id="name" placeholder="e.g. Computer Science">
        <input type="submit" value="Create">
    </form>
</body>
</html>