@extends('admin.layout.layout')
@section('title', 'Contact Details')

@section('content')
    <style>
        .info-card {
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        .info-card h5 {
            margin-bottom: 20px;
        }

        .info-card .list-group-item {
            border: none;
            padding: 10px 0;
        }

        .info-card a {
            word-break: break-all;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-0">Contact Details</h4>
                                <a href="{{ route('contact-queries.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card info-card p-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-address-card"></i> Basic Info</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Email:</strong> <span>{{ $contact->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Phone:</strong> <span>{{ $contact->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Address:</strong> <span>{{ $contact->address }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Location:</strong> <span>{{ $contact->location }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Latitude:</strong> <span>{{ $contact->lat }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Longitude:</strong> <span>{{ $contact->long }}</span>
                                    </li>
                                </ul>

                                <h5 class="card-title mt-4"><i class="fas fa-link"></i> Social Media</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Facebook:</strong>
                                        <a href="{{ $contact->facebook }}" target="_blank">{{ $contact->facebook }}</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Instagram:</strong>
                                        <a href="{{ $contact->instagram }}" target="_blank">{{ $contact->instagram }}</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>LinkedIn:</strong>
                                        <a href="{{ $contact->linkedin }}" target="_blank">{{ $contact->linkedin }}</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Twitter:</strong>
                                        <a href="{{ $contact->twitter }}" target="_blank">{{ $contact->twitter }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
