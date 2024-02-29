<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: #fff;        
        }
        td{
            background-color: black;
            color: white;
        }
        td p {
            font-size: medium;
        }
        tbody td {
        text-align: center;
    }
    </style>

    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Booking History</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Booking History</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Booking History
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking #</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col">Estimated Price</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">User Location</th>
                                                <th scope="col">Booking Date</th>
                                                <th scope="col">Booking Time</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td>{{$booking->id}}</td>
                                                    <td><img src="{{asset('images/services')}}/{{$booking->image}}" alt="{{$booking->image}}" class="img-thumbnail" style="width: 70px; height:70px"></td>
                                                    <td>{{$booking->service_title}}</td>
                                                    <td><span>&#8369;</span>{{$booking->price}}</td>
                                                    <td>{{$booking->name}}</td>
                                                    <td>{{$booking->email}}</td>
                                                    <td>{{$booking->phone}}</td>
                                                    <td>{{$booking->user_location}}</td>
                                                    <td>{{$booking->date}}</td>
                                                    <td>{{$booking->time}}</td>
                                                    <td>{{$booking->booking_status}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $bookings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
