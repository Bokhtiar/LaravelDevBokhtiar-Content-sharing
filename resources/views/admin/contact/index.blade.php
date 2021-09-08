@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'List Of Contact')

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
                    <div class="form-inline input-group input-group-sm" style="width: 180px;">
                        <input type="text" id="search_key" name="search_key" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover" id="table">
                <tr>
                <th>Index</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                @foreach ($contacts as $item)
                <tr id="myList">
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if($item->status==0)
                        <span> <a class="badge badge-danger" href="{{ url('admin/contact/status/'.$item->id) }}">InActive</a> </span>
                        @else
                        <span> <a class="badge badge-success" href="{{ url('admin/contact/status/'.$item->id) }}">Active</a> </span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <form action="{{ url('admin/contact', $item->id ) }}" method="POST">
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
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->subject }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                {{ $item->message }}
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
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div><!-- /.row -->
</section>

@section('js')
@endsection

@endsection
