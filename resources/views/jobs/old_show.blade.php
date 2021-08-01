@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.flash_message')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong><h3>{{ Str::title($job->title) }}</h3></strong></div>

                    <div class="card-body">
                        <div class="cart-title"><h4><strong>Desciption</strong></h4></div>
                        <p>{{ $job->description }}</p>

                        <div class="cart-title"><h4><strong>Roles</strong></h4></div>
                        <p>{{ $job->roles }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <p><b><i class="fa fa-home"></i> Company:</b> <a href="{{ route('company.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->company_name }}</a></p>
                    <p><b><i class="fa fa-map-marker"></i> Address:</b> {{ $job->address  }}</p>
                    <p><b><i class="fa fa-clock-o"></i> Employment Type:</b> {{ $job->type }}</p>
                    <p><b><i class="fa fa-suitcase"></i> Position</b> {{ $job->position }}</p>
                    <p><b><i class="fa fa-calendar"></i> Date:</b> {{ $job->created_at->diffForHumans() }}</p>
                    <p><b><i class="fa fa-clock-o"></i> Application Deadline:</b> {{ date('F j, Y', strtotime($job->deadline)) }}</p>
                </div>
                @if(Auth::check() && Auth::user()->user_type=='seeker')
                    @if(!$job->checkApplication())
                        <apply-component :jobid="{{ $job->id }}"></apply-component>
                    @else
                        <span class="btn btn-block" style="background-color: rgba(131,146,143,0.89); color: white; cursor: default;">Already Applied!</span>
                    @endif
                    <br>
                    <favourite-component :jobid="{{ $job->id }}" :favourited="{{ $job->checkSaved() ? 'true' : 'false' }}"></favourite-component>
                @endif
            </div>
        </div>
    </div>
@endsection

