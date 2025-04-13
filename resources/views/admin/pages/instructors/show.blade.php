@extends('admin.layouts.app')

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="row mb-5 justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <h3 class="mb-4 text-center">{{ $instructor->{'name_' . app()->getLocale()} }}</h3>

                        <div class="mb-3 text-center">
                            @if($instructor->image)
                                <img src="{{ asset($instructor->image) }}" alt="Instructor Image" class="img-thumbnail" style="max-width: 120px;">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </div>


                        <div class="mb-3">
                            <strong>Description (EN):</strong>
                            <p>{{ $instructor->description_en }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Description (AR):</strong>
                            <p>{{ $instructor->description_ar }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Position (EN):</strong>
                            <p>{{ $instructor->position_en }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Position (AR):</strong>
                            <p>{{ $instructor->position_ar }}</p>
                        </div>

                        <hr>

                        <h5 class="mb-3">Courses:</h5>
                        @if($instructor->courses->count())
                            <ul class="list-unstyled">
                                @foreach($instructor->courses as $course)
                                    <li class="d-flex align-items-center mb-2">
                                        <span class="me-2">{{ $course->{'name_' . app()->getLocale()} ?? 'Untitled Course' }}</span>
                                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No courses assigned.</p>
                        @endif

                        <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary mt-4">Back to Instructors</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
