<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public $teachers, $teacher;
    public function index()
    {
        return view('admin.teacher.index');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'image' => 'required|image|mimes:jpg,png',
            'password' => 'required'
        ]);
        Teacher::createTeacher($request);
        return back()->with('message', 'Successfully User Created');
    }
    public function manage()
    {
        $this->teachers = Teacher::all();
        return view('admin.teacher.manage', ['teachers' => $this->teachers]);
    }

    public function edit($id)
    {
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit', ['teacher' => $this->teacher]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,png',
            'email' => 'email'
        ]);
        Teacher::updateTeacher($request, $id);
        return redirect('/teacher/manage')->with('message', 'Successfully Updated!');
    }

    public function delete($id)
    {
        Teacher::deleteTeacher($id);
        return redirect('/teacher/manage')->with('message', 'Successfully Deleted!');
    }
}
