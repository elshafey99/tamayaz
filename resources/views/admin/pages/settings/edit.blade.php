@extends('admin.layouts.app')
@section('content')
  <main class="main-wrapper">
    <div class="main-content">
    <div class="row mb-5 justify-content-center">
      <div class="col-12 col-xl-8">
      <div class="card">
        <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update', $settings->id) }}"
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
            <textarea class="form-control" name="description_en"
              placeholder="Enter description">{{ $settings->description_en }}</textarea>
            </div>
            @error('description_en')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
            <div class="col-md-6">
            <textarea class="form-control" name="description_ar"
              placeholder="ادخل الوصف">{{ $settings->description_ar }}</textarea>
            @error('description_ar')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
            </div>
          </div>
          <div class="row my-4">
            <div class="col-md-6">
            <textarea class="form-control" name="facebook"
              placeholder="Enter facebook link">{{ $settings->facebook }}</textarea>
            </div>
            @error('facebook')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
            <div class="col-md-6">
            <textarea class="form-control" name="twitter"
              placeholder="Enter twitter link">{{ $settings->twitter }}</textarea>
            @error('twitter')
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