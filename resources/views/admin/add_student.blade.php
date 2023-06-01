<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Student</title>
</head>
<body>
    <h1>Register Student</h1>
    <form action="{{route('register_student')}}" method="post">
        @csrf
        <label for="select_group">Select group</label>
        <select name="group_id" id="select_group">
            @foreach ($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select><br><br>
        <input type="hidden" name="role" value="student">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required><br><br>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required><br><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit" id="register">Register</button>
    </form>
    <br><hr>
    <table border>
        <thead>
          <tr>
            <th>#</th>
            <th>Group Name</th>
            <th>role</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th>#</th>
                <td>{{$student->group_name}}</td>
                <td>{{$student->role}}</td>
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td>{{$student->email}}</td>
            </tr>
            @endforeach
          
        </tbody>
      </table>
</body>
</html>