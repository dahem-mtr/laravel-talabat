@extends('layouts.dashboard')
@section('title','product')

@section('content')
@include('dashboard.components.alert') 
@component('dashboard.components.breadcrumb')
@slot('title')
product
@endslot
<li class="breadcrumb-item"><a href="{{ route('companies.index') }}">companies</a></li>
<li class="breadcrumb-item active"> <a href="{{ route('companies.edit', $product->menu->company->id) }}">{{$product->menu->company->name}}</a></li>
<li class="breadcrumb-item active"> <a href="{{ route('menus.edit', $product->menu->id) }}">{{$product->menu->name}}</a></li>
<li class="breadcrumb-item active"> {{$product->name}}</li>
@endcomponent


<div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-edit"></i> {{$product->name}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('products.update',$product->id )}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" placeholder="Enter text" name="name" value="{{$product->name}}" >
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input class="form-control" placeholder="Enter text" name="price" value="{{$product->price}}">
                            {{ $errors->first('price') }}
                        </div>
                        <div class="form-group">
                        @if ($product->hasImage())
                       <img src="/storage/{{$product->image->path}}"  height="80" width="80">
                       @else
                       there is no picture
                        @endif
                        <br>
                        <label>image</label>
                            <input class="form-control" type="file" name="image">
                            {{ $errors->first('image') }}

                            </div>
                        <button type="submit" class="btn btn-success">update</button>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.nav-tabs-custom -->
          </div>

            





@endsection
