@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Order Detail')

<div class="modal-body">
    <section class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>User Info</h4>
                <hr>
                <p>
                    <strong>Name:</strong>{{$order->name}} <br>
                    <strong>Phone:</strong>{{$order->phone}} <br>
                    <strong>Email:</strong>{{$order->email}} <br>
                    <strong>Location:</strong>{{$order->location}} <br>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Payment History</h4>
                <hr>
                <strong>Payment Type:</strong>{{$order->payment_name}}
                <br>
                <strong>Payment
                    Number:</strong>{{$order->payment_number}} <br>
                <strong>Payment
                    Secrect</strong>{{$order->payment_secret}} <br>
            </div>
            <div class="col-md-4">

                <h4>Details</h4>
                <hr>
                <strong>Comment:</strong>{{$order->description}} <br>
            </div>
        </div>
        <!--product details start here -->
        <section>
            <div class="row modal-body">
                @php
                    $total = 0;
                @endphp
                @foreach(App\Models\Cart::where('order_id',$order->id)->get() as $cart)
                <div class="col-md-4 col-sm-12 col-lg-4">
                    <div class="text-center">
                        <div class="card">
                            <div class="card-header">
                                {{ $cart->product->name }}
                            </div>
                            <div class="card-header">
                                {{ $cart->product->price * $cart->quantity}}
                               <?php
                                     $total += $cart->product->price * $cart->quantity;
                                     ?>


                            </div>
                            <div class="card-header">
                                Cart Quantity:{{ $cart->quantity }}
                            </div>
                            <div class="card-body">
                                <span> {{ $cart->product->menu1 }}
                                </span><br>
                                <span> {{ $cart->product->menu2 }}
                                </span><br>
                                <span> {{ $cart->product->menu3 }}
                                </span><br>
                                <span> {{ $cart->product->menu4 }}
                                </span><br>
                                <span> {{ $cart->product->menu5 }}
                                </span><br>
                                <span> {{ $cart->product->menu6 }}
                                </span><br>
                                <span> {{ $cart->product->menu7 }}
                                </span><br>
                                <span> {{ $cart->product->menu8 }}
                                </span><br>
                                <span> {{ $cart->product->menu9 }}
                                </span><br>
                                <span> {{ $cart->product->menu10 }}
                                </span><br>
                                <span> {{ $cart->product->menu11 }}
                                </span><br>
                                <span> {{ $cart->product->menu12 }}
                                </span><br>
                                <span> {{ $cart->product->menu13 }}
                                </span><br>
                                <span> {{ $cart->product->menu14 }}
                                </span><br>
                                <span> {{ $cart->product->menu15 }}
                                </span><br>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer clearfix">
                <span class="btn btn-sm btn-danger float-right">
                    @if ($order->status==0)
                    <span>Order Status - Pending</span>
                    @else
                    <span>Order Status - Successfully</span>
                    @endif
                </span>
                <span class="btn btn-sm btn-primary float-left">Net Amount: {{$total}}</span>
              </div>
        </section>
        <!--product detials show end here -->
    </section>
</div>


@section('css')
@endsection


@endsection

@section('js')
@endsection


