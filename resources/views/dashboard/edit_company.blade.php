@extends('layouts.dashboard')
@section('title','company')

@section('content')
@include('dashboard.components.alert') 

@component('dashboard.components.breadcrumb')
@slot('title')
company
@endslot
<li class="breadcrumb-item"><a href="{{ route('companies.index') }}">companies</a></li>
<li class="breadcrumb-item active"> {{$company->name}}</li>
@endcomponent


<div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-edit"></i> {{$company->name}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('companies.update',$company->id )}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" placeholder="Enter text" name="name" value="{{$company->name}}" >
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            <label>describe</label>
                            <input class="form-control" placeholder="Enter text" name="describe" value="{{$company->describe}}">
                            {{ $errors->first('describe') }}
                        </div>
                        <div class="form-group">
                        <img src="/storage/{{$company->image->path}}"  height="100" width="100"> <br>
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

            
<!--  menus  -->
<div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> menus</h3>

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
                   
                      <th>tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($company->menus as $menu)
                    <tr>
                      <td>{{$menu->id}}</td>
                      <td>{{$menu->name}}</td>
                      
                      
                      <td>
                      
                      
                     <form action="{{route('menus.destroy',$menu->id)}}" method="POST">
                      <a href="{{ route('menus.edit', $menu->id) }}" type="button" class="btn btn-default"><i class="fas fa-edit"></i></a>
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

            <!--  menus  -->

        
<!--  new menu  -->


        <div class="row">
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  add new menu
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                
                <form action="{{route('menus.store')}}" method="POST" role="form" >
                    @csrf
                    <input type="hidden" id="custId" name="company_id" value="{{$company->id}}">
                    
                    <div class="col-3">
                    <div class="form-group">
                        <label>name</label>
                        <input class="form-control" placeholder="Enter text" name="name"  >
                        {{ $errors->first('name') }}
                    </div>
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
