@extends('layouts.admin.app')
@section('admin_content')

    @section('css')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    @endsection

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                      About Us Create Update
                    </div>
                    <div class="card-body">
                      <form class="form-control" method="POST" action="{{ url('admin/about/'.$topheader->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">About Title</label>
                            <input type="text" name="title" value="{{ @$about->title }}" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">About Descriptions</h5>
                                </div>
                                <div class="card-body">

                                    <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <!-- tools box -->
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-sm" data-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool btn-sm" data-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                                <i class="fa fa-times"></i></button>
                                        </div>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" name="description" placeholder="Place some text here"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!  @$about->description  !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary" name="" id="">
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>

    @section('js')
    <!-- CK Editor -->
    <script src="{{ asset('admin') }}/plugins/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });


        $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        ClassicEditor
          .create(document.querySelector('#editor1'))
          .then(function (editor) {
            // The editor instance
          })
          .catch(function (error) {
            console.error(error)
          })

        // bootstrap WYSIHTML5 - text editor

        $('.textarea').wysihtml5({
          toolbar: { fa: true }
        })
      })

    </script>
@endsection
