@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Order Detail')
<div class="card-header">
    <h2 class="card-title">LIST OF ORDER </h2>
    </div>
<div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0 text-center">
        <thead>
        <tr>
          <th>Order ID</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $item)
        <tr>
            <td>#{{$item->id}}</td>
            <td>{{ $item->f_name .' '. $item->l_name }}</td>
            <td>
                @if ($item->status==1)
                <span class="badge badge-success"> Success </span>
                @else
                <span class="badge badge-danger"> Pending </span>
                @endif

            </td>
            <td>
                @if ($item->status==0)
                <a href="{{ url('admin/order/status/'.$item->id) }}"><span class="badge badge-success"> Success </span></a>
                @else
                <a href="{{ url('admin/order/status/'.$item->id) }}"><span class="badge badge-danger"> Pending </span></a>
                @endif
              <a href="{{ url('admin/order/detail/'.$item->id) }}" class="btn btn-sm btn-info">View</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  @endsection
