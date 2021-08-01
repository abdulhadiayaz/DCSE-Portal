@extends('layouts.main')

@section('content')

    <div class="container justify-content-center"  style="margin-bottom: 8rem; margin-top: 10rem">
        <h1>Companies</h1>
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $company->logo ? asset($company->logo) : asset('avatar/man.jpg') }}" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $company->company_name }}</h5>
                        <div style="text-align: center;"><a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="btn btn-primary">View Company</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br>
        {{ $companies->render() }}
    </div>

@endsection
