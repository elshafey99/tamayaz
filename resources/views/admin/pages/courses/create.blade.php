@extends('admin.layouts.app')
@section('content')

<main class="main-wrapper">
    <div class="main-content">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-xl-8">

                <div class="card shadow rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">Add New Course</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <!-- Course Name -->
                                <div class="col-md-6">
                                    <label for="name_ar" class="form-label">اسم الكورس</label>
                                    <input type="text" class="form-control" name="name_ar" placeholder="ادخل اسم الكورس">
                                    @error('name_ar') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="name_en" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" name="name_en" placeholder="Enter course name">
                                    @error('name_en') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-6">
                                    <label for="description_ar" class="form-label">الوصف</label>
                                    <textarea class="form-control" rows="4" name="description_ar" placeholder="ادخل الوصف"></textarea>
                                    @error('description_ar') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="description_en" class="form-label">Description</label>
                                    <textarea class="form-control" rows="4" name="description_en" placeholder="Enter description"></textarea>
                                    @error('description_en') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <!-- Images and Files -->
                                <div class="col-md-6">
                                    <label for="img" class="form-label">Upload Images</label>
                                    <input type="file" class="form-control" name="image[]" multiple>
                                    @error('image') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="file" class="form-label">Upload Files</label>
                                    <input type="file" class="form-control" name="file[]" multiple>
                                    @error('file') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <!-- Links -->
                                <div class="col-md-6">
                                    <label for="link_zoom" class="form-label">Zoom Link</label>
                                    <input type="text" class="form-control" name="link_zoom" placeholder="Enter Zoom Link">
                                    @error('link_zoom') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="video" class="form-label">Iframe Video Link</label>
                                    <input type="text" class="form-control" name="video" placeholder="Enter iframe link">
                                    @error('video') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <!-- Price & Status -->
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Course Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price">
                                    @error('price') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">stage</label>
                                    <select class="form-control" name="stage_id">
                                        <option value="">Select Status</option>
                                        @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}">{{ $stage->{'name_' . app()->getLocale()} }}</option>
                                        @endforeach


                                    </select>
                                    @error('stage_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">grade</label>
                                    <select class="form-control" name="grade_id">
                                        <option value="">Select Status</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->{'name_' . app()->getLocale()} }}</option>
                                        @endforeach


                                    </select>
                                    @error('grade_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="instructor_id" class="form-label">Select Instructors</label>
                                    <select name="instructor_id[]" class="form-control">
                                        @foreach($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->{'name_' . app()->getLocale()} }}</option>
                                        @endforeach
                                    </select>
                                    @error('instructor_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success px-5 py-2">Add Course</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
