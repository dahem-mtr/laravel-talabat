@extends('layouts.dashboard')
@section('title','orders')

@section('content')

@include('dashboard.components.alert')



@component('dashboard.components.breadcrumb')
@slot('title')
orders
@endslot
<li class="breadcrumb-item active">orders</li>
@endcomponent





<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>customer</th>
              <th>phone number</th>
              <th>tools</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->customer->name}}</td>
              <td>{{$order->customer->phone_no}}</td>
              <td>


                <form action="{{route('orders.destroy',$order->id)}}" method="POST">
                  <a href="{{ route('orders.show', $order->id) }}" type="button" class="btn btn-default"><i
                      class="fas fa-info"></i></a>
                  <a href="{{ route('orders.edit', $order->id) }}" type="button" class="btn btn-default"><i
                      class="fas fa-edit"></i></a>
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-default"><i class="fas fa-trash"></i></button>
                </form>



              </td>

            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    {{ $orders->links() }}
    <!-- /.card -->
  </div>
</div>
@endsection