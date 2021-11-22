@extends('layouts.user.app')
@section('page_title', 'Products')
@section('user_content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Product List</li>
      </ol>

    </div>
  </section><!-- End Breadcrumbs -->
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    <li>Please Login</li>
                @endforeach
            </ul>
        </div>
        @endif
<!-- ======= google product Section ======= -->
<section id="google_product" class="portfoio pricing">
    <div class="container">
      <div class="section-title">
        <h2>Our Google Product</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row portfolio-container">
        @foreach ($products as $item)
        <div class="col-lg-4 col-md-6 portfolio-item">
          <div class="box featured">
            <h3>{{ $item->name }}</h3>
            {{-- <h4> <sup>Price $</sup>{{ $item->price }}<span></span></h4> --}}
            <p class="text-primary"> <b>Per Pc Price ${{ $item->price }}</b> </p>
            <ul>
              <li>{{ $item->menu1 }}</li>
              <li>{{ $item->menu2 }}</li>
              <li>{{ $item->menu3 }}</li>
              <li>{{ $item->menu4 }}</li>
              <li>{{ $item->menu5 }}</li>
              <li>{{ $item->menu6 }}</li>
              <li>{{ $item->menu7 }}</li>
              <li>{{ $item->menu8 }}</li>
              <li>{{ $item->menu9 }}</li>
              <li>{{ $item->menu10 }}</li>
              <li>{{ $item->menu11 }}</li>
              <li>{{ $item->menu12 }}</li>
              <li>{{ $item->menu13 }}</li>
              <li>{{ $item->menu14 }}</li>
              <li>{{ $item->menu15 }}</li>
            </ul>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}">
                Buy Now
            </button>


          </div>
          </div>
           <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Checkout Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <section id="cart">
                        <div class="cart-body">
                            <form action="{{ url('order/store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <label for="">First Name: <span class="text-danger">*</span></label>
                                        <input required type="text" placeholder="First Name" name="f_name" class="form-control" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <label for="">Last Name:<span class="text-danger">*</span></label>
                                        <input required type="text" placeholder="Last Name" name="l_name" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail <span class="text-danger">*</span></label>
                                    <input required type="email" placeholder="E-mail" name="email" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Country <span class="text-danger">*</span></label>
                                    <input required type="text" placeholder="Country" name="country" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone(optional)</label>
                                    <input type="text" placeholder="phone" name="phone" class="form-control" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input required type="number"  id="qty" oninput="purchase_qty(this.value)" placeholder="Quantity" name="qty" class="form-control" >
                                    <input type="hidden" id="price" value="{{ $item->price }}">
                                    <input type="hidden" name="product_id" value="{{ $item->id }}" id="">
                                </div>
                                <div class="form-group" id="total_price"  >
                                   <p >Price:</p>
                                </div>


                                <div class="form-group">
                                    <label for="">Select Payment Getway</label>
                                    <select required class="form-control" name="payment_id" id="payment_getway">
                                        <option value="">Select Payment Getway</option>
                                        <option value="USDT Wallet">USDT Wallet</option>
                                        <option value="Payoneer">Payoneer</option>
                                        <option value="Perfect Money Usd">Perfect  Money Usd</option>
                                        <option value="webmoney">webmoney</option>
                                        <option value="BTC WALLET">BTC WALLET</option>
                                    </select>
                                    <div id="USDT_Wallet" style="display: none">
                                        <br>
                                        <span class="my-3">
                                            Please send your cart balance in my account, after that i will send your order in your email account.
                                        </span>
                                        <br>
                                       <br> <span>My USDT Wallet : <br> <span class="bg-primary text-light rounded"> TRC20	  &nbsp; &nbsp; &nbsp;TCh1xHFnn7y5WRCTCsDtsh7YxvDBb4zPga</span></span>
                                       <div>
                                           <input type="text" class="form-control" name="USDT_Wallet" placeholder="enter your usdt wallet " id="">
                                       </div>
                                    </div>

                                    <div id="Payoneer" style="display: none">
                                        <br>
                                        <span class="my-3">
                                            Please send your cart balance in my account, after that i will send your order in your email account.
                                        </span>
                                        <br>
                                        <br><span>My Payoneer Account: <br>
                                        <span class="bg-primary text-light rounded">hamimjulkernine@gmail.com</span>
                                        </span>
                                        <div>
                                            <input type="text" class="form-control" name="Payoneer" placeholder="enter your Payoneer Account" id="">
                                        </div>
                                    </div>

                                    <div id="Perfect_Money_Usd" style="display: none">
                                        <br>
                                        <span class="my-3">
                                            Please send your cart balance in my account, after that i will send your order in your email account.
                                        </span>
                                        <br>
                                        <br><span>My Perfect Money Usd Account : <br>
                                        <span class="bg-primary text-light rounded">U17383592</span>
                                        </span>
                                        <div>
                                            <input type="text" class="form-control" name="Perfect_Money_Usd" placeholder="enter your perfect money usd account" id="">
                                        </div>
                                    </div>

                                    <div id="webmoney" style="display: none">
                                        <br>
                                        <span class="my-3">
                                            Please send your cart balance in my account, after that i will send your order in your email account.
                                        </span>
                                        <br>
                                        <br><span>My Webmoney Acount : <br>
                                        <span class="bg-primary text-light rounded">Z505685438040</span>
                                        </span>
                                        <div>
                                            <input type="text" class="form-control" name="Webmoney" placeholder="enter your webmoney account" id="">
                                        </div>
                                    </div>

                                    <div id="BTC_WALLET" style="display: none">
                                        <br>
                                        <span class="my-3">
                                            Please send your cart balance in my account, after that i will send your order in your email account.
                                        </span>
                                        <br>
                                        <br><span>My BTC WALLET : <br>
                                        <span class="bg-primary text-light rounded">3Ah9GDJxryuAGJtTuaRzLpjuKx9rX7y53y</span>
                                        </span>
                                        <div>
                                            <input type="text" class="form-control" name="BTC_WALLET" placeholder="enter your btc wallet" id="">
                                        </div>
                                    </div>

                                </div>


                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End google product Section -->


  @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>

