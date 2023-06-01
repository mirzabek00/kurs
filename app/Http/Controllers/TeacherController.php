<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function teacher_home(){
        $teacher_id = Auth::user()->id;
        $user = User::where('id', $teacher_id)->where('role', 'teacher')->get();
        $teacher = $user[0];
        $groups = DB::table('teachers')->where('teacher_id', $teacher_id)
        ->join('groups', 'groups.id', '=', 'teachers.group_id')
        ->join('subjects', 'subjects.id', '=', 'teachers.subject_id')
        ->select('groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')
        ->get();
        

        return view('teacher.home', compact('groups', 'teacher'));
    }
    public function teacher_group($sub_id, $group_id){
        $teacher_id = Auth::user()->id;
        $user = User::where('id', $teacher_id)->where('role', 'teacher')->get();
        $teacher = $user[0];
        $groups = DB::table('teachers')->where('teacher_id', $teacher_id)
        ->join('groups', 'groups.id', '=', 'teachers.group_id')
        ->join('subjects', 'subjects.id', '=', 'teachers.subject_id')
        ->select('groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')
        ->get();
        
        $works = DB::table('works')->where('works.subject_id', $sub_id)->where('works.teacher_id', $teacher_id)->where('works.group_id', $group_id)
        ->join('users', 'users.id', '=', 'works.student_id')
        ->select('users.id as student_id', 'users.first_name as student_first_name', 'users.last_name as student_last_name', 'works.id as work_id', 'works.file_name as file_name', 'works.score as score', 'works.created_at as created_at')
        ->get();
        // return $works;
       
        return view('teacher.group', compact('groups', 'group_id', 'sub_id', 'teacher', 'works'));
    }
    public function create_score(Request $request, $work_id, $sub_id, $group_id){
        Work::where('id', $work_id)->update(['score'=>$request->score]);
        return redirect()->route('teacher_group', ['sub_id'=>$sub_id, 'group_id'=>$group_id]);
        
    }

}
