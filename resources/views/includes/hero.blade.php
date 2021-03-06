<div style="height: 113px;"></div>

<div class="site-blocks-cover overlay" style="background-image: url('{{ asset('external/images/bghero2.jpg') }}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1>Seek Help</h1>
                <form action="{{ route('all.jobs') }}">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input type="text" name="search" class="mr-3 form-control border-0 px-4" placeholder="topic title, keywords or advisor name " required>
                                </div>
                       {{--     <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-wrap">
                                        <span class="icon icon-room"></span>
                                        <input type="text" name="address" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="batch, department" onFocus="geolocate()">
                                    </div> 
                                </div>--}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <p class="small">or browse by category: <a href="#" class="category">Android Development</a> <a href="#" class="category">Mobile Development</a></p>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
