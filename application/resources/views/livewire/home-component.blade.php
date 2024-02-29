<div>
<style>
    /* Frame for images in #sponsors */
    #sponsors li {
        display: inline-block;
        margin: 10px;
        border: 2px solid white; 
        padding: 5px;
    }

    #sponsors img {
        width: 100px;
        height: 100px;
    }

    /* Frame for images in .portfolioContainer */
    .portfolioContainer .img-responsive {
        border: 2px solid black; 
    }

    .portfolioContainer .img-hover {
        position: relative;
    }

    /* Frame for images in #boxes-carousel */
    #boxes-carousel img {
        border: 2px solid black; 
        width: 100%; /
        height: auto; 
    }

    .services-lines-info h5 {
        color: #fff;
    }
    .h5{
        color:#fff;
    }
</style>



    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach($slides as $slide)
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                    data-saveperformance="off" data-title="Slide">
                    <img src="{{ asset('images/slider') }}/{{$slide->image}}" alt="{{$slide->title}}" data-bgposition="center center"
                        data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                        data-bgfitend="100" data-bgpositionend="right center">
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at a very affordable price.</p>
            </div>
            <div class="filter-header">
                <form id="sform" action="{{route('searchService')}}" method="post">
                    @csrf
                    <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                        class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>

    <section class="content-central" style="background-color: white;">
        <div class="content_info content_resalt" style="background-color: rgba(0, 0, 0, 1)">
            <div class="container" style="margin-top: 40px;">
                <div class="row"></div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="sponsors" class="tooltip-hover">
                        @foreach($scategories as $scategory)
                        <li data-toggle="tooltip" title="{{ $scategory->name }}" data-original-title="{{ $scategory->name }}">
                            <a href="{{ route('home.services_by_category', ['category_slug' => $scategory->slug]) }}">
                                <img src="{{ asset('images/categories') }}/{{ $scategory->image }}" alt="{{ $scategory->name }}" style="width: 100px; height: 100px;">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        </div>
        <div class="semiboxshadow text-center">
            <img src="{{ asset('assets/img/img-theme/shp.png') }}" class="img-responsive" alt="">
        </div>
        <div class="content_info">
            <div class="container">
                <div class="row">
                    <div class="titles" style="background-color: black;">
                        <h2>At <span>Your</span> Service</h2>
                        <hr class="tall">
                    </div>
                </div>
                <div class="portfolioContainer">
                    @foreach($fservices as $service)
                    <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right: 5px; padding-left: 5px;">
                        <a class="g-list" href="{{ route('home.services_details', ['service_slug' => $service->slug]) }}">
                            <div class="img-hover">
                                <img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}"
                                    alt="{{ $service->name }}" class="img-responsive">
                            </div>
                            <div class="info-gallery">
                                <h3>{{ $service->name }}</h3>
                                <hr class="separator">
                                <p>{{ $service->tagline }}</p>
                                <div class="content-btn">
                                    <a href="{{ route('home.services_details', ['service_slug' => $service->slug]) }}"
                                        class="btn btn-primary">Book Now</a>
                                </div>
                                <div class="price"><span>&#36;</span><b>From</b>${{ $service->price }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="titles" style="background-color: black;">
                    <h2><span>Booking</span>Services</h2>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>WELCOME TO DIVERSIFIED</h2>
                                <p class="lead">
                                    Book best services at one place.
                                    <span class="line"></span>
                                </p>
                                <p>Find a wide variety of home services.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="services-lines">
                                @foreach($fscategories as $fscategory)
                                <li style="background-color: black;">
                                    <a href="{{ route('home.services_by_category', ['category_slug' => $fscategory->slug]) }}">
                                        <div class="item-service-line">
                                            <i class="fa">
                                                <img class="icon-img"
                                                    src="{{ asset('images/categories') }}/{{ $fscategory->image }}" style="width: 150px; height: 150px;">
                                            </i>
                                            <h5 style="background-color:#fff;">{{ $fscategory->name }}</h5>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div id="boxes-carousel">
                @foreach($aservices as $aservice)
                <div>
                    <a class="g-list" href="{{ route('home.services_details', ['service_slug' => $aservice->slug]) }}">
                        <div class="img-hover">
                            <img src="{{ asset('images/services/thumbnails') }}/{{ $aservice->thumbnail }}"
                                alt="{{ $aservice->name }}" class="img-responsive">
                        </div>
                        <div class="info-gallery">
                            <h3>{{ $aservice->name }}</h3>
                            <hr class="separator">
                            <p>{{ $aservice->tagline }}</p>
                            <div class="content-btn">
                                <a href="{{ route('home.services_details', ['service_slug' => $aservice->slug]) }}"
                                    class="btn btn-primary">Book Now</a>
                            </div>
                            <div class="price"><span>&#36;</span><b>From</b>${{ $aservice->price }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script type="text/javascript">
    var path = "{{route('autocomplete')}}";
    $('input.typeahead').typeahead({
        source:function(query,process){
            return $.get(path,{query:query},function(data){
                return process(data);
            });
        }
    });
</script>

@endpush