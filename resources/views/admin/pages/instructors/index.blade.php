@extends('admin.layouts.app')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Instructor</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.instructors.create') }}"><button
                                style="background-color: #0A1056; color: #fff;" class="btn my-2">Add Instructor
                            </button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" name="vehicle1" value="Bike"></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>Subject</th>
                                    <th>Img</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>
                                        <td><input class="item" type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $instructor->{'name_' . app()->getLocale()} }}</td>
                                        <td>{{ $instructor->{'description_' . app()->getLocale()} }}</td>
                                        <td>{{ $instructor->{'position_' . app()->getLocale()} }}</td>
                                        <td><img src="{{ $instructor->image }}" alt="" class="img-thumbnail rounded-circle"
                                                style="width: 40px; height: 40px; object-fit: cover;"></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin.instructors.edit', $instructor->id) }}"><button
                                                    type="button" class="btn btn-warning me-2"><i
                                                        class="fas fa-edit"></i></button> </a>
                                            <a href="{{ route('admin.instructors.show', $instructor->id) }}">
                                                <button type="button" class="btn btn-primary me-2" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger delete-btn"
                                                data-id="{{ $instructor->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let id = this.getAttribute('data-id');

                    Swal.fire({
                        title: '{{ __('Are you sure?') }}',
                        text: "{{ __('Do you want to delete this item') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DC143C',
                        cancelButtonColor: '#696969',
                        cancelButtonText: "{{ __('Cancel') }}",
                        confirmButtonText: '{{ __('Yes, delete it!') }}'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let form = document.createElement('form');
                            form.action = '{{ url('/admin/instructors') }}/' + id;
                            form.method = 'POST';
                            form.style.display = 'none';

                            let csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = '{{ csrf_token() }}';

                            let methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'DELETE';

                            form.appendChild(csrfInput);
                            form.appendChild(methodInput);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush