@extends('admin.layout.layout')
@section('title', 'Edit Contact Info')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Edit Contact Info</h4>
                                <a href="{{ route('contact-queries.index') }}" class="btn btn-dark"><i
                                        class="fas fa-arrow-left"></i> Back To List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('contact-queries.update', $contact->id) }}" method="POST"
                                    class="container mt-4">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ $contact->email }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ $contact->phone }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Address</label>
                                            <input type="text" name="address" value="{{ $contact->address }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Location</label>
                                            <input type="text" name="location" value="{{ $contact->location }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3 d-none">
                                            <label>Latitude</label>
                                            <input type="text" name="lat" value="{{ $contact->lat }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3 d-none">
                                            <label>Longitude</label>
                                            <input type="text" name="long" value="{{ $contact->long }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Facebook</label>
                                            <input type="url" name="facebook" value="{{ $contact->facebook }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Instagram</label>
                                            <input type="url" name="instagram" value="{{ $contact->instagram }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>LinkedIn</label>
                                            <input type="url" name="linkedin" value="{{ $contact->linkedin }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Twitter</label>
                                            <input type="url" name="twitter" value="{{ $contact->twitter }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Update Contact Info</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