$('#payment_getway').on('change',function(e){
        var pay = e.target.value
        console.log(pay);
        switch (pay) {
        case "USDT Wallet":
            $("#USDT_Wallet").toggle(3000);
            $("#Payoneer").hide();
            $("#Perfect_Money_Usd").hide();
            $("#webmoney").hide();
            $("#BTC_WALLET").hide();
            break;
        case "Payoneer":
            $("#Payoneer").toggle(3000);
            $("#USDT_Wallet").hide();
            $("#Perfect_Money_Usd").hide();
            $("#webmoney").hide();
            $("#BTC_WALLET").hide();
            break;
        case "Perfect Money Usd":
            $("#Perfect_Money_Usd").toggle(3000);
            $("#Payoneer").hide();
            $("#USDT_Wallet").hide();
            $("#webmoney").hide();
            $("#BTC_WALLET").hide();
            break;
        case "webmoney":
            $("#webmoney").toggle(3000);
            $("#Payoneer").hide();
            $("#Perfect_Money_Usd").hide();
            $("#USDT_Wallet").hide();
            $("#BTC_WALLET").hide();
            break;
        case "BTC WALLET":
            $("#BTC_WALLET").toggle(3000);
            $("#USDT_Wallet").hide();
            $("#Payoneer").hide();
            $("#Perfect_Money_Usd").hide();
            $("#webmoney").hide();
            break;
        default:
            alert('test');
            break;
        }
    });

    function purchase_qty(q){
        var price = $("#price").val()
        var total = q*price
        $('#total_price').text(total)
    }
  </script>


  @endsection
  @endsection
