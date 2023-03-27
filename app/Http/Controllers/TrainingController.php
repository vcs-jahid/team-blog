<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public $categories, $trainings, $training;

    public function index()
    {
        $this->categories = Category::all();
        return view('teacher.training.index', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Training::createTraining($request);
        return back()->with('message', 'Training Successfuly Added!');
    }

    public function manage()
    {
        $this->trainings = Training::all();
        return view('teacher.training.manage', ['trainings' => $this->trainings]);
    }

    public function search(Request $request)
    {
        $this->trainings = Training::where('title', 'like', '%' . $request->search . '%')->get();
        return view('teacher.training.manage', ['trainings' => $this->trainings]);
    }

    public function edit($id)
    {
        $this->categories = Category::all();
        $this->training = Training::find($id);
        return view('teacher.training.edit', ['training' => $this->training, 'categories' => $this->categories]);
    }

    public function update(Request $request, $id)
    {
        Training::updateTraining($request, $id);
        return redirect('training/manage')->with('message', 'Successfully Updated!');
    }

    public function delete($id)
    {
        Training::deleteTraining($id);
        return redirect('training/manage')->with('message', 'Successfully Deleted!');
    }
}
