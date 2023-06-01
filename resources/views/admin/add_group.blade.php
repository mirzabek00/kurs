<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add group</title>
</head>
<body>
    <h1>Create new group</h1>
    <form action="{{route('create_group')}}" method="POST">
        @csrf
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name" placeholder="e.g. 1d-Telecom_qq">
        <input type="submit" value="Create">
    </form>
</body>
</html>