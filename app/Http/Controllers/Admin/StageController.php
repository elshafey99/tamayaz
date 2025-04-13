<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stage\StageRequest;

class StageController extends Controller
{
    public function __construct(public Stage $model){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->paginate();
        return view('admin.pages.stage.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.stage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StageRequest $request)
    {
       $data = $request->validated();

        $this->model->create($data);

        return redirect()->route('admin.stages.index')->with('success','Created stage');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stage = $this->model->findOrFail($id);
        return view('admin.pages.stage.show',compact('stage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stage = $this->model->findOrFail($id);
        return view('admin.pages.stage.edit',compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StageRequest $request, string $id)
    {
        $data = $request->validated();
        $stage = $this->model->findOrFail($id);

        $stage->update($data);

         return redirect()->route('admin.stages.index')->with('success','Updated stage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stage = $this->model->findOrFail($id);
        $stage->delete();
        return redirect()->route('admin.stages.index')->with('success','Deleted stage');

    }
}
