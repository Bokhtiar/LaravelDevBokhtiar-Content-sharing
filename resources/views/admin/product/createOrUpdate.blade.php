@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Product Create')

@section('css')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/select2.min.css">
@endsection

<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h2 class="card-title">{{@$product ? 'Update Product Form' : 'Create New Product Form'}} </h2>
                <div class="card-tools">
                    <div class="form-inline input-group input-group-sm" style="width: 100px;">
                        <a class="btn btn-primary" href="{{ url('admin/product') }}">All Product</a>
                    </div>
                </div>
            </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--Form error message show -->

            <!-- /.card-header -->
            <section class="container">
                @if (!empty($product))
                <form action="{{ url('admin/product/'.$product->id) }}" method="POST">
                    @method('PUT')
                @else
                <form action="{{ url('admin/product') }}" method="POST">
                @endif
                    @csrf
                    <h4>Product Information</h4><span class="font-italic text-danger">[* fild is required]</span>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Product Title <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" maxlength="35" minlength="5" name="name" placeholder="Product Title" value="{{ @$product->name }}" id="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Product Price <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control" name="price" placeholder="Product Price" value="{{ @$product->price }}" id="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Product Title <span class="text-danger">*</span> </label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option selected="selected">--Select Category--</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == @$product->category_id ? 'selected' : '' }}>{{ $item->name }} </option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                    </div><!--name,price,category_id form end -->

                    <h4>Product Menus Add</h4>
                    <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu1" value="{{ @$product->menu1 }}" name="menu1" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu2" value="{{ @$product->menu2 }}" name="menu2" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu3" value="{{ @$product->menu3 }}" name="menu3" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu4" value="{{ @$product->menu4 }}" name="menu4" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu5" value="{{ @$product->menu5 }}" name="menu5" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu6" value="{{ @$product->menu6 }}" name="menu6" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu7" value="{{ @$product->menu7 }}" name="menu7" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu8" value="{{ @$product->menu8 }}" name="menu8" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu9" value="{{ @$product->menu9 }}" name="menu9" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu10" value="{{ @$product->menu10 }}" name="menu10" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu11" value="{{ @$product->menu11 }}" name="menu11" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu12" value="{{ @$product->menu12 }}" name="menu12" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu13" value="{{ @$product->menu13 }}" name="menu13" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu14" value="{{ @$product->menu14 }}" name="menu14" class="form-control" id="">
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <input type="text" placeholder="Product menu15" value="{{ @$product->menu15 }}" name="menu15" class="form-control" id="">
                            </div>
                    </div><!--product menus end -->

                    <div class="form-group float-right my-2">
                        @if(!empty(@$product))
                        <input type="submit" class="btn btn-primary" name="" value="Update Product" id="">
                        @else
                        <input type="submit" class="btn btn-primary" name="" value="Create New Product" id="">
                        @endif
                    </div>
                </form>
            </section>
            <!-- /.card -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div><!-- /.row -->
</section>
@endsection
@section('js')
<!-- Select2 -->
<script src="{{ asset('admin') }}/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

@endsection


