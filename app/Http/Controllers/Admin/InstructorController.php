<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Instructor\InstructorRequest;

class InstructorController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::paginate();
        return view('admin.pages.instructors.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorRequest $request)
    {
        $validatedData = $request->validated();
        if($validatedData['image'])
        {
            $validatedData['image'] = $this->saveImage($validatedData['image'], 'instructors');
        }
            Instructor::create($validatedData);
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.pages.instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.pages.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, string $id)
    {
        $instructor = Instructor::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($instructor->image) {
                $this->deleteImage($instructor->image);
            }
            $validatedData['image'] = $this->saveImage($validatedData['image'], 'instructors');
        }

        $instructor->update($validatedData);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::findOrFail($id);
        if ($instructor->image) {
            $this->deleteImage($instructor->image);
        }
        $instructor->delete();
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully.');
    }
}
