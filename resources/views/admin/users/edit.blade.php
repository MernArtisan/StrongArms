@extends('admin.layout.layout')
@section('title', 'Edit User')
@section('content')

<div class="main-content">
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>

                    <div class="card-body">

                        <form id="editUserForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ $user->country }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control" value="{{ $user->state }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Zip</label>
                                    <input type="text" name="zip" class="form-control" value="{{ $user->zip }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Website</label>
                                    <input type="text" name="website" class="form-control" value="{{ $user->website }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Company</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ $user->company_name }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" name="address_line" class="form-control" value="{{ $user->address_line }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                    @if ($user->image)
                                        <img src="{{ asset($user->image) }}" width="60" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="updateBtn">Update User</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<script>
$(document).ready(function () {
    $('#editUserForm').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            role: "required",
            gender: "required",
            country: "required",
            state: "required",
            city: "required"
        },
        submitHandler: function (form) {
            $('#updateBtn').prop('disabled', true).text('Updating...');
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('all-users.update', $user->id) }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.success) {
                        toastr.success(res.message);
                        setTimeout(() => {
                            window.location.href = "{{ route('all-users.index') }}";
                        }, 2000);
                    } else {
                        toastr.error(res.message);
                    }
                    $('#updateBtn').prop('disabled', false).text('Update User');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function (key, val) {
                            toastr.error(val[0]);
                        });
                    } else {
                        toastr.error("Something went wrong.");
                    }
                    $('#updateBtn').prop('disabled', false).text('Update User');
                }
            });
        }
    });
});
</script>
@endsection
