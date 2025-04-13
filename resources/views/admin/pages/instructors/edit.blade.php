@extends('admin.layouts.app')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">

            <div class="row mb-5 justify-content-center">
                <div class="col-12 col-xl-8">

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.instructors.update', $instructor->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <div class="row my-4">
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="image">
                                            @error('image')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name_en"
                                                value="{{ $instructor->name_en }}" placeholder="Enter Name">
                                        </div>
                                        @error('name_en')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name_ar"
                                                value="{{ $instructor->name_ar }}" placeholder="ادخل الاسم">
                                        </div>
                                        @error('name_ar')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description_en"
                                                placeholder="Enter description">{{ $instructor->description_en }}</textarea>
                                        </div>
                                        @error('description_en')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">

                                            <textarea class="form-control" name="description_ar"
                                                placeholder="ادخل الوصف">{{ $instructor->description_ar }}</textarea>
                                            @error('description_ar')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="position_en"
                                                value="{{ $instructor->position_en }}" placeholder="Enter position">
                                            @error('position_en')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="position_ar"
                                                value="{{ $instructor->position_ar }}" placeholder="ادخل المنصب">
                                            @error('position_ar')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary w-100">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection