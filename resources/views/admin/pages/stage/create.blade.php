@extends('admin.layouts.app')
@section('content')
<main class="main-wrapper">
    <div class="main-content">

      <div class="row mb-5 justify-content-center">
        <div class="col-12 col-xl-8">

          <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.stages.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">

                        <div class="row my-4">

                            <div class="col-md-6">


                                <input type="text" class="form-control"  name="name_en" placeholder="Enter Name">

                            </div>
                            @error('name_en')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror

                            <div class="col-md-6">
                                <input type="text" class="form-control"  name="name_ar" placeholder="ادخل الاسم">
                        </div>
                        @error('name_ar')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                      </div>
                  </form>

            </div>
          </div>
        </div>
      </div>



    </div>
  </main>
@endsection
