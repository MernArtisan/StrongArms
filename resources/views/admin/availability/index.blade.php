@extends('admin.layout.layout')
@section('title', 'Availability')
@section('content')
    @php
        $isProvider = Auth::check() && Auth::user()->hasRole('provider');
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Availability List</h1>
                <div class="section-header-button ml-auto">
                    @if ($isProvider)
                        <a href="{{ route('avail.create') }}" class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add Availability
                        </a>
                    @else
                        @can('service-create')
                            <a href="#" class="btn btn-dark">
                                <i class="fas fa-plus"></i> Add Availability
                            </a>
                        @endcan
                    @endif
                </div>
            </div>
            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Availability Records</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                @if(!$isProvider)
                                                <th>Provider</th>
                                                @else
                                                @endif
                                                <th>Service</th>
                                                <th>Date</th>
                                                <th>Time Slot</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($availability as $avail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    

                                                     @if(!$isProvider)
                                               <td>{{ $avail->provider->store_name ?? '-' }}</td>
                                                @else
                                                @endif
                                                    <td>{{ $avail->service->name ?? '-' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($avail->date)->format('d M, Y') }}</td>
                                                    <td>{{ $avail->time_slot }}</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-{{ $avail->status == 'available' ? 'success' : 'danger' }} status-toggle"
                                                            style="cursor: pointer;" data-id="{{ $avail->id }}"
                                                            data-status="{{ $avail->status }}">
                                                            {{ ucfirst($avail->status) }}
                                                        </span>

                                                    </td>

                                                    <td>
                                                        <div style="display: flex; align-items: center;">
                                                            @if ($isProvider)
                                                                <form action="{{ route('avail.delete', $avail->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                                    style="margin: 0;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                @can('service-delete')
                                                                    <form action="{{ route('avail.delete', $avail->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                                        style="margin: 0;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            @endif
                                                        </div>
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

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.status-toggle').on('click', function() {
                let badge = $(this);
                let id = badge.data('id');
                let currentStatus = badge.data('status');
                let newStatus = currentStatus === 'available' ? 'unavailable' : 'available';

                $.ajax({
                    url: "{{ route('avail.changeStatus') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: newStatus
                    },
                    success: function(response) {
                        badge.data('status', newStatus);
                        badge.text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
                        badge.removeClass('badge-success badge-danger')
                            .addClass(newStatus === 'available' ? 'badge-success' :
                                'badge-danger');
                    },
                    error: function() {
                        alert('Failed to update status.');
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable();
        });
    </script>



@endsection
