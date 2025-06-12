@extends('admin.layout.layout')

@section('title', 'Bookings')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Bookings Management</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Provider</th>
                                                <th>Service</th>
                                                <th>Availability Status</th>
                                                <th>Date</th>
                                                <th>Time Slot</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookings as $key => $booking)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                                    <td>{{ $booking->provider->store_name ?? 'N/A' }}</td>
                                                    <td>{{ $booking->service->name ?? 'N/A' }}</td>
                                                    <td>{{ $booking->availability->status }}</td>
                                                    <td>{{ $booking->date }}</td>
                                                    <td>{{ $booking->time_slot }}</td>
                                                    <td>{{ ucfirst($booking->status) }}</td>
                                                    <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                                                    <td>{{ $booking->updated_at->format('Y-m-d H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('bookings.show', $booking->id) }}"
                                                            class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                                        {{-- <form action="#" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
