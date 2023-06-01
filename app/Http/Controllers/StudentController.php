<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileStoreRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function student_home(){
        $student_id = Auth::user()->id;
        $user = User::where('id', $student_id)->where('role', 'student')->get();
        $student = $user[0];
        $subjects = DB::table('students')->where('student_id', $student_id)
        ->join('subjects', 'subjects.id', '=', 'students.subject_id')
        ->select('subjects.id as subject_id', 'subjects.name as subject_name')
        ->get();
        $group = DB::table('students')->where('student_id', $student_id)
        ->join('groups', 'groups.id', '=', 'students.group_id')
        ->select('groups.id as group_id', 'groups.name as group_name')
        ->get();
        $group = $group[0];
        return view('student.home', compact('subjects', 'student', 'group'));
    }

    public function subject_page($sub_id){
        // ------------------------------
        $student_id = Auth::user()->id;
        $user = User::where('id', $student_id)->where('role', 'student')->get();
        $student = $user[0];
        $subjects = DB::table('students')->where('student_id', $student_id)
        ->join('subjects', 'subjects.id', '=', 'students.subject_id')
        ->select('subjects.id as subject_id', 'subjects.name as subject_name')
        ->get();
        $group = DB::table('students')->where('student_id', $student_id)
        ->join('groups', 'groups.id', '=', 'students.group_id')
        ->select('groups.id as group_id', 'groups.name as group_name')
        ->get();
        $group = $group[0];
        
        $sub = Subject::where('id', $sub_id)->get();
        $subject = $sub[0];
        
        $work = Work::where('subject_id', $subject->id)->where('student_id', auth()->user()->id)->get();
        // $work = $workk[0];
        $workbool = Work::where('subject_id', $subject->id)->where('student_id', auth()->user()->id)->exists();


        $teacher = DB::table('teachers')->where('teachers.group_id', $group->group_id)->where('teachers.subject_id', $sub_id)
        ->join('users', 'users.id', '=', 'teachers.teacher_id')
        ->select('users.id as teacher_id', 'users.first_name as teacher_first_name', 'users.last_name as teacher_last_name')
        ->get();
        $teacher = $teacher[0];
        // --------------------------

        return view('student.subject', compact('subjects', 'student', 'subject', 'group', 'teacher', 'work', 'workbool'));
    }
    public function file_store(FileStoreRequest $request, $teacher_id, $group_id, $subject_id){
        
        $fileName = $request->file_name->getClientOriginalName();
        $data = [
            'subject_id'=>$subject_id,
            'teacher_id'=>$teacher_id,
            'group_id'=>$group_id,
            'student_id'=>auth()->user()->id,
            'file_name'=>$fileName,
        ];
        Work::create($data);
        $request->file_name->move(public_path('works'), $fileName);
        return redirect()->route('student_home');
    }
}
