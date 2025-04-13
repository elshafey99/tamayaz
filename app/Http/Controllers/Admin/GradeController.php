<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Grade\GradeRequest;

class GradeController extends Controller
{
    public function __construct(public Grade $model){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->paginate();
        return view('admin.pages.grade.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all();
        return view('admin.pages.grade.create', compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
       $data = $request->validated();

        $this->model->create($data);

        return redirect()->route('admin.grades.index')->with('success','Created grade');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grade = $this->model->findOrFail($id);
        return view('admin.pages.grade.show',compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = $this->model->findOrFail($id);
        $stages = Stage::all();
        return view('admin.pages.grade.edit',compact('grade','stages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, string $id)
    {
        $data = $request->validated();
        $grade = $this->model->findOrFail($id);

        $grade->update($data);

         return redirect()->route('admin.grades.index')->with('success','Updated grade');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = $this->model->findOrFail($id);
        $grade->delete();
        return redirect()->route('admin.grades.index')->with('success','Deleted grade');

    }
}
