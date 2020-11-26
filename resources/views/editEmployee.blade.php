@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>
                @foreach($employee as $emp)
                <form method="POST" action="{{ route('updateEmployee') }}">
                @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="hidden" value="{{ $emp->id }}" name="id">
                                <input type="text" class="form-control" id="" name="name" placeholder="Name" value="{{ $emp->name }}">
                                <p>{{ $errors->first('name') }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="" name="email" placeholder="Email" value="{{ $emp->email }}">
                                <p>{{ $errors->first('email') }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Company</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="company_id">
                                    @foreach($companies as $company)
                                        @php
                                            $selected = '';
                                            if($company->id == $emp->company_id) {

                                                $selected = 'selected';
                                            }
                                            else {

                                                $selected = '';
                                            }
                                        @endphp
                                        <option value="{{ $company->id }}" <?= $selected; ?>>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                <p>{{ $errors->first('company_id') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
