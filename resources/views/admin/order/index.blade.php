@extends('admin.layout.layout')
@section('title', 'Orders')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Orders</h1>
            </div>
            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Order List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><strong>#{{ $order->orderId }}</strong></td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->email }}</td>
                                                    <td>${{ number_format($order->total, 2) }}</td>
                                                    <td>
                                                        <span class="badge bg-success rounded-pill px-3 py-2 shadow-sm"
                                                            style="font-size: 0.9rem;">
                                                            Paid
                                                        </span>
                                                    </td>
                                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <div style="display: flex; align-items: center;">
                                                            <a href="{{ route('order.show', $order->id) }}"
                                                                class="btn btn-sm btn-warning mr-2">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            {{-- <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-info mr-2">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this order?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form> --}}
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
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable();
        });
    </script>
@endsection
