@extends('layouts.dashboard')
@section('title','new company')

@section('content')

@component('dashboard.components.breadcrumb')
@slot('title')
new company
@endslot
<li class="breadcrumb-item"><a href="{{ route('companies.index') }}">companies</a></li>
<li class="breadcrumb-item active">new company</li>
@endcomponent

<div class="col-md-9">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">new company</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('companies.store')}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" placeholder="Enter text" name="name" value="{{ old('name')}}" >
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            <label>describe</label>
                            <input class="form-control" placeholder="Enter text" name="describe" value="{{ old('describe')}}">
                            {{ $errors->first('describe') }}
                        </div>
                        <div class="form-group">
                        <label>image</label>
                            <input class="form-control" type="file" name="image">
                            {{ $errors->first('image') }}

                            </div>
                        <button type="submit" class="btn btn-success">add</button>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.nav-tabs-custom -->
          </div>


@endsection
