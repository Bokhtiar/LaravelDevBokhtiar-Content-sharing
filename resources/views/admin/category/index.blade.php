@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Category List')
@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h2 class="card-title">LIST OF CATEGORY </h2>
                <div class="card-tools">
                    <div class="form-inline input-group input-group-sm" style="width: 115px;">
                        <div class="input-group-append">
                            <a class="btn btn-primary" href="">Create Category</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover  text-center" id="table">
                <tr>
                <th>Index</th>
                <th>Category Name</th>
                <th>Color</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->color }}</td>
                    <td>
                        @if($item->status==0)
                        <span> <a class="badge badge-success" href="{{ url('admin/category/status/'.$item->id) }}">Active</a> </span>
                        @else
                        <span> <a class="badge badge-danger" href="{{ url('admin/category/status/'.$item->id) }}">InActive</a> </span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a class="btn btn-sm btn-success" href="{{ url('admin/category/'.$item->id.'/edit') }}"><i class="fas fa-user-edit"></i></a>

                        <form  action="{{ url('admin/category', $item->id ) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
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
                                {{ $item->description }}
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

