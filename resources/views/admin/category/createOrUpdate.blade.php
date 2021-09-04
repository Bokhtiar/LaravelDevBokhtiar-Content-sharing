@extends('layouts.admin.app')
@section('admin_content')

@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> {{ isset($category) ? 'Category Update Form' : 'Category Create Form' }} </h3>
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
        @if(!empty($category))
        <form class="" method="post" action="{{ url('admin/category', $category->id) }}" >
            @method('PUT')
            @else
                <form action="{{ url('admin/category') }}" method="POST">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="">Category Name <span class="text-danger">*</span> </label>
                        <input type="text" name="name" value="{{ @$category->name }}" placeholder="Category Name" class="form-control" id="">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="">Category Color <span class="text-danger">*</span><span>[<a href="https://htmlcolorcodes.com/" target="blank">Color Code</a> ]</span></label>
                        <input type="text" name="color" value="{{ @$category->color }}" placeholder="Category Color" class="form-control" id="">
                    </div>
                </div>
            </div><!--name,color end-->
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" placeholder="Description" id="" cols="10" rows="4"> {{ @$category->description }} </textarea>
            </div><!--description end -->
            <div class="from-gorup float-right">
                @if (!empty($category))
                <input type="submit" class="btn btn-primary text-center" value="Update Category" name="" id="">
                @else
                <input type="submit" class="btn btn-primary text-center" value="Create New Category" name="" id="">
                @endif
            </div><!--submit button end -->
         </form>
    </div>
</section>


@section('js')
@endsection

@endsection
