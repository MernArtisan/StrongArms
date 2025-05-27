@extends('admin.layout.layout')
@section('title', 'Products')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Inquiry</h1>
        
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inquiry List</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>full name</th>
                                            <th>email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($query as $query)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $query->full_name }}
                                                </td>
                                                <td>
                                                    {{ $query->email }}
                                                </td>
                                                <td>
                                                    {{ $query->subject }}
                                                </td>
                                                <td>
                                                    {{ $query->message }}
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
    $(document).ready(function () {
        $('#table-1').DataTable();
    });
</script>
@endsection
