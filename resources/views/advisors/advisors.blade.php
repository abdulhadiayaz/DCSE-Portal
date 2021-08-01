@extends('layouts.main')

@section('content')

    <div class="container justify-content-center"  style="margin-bottom: 8rem; margin-top: 10rem">
        <h1>Advisors</h1>
        <div class="row">
            @foreach($advisors as $advisor)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $advisor->logo ? asset($advisor->logo) : asset('avatar/man.jpg') }}" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $advisor->advisor_name }}</h5>
                        <div style="text-align: center;"><a href="{{ route('advisor.show', [$advisor->id, $advisor->slug]) }}" class="btn btn-primary">View Advisor</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br>
        {{ $advisors->render() }}
    </div>

@endsection
