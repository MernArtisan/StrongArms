@extends('admin.layout.layout')
@section('title', 'Admin Profile')
@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>My Profile</h1>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="edit-tab" data-bs-toggle="tab" href="#edit" role="tab">Edit Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab">Change Password</a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="profileTabsContent">
                <!-- Edit Profile Tab -->
                <div class="tab-pane fade show active" id="edit" role="tabpanel">
                  <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                      <label class="form-label">First Name</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Phone</label>
                      <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="mb-3">
                      <label>Gender</label>
                      <select name="gender" class="form-control" id="gender">
                        <option value="">Select</option>
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                      </select>
                    </div>
                    

                    <div class="mb-3">
                      <label class="form-label">Website</label>
                      <input type="text" name="website" class="form-control" value="{{ old('website', $user->website) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Company</label>
                      <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $user->company_name) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <input type="text" name="address_line" class="form-control" value="{{ old('address_line', $user->address_line) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">City</label>
                      <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">State</label>
                      <input type="text" name="state" class="form-control" value="{{ old('state', $user->state) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Country</label>
                      <input type="text" name="country" class="form-control" value="{{ old('country', $user->country) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Zip</label>
                      <input type="text" name="zip" class="form-control" value="{{ old('zip', $user->zip) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>


                  </form>
                </div>

                <!-- Change Password Tab -->
                <div class="tab-pane fade" id="password" role="tabpanel">
                  <form method="POST" action="{{ route('profile.changePassword') }}">
                    @csrf

                    <div class="mb-3">
                      <label class="form-label">Current Password</label>
                      <input type="password" name="current_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">New Password</label>
                      <input type="password" name="new_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Confirm New Password</label>
                      <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-warning">Update Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Toastr Scripts -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": 5000
  };

  @if (session('success'))
    toastr.success("{{ session('success') }}");
  @endif

  @if (session('error'))
    toastr.error("{{ session('error') }}");
  @endif

 
</script>

@endsection
