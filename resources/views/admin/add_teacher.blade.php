<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Teacher</title>
    <style>
      li{
        color:red;
      }
    </style>
</head>
<body>
  <a href="{{route('admin.home')}}">Back</a>
    <h1>Register Teacher</h1>
    <hr>
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li>
            {{$error}}
      </li>
      @endforeach
    </ul>
        
    @endif
    <form action="{{route('register_teacher')}}" method="post">
        @csrf
        <input type="hidden" name="role" value="teacher">
        <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}"><br><br>
        <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"><br><br>
        <input type="text" name="email" placeholder="Email" value="{{old('email')}}"><br><br>
        <input type="text" name="password" placeholder="Password" value="{{old('password')}}">
        <input type="submit" value="Register">
    </form>
    <br><hr>

    <table border>
        <thead>
          <tr>
            <th>#</th>
            <th>role</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>
                <th>#</th>
                <td>{{$teacher->role}}</td>
                <td>{{$teacher->first_name}}</td>
                <td>{{$teacher->last_name}}</td>
                <td>{{$teacher->email}}</td>
            </tr>
            @endforeach
          
        </tbody>
      </table>
</body>
</html>