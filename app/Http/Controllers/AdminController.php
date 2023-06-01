<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_page(){
        return view('admin.home');
    }
    public function add_group_page(){
        return view('admin.add_group');
    }
    public function create_group(Request $request){
        Group::create($request->all());
        return redirect()->route('admin.home');
        
    }
    public function add_subject_page(){
        return view('admin.add_subject');
    }
    public function create_subject(Request $request){
        Subject::create($request->all());
        return redirect()->route('admin.home');
    }
    public function add_student_page(){
        $groups = Group::where('status', 1)->get();
        $students = DB::table('users')->where('role', 'student')
        ->join('groups', 'users.group_id', '=', 'groups.id')
        ->select('users.*', 'groups.name as group_name')
        ->get();
        return view('admin.add_student', compact('groups', 'students'));
    }
    public function register_student(Request $request){
        $validated = $request->validate([
            'group_id' => 'required',
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        $data = [
            'group_id' => $validated['group_id'],
            'role' => $validated['role'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']) 
        ];
        //return $data;
        // $data = [
        //     'group_id' => $request->group_id,
        //      'role' => $request->role,
        //      'first_name' => $request->first_name,
        //      'last_name' => $request->last_name,
        //      'email' => $request->email,
        //      'password' => Hash::make($request->password) 
        // ];
        User::create($data);
        return redirect()->route('add_student_page');
    }
    public function add_teacher_page(){
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.add_teacher', compact('teachers'));
    }
    public function register_teacher(Request $request){
        $validated = $request->validate([
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required'
        ]);
        $data = [
            'role' => $validated['role'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']) 
        ];
        User::create($data);
        return redirect()->route('add_teacher_page');
    }
    public function star_group_page(){
        $teachers = User::where('role', 'teacher')->get();
        $groups = Group::where('status', 1)->get();
        $subjects = Subject::where('status', 1)->get();
        return view('admin.start_group', compact('teachers', 'groups', 'subjects'));
    }
    public function start_group(Request $request){
        if (User::where('group_id', $request->group_id)->exists()) {
            
            Teacher::create($request->all());
            $students = User::where('group_id', $request->group_id)->where('role', 'student')->get();
            foreach ($students as $val) {
                Student::create([
                    'group_id'=>$request->group_id,
                    'subject_id'=>$request->subject_id,
                    'student_id'=>$val->id,
                    'teacher_id'=>$request->teacher_id
                ]);
            }
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('star_group_page');
        }
        
    }

    // $request = {
    //     "teacher_id":"6",
    //     "group_id":"1",
    //     "subject_id":"1"
    // }
    public function current_groups_page(){
        $data = DB::table('teachers')
        ->join('groups', 'teachers.group_id', '=', 'groups.id')
        ->join('users', 'teachers.teacher_id', '=', 'users.id')
        ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
        ->select('teachers.teacher_id as teacher_id', 'users.first_name as teacher_first_name', 'users.last_name as teacher_last_name', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')
        ->get();
        // $result = [];
        foreach ($data as $d) {
            $students = Student::where('group_id', $d->group_id)->where('teacher_id', $d->teacher_id)->where('subject_id', $d->subject_id)->count();
            // $array = (array)$d;
            // array_push($array, ['count_students'=>$students]);
            // array_push($result, $array);

        }
        // return $result;
        return view('admin.current_groups', compact('data'));
    }
}
