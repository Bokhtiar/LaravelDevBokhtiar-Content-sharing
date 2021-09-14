@extends('layouts.user.app')
@section('user_content')

@section('page_title', 'Checkout')
@section('css')
  <script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script>
@endsection

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Checkout</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
        <div class="container">
            <h3 class="text-light bg-primary">Order Confirm</h3>
        </div>
    <section class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-lg-7">
                <section id="cart">
                    <div class="card-header">
                        <h4 class="card-title">Order Create </h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover  text-center" id="table">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carts as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->price * $item->quantity }}</td>
                                @php
                                    $total +=$item->product->price * $item->quantity;
                                @endphp
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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <div class="float-right">
                            <span class="text-primary">Net Amount: {{$total}} </span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-5 col-sm-12 col-lg-5">
                <section id="cart">
                    <div class="card-header">
                        <h4 class="card-title">Checkout Form </h4>
                    </div>
                    <div class="cart-body">
                        <form action="{{ url('user/order/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">First Name:</label>
                                    <input type="text" placeholder="First Name" name="f_name" class="form-control" id="">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">Last Name:</label>
                                    <input type="text" placeholder="Last Name" name="l_name" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" placeholder="E-mail" name="email" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" cols="10" rows="4" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Select Payment Getway</label>
                                <select class="form-control" name="payment_id" id="payment_getway">
                                    <option value="">Select Payment Getway</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagud">Nagud</option>
                                    <option value="rocket">Rocket</option>
                                </select>
                                <div id="bkash" style="display: none">
                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </span>
                                   <br> <span>Bkash Number is : 01638107361</span>
                                   <div>
                                       <input type="text" class="form-control" name="payment_number" placeholder="enter your bkash number" id="">
                                   </div>
                                </div>
                                <div id="rocket" style="display: none">
                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </span>
                                    <br><span>Rocket Number is : 01638107361</span>
                                    <div>
                                        <input type="text" class="form-control" name="payment_number" placeholder="enter your rocket number" id="">
                                    </div>
                                </div>
                                <div id="nagud" style="display: none">
                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </span>
                                    <br><span>Nagud Number is : 01638107361</span>
                                    <div>
                                        <input type="text" class="form-control" name="payment_number" placeholder="enter your rocket number" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="my-2 float-right">
                                <input type="submit" value="Order Confirm" name="" class="btn btn-primary" id="">
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </section>

    </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // $('#payment_getway').on('change',function(e){
    //     if(e.target.value=bkash){
    //         $('#bkash').toggle();
    //     }else if(e.target.value=nagud){
    //         $('#nagud').toggle();
    //     }else if(e.target.value=rocket){
    //         $('#rocket').toggle();
    //     }else{
    //         console.log('else')
    //     }
    // });
    $('#payment_getway').on('change',function(e){
        var pay = e.target.value
        switch (pay) {
        case "bkash":
            $("#bkash").show(3000);
            $("#nagud").hide();
            $("#rocket").hide();
            break;
        case "nagud":
            $("#nagud").show(3000);
            $("#bkash").hide();
            $("#rocket").hide();
            break;
        case "rocket":
            $("#rocket").show(3000);
            $("#nagud").hide();
            $("#bkash").hide();
            break;
        default:
            alert('test');
            break;
        }
    });
</script>
@endsection
