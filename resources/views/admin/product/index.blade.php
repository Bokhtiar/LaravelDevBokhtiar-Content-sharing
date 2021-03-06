@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'List Of Product')

@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">

            <h2 class="card-title"> {{ isset($search) ? "Product Search List" : "List Of Product" }}  </h2>
                <div class="card-tools">
                    <div class="form-inline input-group input-group-sm" style="width: 180px;">
                        <a class="btn btn-primary" href="{{ url('admin/product/create') }}">Create New Product</a>
                        <div class="input-group-append">

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover " id="table">
                <tr>
                <th>Index</th>
                <th>Title</th>
                <th>Price</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                @foreach ($products as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category ? $item->category->name :'' }}</td>
                    <td>
                        @if($item->status==0)
                        <span> <a class="badge badge-danger" href="{{ url('admin/product/status/'.$item->id) }}">In-active</a> </span>
                        @else
                        <span> <a class="badge badge-success" href="{{ url('admin/product/status/'.$item->id) }}">Active</a> </span>
                        @endif
                    </td>
                    <td class="form-inline text-center" style="text-center">

                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a class="btn btn-sm btn-success" href="{{ url('admin/product/'.$item->id.'/edit') }}"><i class="fas fa-user-edit"></i></a>

                        <form action="{{ url('admin/product', $item->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <!--modal start here -->
                <div class="modal fade " id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                              {{ $item->name }}
                                            </div>
                                            <div class="card-header">
                                             <span> <span>Per pc Price ${{ $item->price }}</span>
                                            </div>
                                            <div class="card-body">
                                              <span> {{ $item->menu1 }} </span><br>
                                              <span> {{ $item->menu2 }} </span><br>
                                              <span> {{ $item->menu3 }} </span><br>
                                              <span> {{ $item->menu4 }} </span><br>
                                              <span> {{ $item->menu5 }} </span><br>
                                              <span> {{ $item->menu6 }} </span><br>
                                              <span> {{ $item->menu7 }} </span><br>
                                              <span> {{ $item->menu8 }} </span><br>
                                              <span> {{ $item->menu9 }} </span><br>
                                              {{-- <span> {{ $item->menu10 }} </span><br>
                                              <span> {{ $item->menu11 }} </span><br>
                                              <span> {{ $item->menu12 }} </span><br>
                                              <span> {{ $item->menu13 }} </span><br>
                                              <span> {{ $item->menu14 }} </span><br>
                                              <span> {{ $item->menu15 }} </span><br> --}}
                                              <a href="#" class="btn btn-primary">Buy Now</a>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            <!--modal end here-->
                @endforeach

            </table>

                </div>
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
@endsection


