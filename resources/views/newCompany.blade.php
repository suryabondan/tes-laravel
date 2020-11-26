@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add New Company') }}</div>
                <form method="POST" action="{{ route('saveNewCompany') }}" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="name" placeholder="Company Name" >
                                <p>{{ $errors->first('name') }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="" name="email" placeholder="Email" value="{{ old('email') }}">
                                <p>{{ $errors->first('email') }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo">
                                <p>{{ $errors->first('logo') }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="website" placeholder="Website" value="{{ old('website') }}">
                                <p>{{ $errors->first('website') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
