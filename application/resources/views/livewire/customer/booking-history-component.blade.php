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
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #fff; /* Set background color to white */
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: #fff;        
        }

        td {
            background-color: #2c2c2c;
            color: white;
            text-align: center;
        }

        td p {
            font-size: medium;
        }

        tbody td {
            text-align: center;
        }

        .btn-confirm {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .table-title {
            color: #fff;
            text-align:start;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }
    </style>

    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini" style="background-color: #120803;">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6 table-title">
                                            <a href="{{route('customer.booking_history')}}" class="btn btn-danger" style="color: orange;" >Booking History</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="background-color: #120803;">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking #</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col">Estimated Price &#8369;</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">User Location</th>
                                                <th scope="col">Booking Date & Time</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td><img src="{{ asset('images/services') }}/{{ $booking->image }}" alt="{{ $booking->image }}" class="img-thumbnail" style="width: 70px; height: 70px"></td>
                                                    <td>{{ $booking->service_title }}</td>
                                                    <td><span>&#8369;</span>{{ $booking->price }}</td>
                                                    <td>{{ $booking->name }}</td>
                                                    <td>{{ $booking->email }}</td>
                                                    <td>{{ $booking->phone }}</td>
                                                    <td>{{ $booking->user_location }}</td>
                                                    <td>{{ $booking->date }} {{ $booking->time }}</td>
                                                    <td>{{ $booking->booking_status }}</td>
                                                    <td>
                                                        @if($booking->booking_status == 'Approved, Your repairman is on the way.')
                                                            <a class="btn-confirm" href="{{ route('customer.bookingconfirm', $booking->id) }}">&#10003; Confirm</a>
                                                        @elseif($booking->booking_status == 'Waiting for Approval')
                                                            <a class="btn-cancel" href="#" onclick="confirm('Are you sure you want to cancel this booking?') || event.stopImmediatePropagation()" wire:click.prevent="destroy({{ $booking->id }})">
                                                                <i class="fa fa-times">Cancel Booking</i>
                                                            </a>
                                                        @elseif($booking->booking_status == 'Cancelled Booking')
                                                            <p class="text-light">Booking Successfully Canceled</p>
                                                        @else
                                                            <p class="text-light">Booking Success</p>
                                                        @endif
                                                    </td>
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
