@extends('admin.layout.layout')
@section('title', 'Providers')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Providers</h1>
                <div class="section-header-button ml-auto">
                    <a href="{{ route('provider.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Provider List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-providers">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Logo</th>
                                                <th>Store Name</th>
                                                <th>Owner Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($providers as $index => $provider)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $provider->logo ? asset($provider->logo) : asset('default.png') }}"
                                                            width="40" height="40" style="border-radius: 50%;">
                                                    </td>
                                                    <td>{{ $provider->store_name }}</td>
                                                    <td>{{ $provider->owner_name }}</td>
                                                    <td>{{ $provider->user->email }}</td>
                                                    <td>{{ $provider->user->phone }}</td>
                                                    <td>{{ $provider->store_location }}</td>
                                                    <td>
                                                        <a href="{{ route('provider.edit', $provider->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('provider.destroy', $provider->user->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- .table-responsive -->
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
            $('#table-providers').DataTable();
        });
    </script>
@endsection
