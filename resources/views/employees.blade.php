@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Employee List') }}
                    <div class="float-right">
                        <a href="{{ route('addNewEmployee') }}" type="button" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->company_name }}</td>
                                <td>
                                    <a href="/editEmployee/{{ $employee->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/deleteEmployee/{{ $employee->id }}" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
