<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Stage;
use App\Models\Course;
use App\Traits\HasImage;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CourseRequest;

class CourseController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate();
        return view('admin.pages.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all();
        $grades = Grade::all();
        $instructors = Instructor::all();

        return view('admin.pages.courses.create' ,compact('stages' , 'grades','instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $imageFile) {
                $imagePaths[] = $this->saveImage($imageFile, 'courses');
            }
            $validatedData['image'] = json_encode($imagePaths);
        }
        if ($request->hasFile('file')) {
            $filePaths = [];
            foreach ($request->file('file') as $file) {
                $filePaths[] = $this->saveImage($file, 'courses');
            }
            $validatedData['file'] = json_encode($filePaths);
        }
        // if ($request->hasFile('video')) {
        //     $videoPaths = [];
        //     foreach ($request->file('video') as $video) {
        //         $videoPaths[] = $this->saveImage($video, 'courses');
        //     }
        //     $validatedData['video'] = json_encode($videoPaths);
        // }
        $validatedData['video'] = json_encode($validatedData['video']);

        $course =    Course::create($validatedData);
        $course->instructors()->attach($request->instructor_id); // many-to-many

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $stages = Stage::all();
        $grades = Grade::all();
        $instructors = Instructor::all();

        return view('admin.pages.courses.show', compact('course', 'stages', 'grades', 'instructors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $stages = Stage::all();
        $grades = Grade::all();
        $instructors = Instructor::all();
        return view('admin.pages.courses.edit', compact('course' , 'stages' , 'grades','instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $imageFile) {
                $imagePaths[] = $this->saveImage($imageFile, 'courses');
            }
            $validatedData['image'] = json_encode($imagePaths);
        }
        if ($request->hasFile('file')) {
            $filePaths = [];
            foreach ($request->file('file') as $file) {
                $filePaths[] = $this->saveImage($file, 'courses');
            }
            $validatedData['file'] = json_encode($filePaths);
        }
        // if ($request->hasFile('video')) {
        //     $videoPaths = [];
        //     foreach ($request->file('video') as $video) {
        //         $videoPaths[] = $this->saveImage($video, 'courses');
        //     }
        //     $validatedData['video'] = json_encode($videoPaths);
        // }
        // $validatedData['video'] = addslashes($validatedData['video']);
        // $validatedData['video'] = json_encode($validatedData['video']);
        $validatedData['video'] = htmlspecialchars($validatedData['video']);
        $validatedData['video'] = json_encode($validatedData['video']);

        $course->instructors()->sync($request->instructor_id);


        $course->update($validatedData);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Course = Course::findOrFail($id);
        if ($Course->image) {
            $this->deleteImage($Course->image);
        }
        $Course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
