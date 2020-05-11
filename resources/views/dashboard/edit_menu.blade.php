@extends('layouts.dashboard')
@section('title','update menu')
@section('namePage','update menu')

@section('content')
@include('dashboard.components.alert')

<div class="col-md-9">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-edit"></i> {{$menu->name}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{route('menus.update',$menu->id )}}" method="POST" role="form">
        @csrf
        @method('PATCH')
        <div class="col-3">
          <div class="form-group">
            <label>name</label>
            <input class="form-control" placeholder="Enter text" name="name" value="{{$menu->name}}">
            {{ $errors->first('name') }}
          </div>
        </div>
        <button type="submit" class="btn btn-success">update</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>



<!--  products  -->
<div class="row">
  <div class="col-md-9">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> products</h3>

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
              <th>name</th>
              <th>price</th>
              <th>image</th>
           
              <th>tools</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($menu->products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}} / S.R</td>
              <td>
                
                @if ($product->hasImage())
                <img src="/storage/{{$product->image->path}}"  height="80" width="80">
                @else
                there is no picture
                @endif
                
                
                </td>
              
              <td>
              
              
             <form action="{{route('products.destroy',$product->id)}}" method="POST">
              <a href="{{ route('products.edit', $product->id) }}" type="button" class="btn btn-default"><i class="fas fa-edit"></i></a>

              @method('DELETE')
              @csrf
              <button type="submit"class="btn btn-default"><i class="fas fa-trash"></i></button>               
              </form>
              

              
            </td>
              
            </tr>
            @endforeach
           
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    
    <!-- /.card -->
  </div>
</div>

    <!--  products  -->


<!--  new menu  -->


<div class="row">
  <div class="col-md-9">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-edit"></i>
          add new product
        </h3>
      </div>
      <div class="card-body pad table-responsive">

        <form action="{{route('products.store')}}" method="POST" role="form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="menu_id" value="{{$menu->id}}">

          <div class="col-3">
            <div class="form-group">
              <label>name</label>
              <input class="form-control" placeholder="Enter text" name="name">
              {{ $errors->first('name') }}
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label>price</label>
              <input class="form-control" placeholder="Enter text" name="price">
              {{ $errors->first('price') }}
            </div>
          </div>
          <div class="form-group">
            <label>image</label>
            <input class="form-control" type="file" name="image">
            {{ $errors->first('image') }}

          </div>

          <button type="submit" class="btn btn-success">add</button>
        </form>

      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.col -->
</div>

<!-- / new menu  -->






@endsection