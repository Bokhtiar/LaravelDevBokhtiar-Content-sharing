@extends('layouts.admin.app')
@section('admin_content')
@section('title','top header ')
    @section('css')
    @endsection

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      Top Header Create and Update
                    </div>
                    <div class="card-body">
                      <form class="form-control" method="POST" action="{{ url('admin/topheader/'.$topheader->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" value="{{ @$topheader->website_name }}" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ @$topheader->email }}" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ @$topheader->phone }}" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="text" name="time" value="{{ @$topheader->time }}" class="form-control" id="">
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
    @endsection

@endsection
