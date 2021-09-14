@extends('layouts.user.app')
@section('user_content')
@section('page_title', 'Dashboard')
@section('css')
<script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script>
@endsection
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Profile</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
    <section>
        <style>
            p {
                margin: 0
            }


            img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-12 bg-white p-0 px-3 py-3 mb-3">
                            <div class="d-flex flex-column align-items-center"> <img class="photo"
                                    src="https://images.unsplash.com/photo-1541647376583-8934aaf3448a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                                    alt="">
                                <p class="fw-bold h4 mt-3">{{ Auth::user()->name}}</p>
                                <p class="text-muted">Welcome to Our Website</p>
                                <div class="d-flex ">
                                    <div class="btn btn-outline-primary message"><a
                                            href="http://localhost:8000/#contact" class="text-dark">Admin Message</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 bg-white p-0 px-2 pb-3 mb-3">
                            <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                <p><span class="fas fa-globe me-2"></span>Order item</p> <a
                                    class="text-light btn btn-sm btn-primary" href="#order">GO...</a>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                <p><span class="fas fa-globe me-2"></span>Cart item</p> <a
                                    class="text-light btn btn-sm btn-primary" href="#cart">GO...</a>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                <p><span class="fab fa-github-alt me-2"></span>Message</p> <a
                                    class="text-light btn btn-sm btn-primary" href="#message">GO...</a>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                <p><span class="fab fa-twitter me-2"></span>logout</p> <a class="text-light btn btn-sm btn-danger" href="{{ url('logout') }}">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 ps-md-4">
                    <section id="order">
                        <div class="card-header">
                            <h2 class="card-title">Order Items </h2>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover  text-center" id="table">
                                <tr>
                                    <th>Index</th>
                                    <th>Order Woner</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $order->f_name .' '. $order->l_name }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#exampleModal{{ $order->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('admin/category/'.$order->id.'/edit') }}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!--modal start here -->
                                <div class="modal fade " id="exampleModal{{ $order->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
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
                                                                @foreach(App\Models\Cart::where('order_id',$order->id)->get() as $cart)
                                                                <div class="col-md-4 col-sm-12 col-lg-4">
                                                                    <div class="text-center">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                {{ $cart->product_id ?  $cart->product->name : '' }}
                                                                            </div>
                                                                            <div class="card-header">
                                                                                {{ $cart->product_id ?  $cart->product->price : '' }}
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <span> {{ $cart->product_id ? $cart->product->menu1 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu2 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu3 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu4 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu5 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu6 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu7 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu8 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu9 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu10 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu11 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu12 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu13 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu14 :'' }}
                                                                                </span><br>
                                                                                <span> {{ $cart->product_id ? $cart->product->menu15 :'' }}
                                                                                </span><br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <section>
                                                                @if ($order->status==0)
                                                                <span>Order Status - Pending</span>
                                                                @else
                                                                <span>Order Status - Successfully</span>
                                                                @endif
                                                            </section>
                                                        </section>
                                                        <!--product detials show end here -->
                                                    </section>
                                                </div>
                                                <!--end of modal body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--modal end here-->
                                    @endforeach
                            </table>
                        </div>
                    </section>
                    <!--end of cart -->



                    <section id="cart">
                        <div class="card-header">
                            <h2 class="card-title">Cart Items </h2>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover  text-center" id="table">
                                <tr>
                                    <th>Index</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($carts as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <form action="" class="form-inline">
                                            <input type="text" name="" class="form-control form-control-sm"
                                                value="{{ $item->quantity }}" id="">
                                            <input class="btn btn-sm btn-success" type="Submit" value="Submit" name=""
                                                id="">
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#exampleModal{{ $item->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('admin/category/'.$item->id.'/edit') }}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!--modal start here -->
                                <div class="modal fade " id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="text-center">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    {{ $item->product->name }}
                                                                </div>
                                                                <div class="card-header">
                                                                    {{ $item->product->price }}
                                                                </div>
                                                                <div class="card-body">
                                                                    <span> {{ $item->product->menu1 }} </span><br>
                                                                    <span> {{ $item->product->menu2 }} </span><br>
                                                                    <span> {{ $item->product->menu3 }} </span><br>
                                                                    <span> {{ $item->product->menu4 }} </span><br>
                                                                    <span> {{ $item->product->menu5 }} </span><br>
                                                                    <span> {{ $item->product->menu6 }} </span><br>
                                                                    <span> {{ $item->product->menu7 }} </span><br>
                                                                    <span> {{ $item->product->menu8 }} </span><br>
                                                                    <span> {{ $item->product->menu9 }} </span><br>
                                                                    <span> {{ $item->product->menu10 }} </span><br>
                                                                    <span> {{ $item->product->menu11 }} </span><br>
                                                                    <span> {{ $item->product->menu12 }} </span><br>
                                                                    <span> {{ $item->product->menu13 }} </span><br>
                                                                    <span> {{ $item->product->menu14 }} </span><br>
                                                                    <span> {{ $item->product->menu15 }} </span><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!--modal end here-->
                                @endforeach
                            </table>
                            @if (!empty(App\Models\Cart::total_item_cart()))
                            <div class="float-right">
                                <a href="{{ url('user/checkout') }}" class="btn btn-primary btn-sm">Checkout</a>
                            </div>
                            @endif
                        </div>
                    </section>
                    <!--end of cart -->

                    <section id="message">
                        <div class="card-header">
                            <h2 class="card-title">Message List </h2>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover  text-center" id="table">
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        @if($contact->status==0)
                                        <span class="badge badge-danger">NO Seen</span>
                                        @else
                                        <span class="badge badge-success"> Seen </span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#exampleModal-contact{{ $contact->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('admin/category/'.$contact->id.'/edit') }}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!--modal start here -->
                                <div class="modal fade " id="exampleModal-contact{{ $contact->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $contact->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="text-center">
                                                            <div class="">
                                                                <div class="card-header">
                                                                    {{ $contact->Subject }}
                                                                </div>
                                                                <div class="card-body">
                                                                    {{$contact->message}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--modal end here message-->


                                @endforeach
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
