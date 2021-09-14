@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Blog List')
@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h2 class="card-title">LIST OF BLOG </h2>
                <div class="card-tools">
                    <div class="form-inline input-group input-group-sm" style="width: 115px;">
                        <div class="input-group-append">
                            <a class="btn btn-primary" href="{{ url('admin/blog/create') }}">CREATE BLOG</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12 col-lg-8">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover ]table-borderless " id="table">
                            <tr>
                            <th>Index</th>
                            <th>Blog Name</th>
                            <th>Action</th>
                            </tr>
                            @foreach ($blogs as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="form-inline">

                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a class="btn btn-sm btn-success" href="{{ url('admin/blog/'.$item->id.'/edit') }}"><i class="fas fa-user-edit"></i></a>

                                    <form  action="{{ url('admin/blog', $item->id ) }}" method="POST" >
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
                                        <span class="h3 container">Short Description</span>
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $item->short_description }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <span class="h3">Description</span><br>
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
                </div>
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

