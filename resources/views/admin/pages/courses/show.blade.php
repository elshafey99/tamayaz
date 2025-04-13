@extends('admin.layouts.app')
@section('content')

<main class="main-wrapper">
    <div class="main-content">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-xl-8">
                <div class="card shadow rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">Course Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">

                            <div class="col-md-6">
                                <strong>اسم الكورس:</strong>
                                <p>{{ $course->name_ar }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Course Name:</strong>
                                <p>{{ $course->name_en }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>الوصف:</strong>
                                <p>{{ $course->description_ar }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Description:</strong>
                                <p>{{ $course->description_en }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Zoom Link:</strong>
                                <p><a href="{{ $course->link_zoom }}" target="_blank">{{ $course->link_zoom }}</a></p>
                            </div>

                            <div class="col-md-6">
                                <strong>Iframe Video:</strong>
                                <p>{!! $course->video !!}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Price:</strong>
                                <p>{{ $course->price }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Status:</strong>
                                <p>
                                    @if($course->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <strong>Stage:</strong>
                                <p>{{ $course->stage?->name_en }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Grade:</strong>
                                <p>{{ $course->grade?->name_en }}</p>
                            </div>

                            <div class="col-md-12">
                                <strong>Instructor(s):</strong>
                                <ul>
                                    @foreach($course->instructors as $instructor)
                                        <li>{{ $instructor->name_en }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-md-12">
                                <strong>Images:</strong>
                                <div class="d-flex flex-wrap gap-2">
                                    {{-- @if(is_array($course->image)) --}}
                                    @foreach ((array) $course->image as $img)
                                        {{-- @dd($img) --}}
                                    <img src="{{ $img }}" alt="Image" width="120" class="rounded border">
                                        @endforeach
                                    {{-- @else
                                        <p>No images available.</p>
                                    @endif --}}
                                </div>
                            </div>


                            <div class="col-md-12">
                                <strong>Files:</strong>
                                <ul>
                                    @if(is_array($course->file))
                                    @foreach ((array) $course->file as $fil)
                                        <li><a href="{{ asset($fil) }}" target="_blank">{{ $file }}</a></li>
                                    @endforeach
                                    @else
                                    <p>No files available.</p>
                                @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
