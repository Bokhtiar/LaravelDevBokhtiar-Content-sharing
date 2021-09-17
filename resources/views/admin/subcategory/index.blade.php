@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Sub Category List')
@section('css')
@endsection

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <section class="my-3">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="card">
                        <span class="card-title text-center h4">Sub Category Form</span><hr>
                    <div class="card-body">
                        @if (!empty($subcat))
                        <form action="{{ url('admin/sub-category',$subcat->id) }}" method="post">
                        @method('PUT')
                        @else
                        <form action="{{ url('admin/sub-category') }}" method="POST">
                            @method('POST')
                        @endif
                            @csrf
                            <div class="form-gorup">
                                <label for="">Enter Sub Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ @$subcat->name }}" placeholder="Enter Sub-Category Name" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Select Category <span class="text-danger">*</span> </label>
                                <select class="form-control select2" style="width: 100%;" name="categroy_id">
                                    <option selected="selected">--Select Category--</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == @$subcat->category_id ? 'selected' : '' }}>{{ $item->name }} </option>
                                     @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="status" value="0" id="">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Submit" class="form-control" name="" id="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- sub category form --}}
            <div class="col-md-8 col-sm-12 col-lg-8">
                <!-- /.card-header -->
                <div class="card">
                    <p class="card-title">SubCategory List</p>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover  text-center" id="table">
                            <tr>
                            <th>Index</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                            @foreach ($subcategories as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @if($item->status==1)
                                    <span> <a class="badge badge-success" href="{{ url('admin/sub-category/status/'.$item->id) }}">Active</a> </span>
                                    @else
                                    <span> <a class="badge badge-danger" href="{{ url('admin/sub-category/status/'.$item->id) }}">InActive</a> </span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ url('admin/sub-category/'.$item->id.'/edit') }}"><i class="fas fa-user-edit"></i></a>

                                    <form  action="{{ url('admin/sub-category', $item->id ) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                            <!-- /.card -->
                    </div>
                </div>
            {{-- sub category show --}}

        </div>
    </section>

@endsection
@section('js')
@endsection
