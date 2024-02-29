<link rel="stylesheet" href="{{asset('assets/popup.css')}}">

<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>{{$service->name}}</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>{{$service->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="semiboxshadow text-center">
                <img src="img/img-theme/shp.png" class="img-responsive" alt="">
            </div>
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 single-blog">
                                <div class="post-item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-header">
                                                <div class="post-format-icon post-format-standard"
                                                    style="margin-top: -10px;">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                                <div class="post-info-wrap">
                                                    <h2 class="post-title"><a href="#" title="Post Format: Standard"
                                                            rel="bookmark">{{$service->name}}: {{$service->category->name}}</a></h2>
                                                    <div class="post-meta" style="height: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="single-carousel">
                                                <div class="img-hover">
                                                    <img src="{{asset('images/services')}}/{{$service->image}}" alt="{{$service->name}}"
                                                        class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-content">
                                                <h3>{{$service->name}}</h3>
                                                <p>{{$service->description}}</p>
                                                <h4>Inclusion</h4>
                                                <ul class="list-styles">
                                                    @foreach(explode("|", $service->inclusion) as $inclusion)
                                                        <li><i class="fa fa-plus"></i>{{$inclusion}}</li>
                                                    @endforeach
                                                </ul>
                                                <h4>Exclusion</h4>
                                                <ul class="list-styles">
                                                    @foreach(explode("|", $service->exclusion) as $exclusion)
                                                        <li><i class="fa fa-minus"></i>{{$exclusion}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <aside class="widget" style="margin-top: 18px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Booking Details</div>
                                        <div class="panel-body">
                                        @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                            <table class="table table-dark">
                                                <tr>
                                                    <td style="border-top: none;">Price</td>
                                                    <td style="border-top: none;"><span>&#36;</span>{{$service->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Quantity</td>
                                                    <td>1</td>
                                                </tr>
                                                @php
                                                    $total = $service->price;
                                                @endphp
                                                @if($service->discount)
                                                    @if($service->discount_type == "fixed")
                                                <tr>
                                                    <td>Discount</td>
                                                    <td>${{$service->discount}}</td>
                                                </tr>
                                                    @php $total = $total-$service->discount; @endphp
                                                @elseif($service->discount_type == "percent")
                                                <tr>
                                                    <td>Discount</td>
                                                    <td>{{$service->discount}}%</td>
                                                    @php $total = $total-($total*$service->discount/100); @endphp
                                                </tr>
                                                    @endif
                                                @endif
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>&#36;</span> {{$total}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="panel-footer">
                                        @auth
                                            <button class="btn btn-primary" onclick="togglePopup()">Book Now</button>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Book</a>
                                        @endauth
                                            <div class="overlay" id="overlay"></div>
                                            @auth
                                            <div class="popup-container" id="popupContainer">
                                            <form action="/service/{{ $service->slug }}" method="post" id="loginForm" class="login-form form-horizontal">
                                                @csrf
                                            <button type="button" onclick="closePopup()" class="exit-button">&#10006;</button>
                                                <h2>Booking Form</h2>
                                                <input type="hidden" name="image" value="{{$service->image}}">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="booking_status" value="processing">
                                                <input type="hidden" name="service_id" value="{{$service->id}}">
                                                <div class="form-group">
                                                <label for="service_title">Service Title:</label>
                                                <input type="text" class="form-control" id="service_title" name="service_title" value="{{$service->name}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">price:</label>
                                                <input type="number" class="form-control" id="price" name="price" value="{{$service->price}}" readonly>
                                            </div>
                                            
                                                <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control"  id="name" name="name" value="{{Auth::user()->name}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone Number:</label>
                                                <input type="phone" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_location">Your Location:</label> 
                                                <input type="text" class="form-control" id="user_location" name="user_location" value="{{Auth::user()->user_location}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Set Date:</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Set Time:</label>
                                                <input type="time" class="form-control" id="time" name="time" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="service_locations">Select Branch Location:</label> 
                                                <select class="form-control" id="service_locations" name="service_locations" required>
                                                    @foreach($sproviders as $sprovider)
                                                    <option value="{{$sprovider->service_locations}}">{{$sprovider->service_locations}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <button type="submit">Done Booking</button>
                                                @endauth
                                            </form>
                                            <script>
                                                function togglePopup() {
                                                const popup = document.getElementById('popupContainer');
                                                const overlay = document.getElementById('overlay');
                                                popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
                                                overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
                                                }

                                                function closePopup() {
                                                const popup = document.getElementById('popupContainer');
                                                const overlay = document.getElementById('overlay');
                                                popup.style.display = 'none';
                                                overlay.style.display = 'none';
                                                }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <aside>
                                    @if($r_service)
                                    <h3>Related Service</h3>
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        <a href="{{route('home.services_details', ['service_slug' => $r_service->slug])}}">
                                            <div class="img-hover">
                                                <img src="{{asset('images/services/thumbnails/thumbnail')}}/ {{$r_service->thumbnail}}" alt="{{$r_service->name}}"
                                                    class="img-responsive">
                                            </div>
                                            <div class="info-gallery">
                                                <h3>
                                                    {{$r_service->name}}
                                                </h3>
                                                <hr class="separator">
                                                <p>{{$r_service->name}}</p>
                                                <div class="content-btn"><a href="{{route('home.services_details', ['service_slug' => $r_service->slug])}}"
                                                        class="btn btn-warning">View Details</a></div>
                                                <div class="price"><span>&#36;</span><b>From</b>{{$r_service->price}}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </section></div>
