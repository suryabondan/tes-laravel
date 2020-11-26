@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Company List') }}
                    <div class="float-right">
                        <a href="{{ route('addNewCompany') }}" type="button" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><img src="{{ asset('storage/app/company/'.$company->logo) }}" alt="" style="width:100px; height:100px"></td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="/editCompany/{{ $company->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/deleteCompany/{{ $company->id }}" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
