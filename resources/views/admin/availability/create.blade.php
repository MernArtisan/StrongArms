@extends('admin.layout.layout')
@section('title', 'Add Availability')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Availability</h1>
                <div class="ml-auto">
                    <a href="{{ route('avail.index') }}" class="btn btn-dark">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Availability Form</h4>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <form id="availabilityForm" action="{{ route('avail.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="service_id">Service</label>
                                        <select name="service_id" class="form-control" required>
                                            <option value="">Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Time Slot</label>
                                        <div class="d-flex gap-2">
                                            <input type="time" id="start_time" class="form-control" required>
                                            <span class="px-2">to</span>
                                            <input type="time" id="end_time" class="form-control" required>
                                        </div>
                                        <input type="hidden" name="time_slot" id="time_slot">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="available">Available</option>
                                            <option value="unavailable">Unavailable</option>
                                        </select>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Availability</button>
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

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#availabilityForm').validate({
                rules: {
                    service_id: "required",
                    date: "required",
                    time_slot: "required",
                    status: "required"
                },
                messages: {
                    service_id: "Please select a service",
                    date: "Please select a date",
                    time_slot: "Please enter a time slot",
                    status: "Please select a status"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const start = document.getElementById('start_time');
            const end = document.getElementById('end_time');
            const combined = document.getElementById('time_slot');

            function updateTimeSlot() {
                if (start.value && end.value) {
                    combined.value = `${start.value} - ${end.value}`;
                }
            }

            start.addEventListener('change', updateTimeSlot);
            end.addEventListener('change', updateTimeSlot);
        });
    </script>

@endsection
