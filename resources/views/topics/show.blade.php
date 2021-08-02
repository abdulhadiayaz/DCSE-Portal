@extends('layouts.main')

@section('content')
    <div class="album text-muted">
        <div class="container" style="margin-top: 3rem;">
            <div class="row" id="app"> <!-- the id app is used to display vue JS components -->

                <div class="title" style="margin-top: 8rem; padding-left: 1rem;">
                    <h2>{{$topic->title}}</h2>
                </div>

                <img src="{{asset('hero-topic-image.jpg')}}" style="width: 100%;">

                <div class="col-lg-8">
                    <br>
                    @include('includes.flash_message')
                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3">Description <a href="#" title="Mail this Advisor to a Friend" data-toggle="modal" data-target="#exampleModal1"><i class="icon-envelope-square" style="font-size: 34px;float:right;color:green;"></i><i class="icon-hand-o-right float-right" style="margin-right: 4px;"></i></a></h3>
                        <p> {{$topic->description}}.</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <!--icon-align-left mr-3-->
                        <h3 class="h5 text-black mb-3">Roles and Responsibilities</h3>
                        <p>{{$topic->roles}} .</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Number of vacancy</h3>
                        <p>{{$topic->number_of_vacancy}}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Experience</h3>
                        <p>{{$topic->experience}} years</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Gender</h3>
                        <p>{{$topic->gender}} </p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Salary</h3>
                        <p>{{$topic->salary}}</p>
                    </div>

                </div>


                <div class="col-md-4 p-4 site-section bg-light">
                    <ul class="list-group">
                        <li class="list-group-item text-center" style="background-color: #f8f9fa">Short Info</li>
                        <li class="list-group-item"><i class="icon-home"></i> <strong>Advisor name: </strong><span class="float-right"> {{$topic->advisor->advisor_name}}</span></li>
                        <li class="list-group-item"><i class="icon-map-marker"></i> <strong>Address:</strong> <span class="float-right"> {{$topic->address}}</span></li>
                        <li class="list-group-item"><i class="icon-globe"></i> <strong>Employment Type:</strong> <span class="float-right"> {{$topic->type}}</span></li>
                        <li class="list-group-item"><i class="icon-briefcase"></i> <strong>Position:</strong> <span class="float-right"> {{$topic->position}}</span></li>
                        <li class="list-group-item"><i class="icon-calendar"></i> <strong>Posted:</strong> <span class="float-right"> {{$topic->created_at->diffForHumans()}}</span></li>
                        <li class="list-group-item"><i class="icon-clock-o"></i> <strong>Deadline:</strong><span class="float-right"> {{ date('F d, Y', strtotime($topic->last_date)) }}</span></li>
                    </ul>

                    <p><a href="{{route('advisor.show',[$topic->advisor->id, $topic->advisor->slug])}}" class="btn btn-warning btn-block">Visit Advisor Page</a></p>
                    <p>
                        @if(Auth::check() && Auth::user()->user_type=='seeker')
                            @if(!$topic->checkApplication())
                                @if(Auth::user()->profile->cover_letter && Auth::user()->profile->resume)
                                    <apply-component :topicid="{{ $topic->id }}"></apply-component>
                                @else
                                    <a class="btn btn-dark btn-block" href="{{ route('user.profile') }}"><i class="icon-check"></i> Contact</a>
                    <p class="text-center"><small style="color: darkred"><strong>Upload your Cover Letter and Resume in other to apply</strong></small></p>
                    @endif
                    @else
                        <span class="btn btn-block" style="background-color: rgba(131,146,143,0.89); color: white; cursor: default;">Already Applied!</span>
                    @endif
                    <br>
                    <favourite-component :topicid="{{ $topic->id }}" :favourited="{{ $topic->checkSaved() ? 'true' : 'false' }}"></favourite-component>
                    @else
                        <p class="bg-secondary text-center" style="color: white;">Please login to contact this advisor</p>
                        @endif
                        </p>

                </div>

                @foreach($topicRecommendations as $topicRecommendation)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <p class="badge badge-success">{{$topicRecommendation->type}}</p>
                                <h5 class="card-title">{{$topicRecommendation->position}}</h5>
                                <p class="card-text">{{str_limit($topicRecommendation->description,90)}}</p>
                                <div style="text-align: center;"> <a href="{{route('topic.show',[$topicRecommendation->id,$topicRecommendation->slug])}}" class="btn btn-success">Apply</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach


            <!-- Modal -->

                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send topic to your friend</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('mail') }}" method="POST">
                                @csrf

                                <div class="modal-body">
                                    <input type="hidden" name="topic_id" value="{{$topic->id}}">
                                    <input type="hidden" name="topic_slug" value="{{$topic->slug}}">

                                    <div class="form-goup">
                                        <label>Your name * </label>
                                        <input type="text" name="your_name" placeholder="Enter your name" class="form-control" required>
                                    </div>
                                    <div class="form-goup">
                                        <label>Your email *</label>
                                        <input type="email" name="your_email" placeholder="Enter your email" class="form-control" required>
                                    </div>
                                    <div class="form-goup">
                                        <label>Person name *</label>
                                        <input type="text" name="friend_name" placeholder="Enter your friend's name" class="form-control" required>
                                    </div>
                                    <div class="form-goup">
                                        <label>Person email *</label>
                                        <input type="email" name="friend_email" placeholder="Enter your friend's email" class="form-control" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Mail this topic</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <br>
            <br>

        </div>
    </div>
@endsection

