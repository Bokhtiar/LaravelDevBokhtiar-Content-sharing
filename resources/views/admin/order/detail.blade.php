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
                    <strong>Name:</strong>{{$order->f_name .' '. $order->l_name}} <br>
                    <strong>Phone:</strong>{{$order->phone}} <br>
                    <strong>Email:</strong>{{$order->email}} <br>
                    <strong>Country:</strong>{{$order->country}} <br>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Payment History</h4>
                <hr>
                <strong>Payment Type:</strong>{{$order->payment_id}}
                <br>
                <strong>Payment
                    Number:</strong>
                    @if(isset($order->USDT_Wallet))
                    {{ $order->USDT_Wallet }}
                    @elseif (isset($order->Payoneer))
                    {{ $order->Payoneer }}
                    @elseif(isset($order->Perfect_Money_Usd))
                    {{ $order->Perfect_Money_Usd }}
                    @elseif(isset($order->Webmoney))
                    {{ $order->Webmoney }}
                    @elseif(isset($order->BTC_WALLET))
                    {{ $order->BTC_WALLET }}
                    @endif
                    <br>

            </div>
            <div class="col-md-4">
                <h4>Product Quantity</h4>
                <hr>
                <p>
                    <strong>Quantity: </strong>Pc{{$order->qty}} <br>

                </p>
            </div>
        <p class="mt-3">Your Product Detais:  <a class="btn btn-primary" href="{{ url('product/show',$order->product->id) }}">{{ $order->product->name }}</a> </p>

        </div>



        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between">
                    @php
                        $price = $order->product->price;
                        $total = $order->qty * $order->product->price;
                    @endphp
                    <p>Amount is : ${{ $total }}</p>
                    <p>
                        @if ($order->status==0)
                            <p class="text-danger mt-3">Order Status : pending</p>
                        @else
                            <p class="text-primary mt-3">Order Status : Success</p>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>


@section('css')
@endsection


@endsection

@section('js')
@endsection


