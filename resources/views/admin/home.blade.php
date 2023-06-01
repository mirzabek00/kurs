@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    
    <h1>Admin Home Page</h1>
    <a href="{{route('logout')}}">LogOut</a>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <h2><a href="{{route('add_group_page')}}">Create new Group</a></h2>
                <h2><a href="{{route('add_subject_page')}}">Add Subject</a></h2>
                <h2><a href="{{route('add_student_page')}}">Register Students</a></h2>
                <h2><a href="{{route('add_teacher_page')}}">Register Teacher</a></h2>
            </div>
            <div class="col-6">
                <h2><a href="{{route('star_group_page')}}">Start group: Add Students to Teacher</a></h2>
                <h2><a href="{{route('current_groups_page')}}">Current groups(Hazirgi gruppalar)</a></h2>
            </div>
        </div>
    </div>
        
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
</body>
</html>

@endauth