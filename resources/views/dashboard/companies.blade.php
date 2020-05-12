@extends('layouts.dashboard')
@section('title','companies')

@section('content')

@include('dashboard.components.alert')



@component('dashboard.components.breadcrumb')
@slot('title')
companies
@endslot
<li class="breadcrumb-item active">companies</li>
@endcomponent




<a href="{{ route('companies.create') }}" type="button" class="btn btn-default">
  <h3>new company</h3>
</a>
<br>
<br>
<br>
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
              <th>company</th>
              <th>logo</th>
              <th>tools</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
            <tr>
              <td>{{$company->id}}</td>
              <td>{{$company->name}}</td>
              <td>
                <img src="/storage/{{$company->image->path}}" height="100" width="100">

              </td>
              <td>


                <form action="{{route('companies.destroy',$company->id)}}" method="POST">
                  <a href="{{ route('companies.show', $company->id) }}" type="button" class="btn btn-default"><i
                      class="fas fa-info"></i></a>
                  <a href="{{ route('companies.edit', $company->id) }}" type="button" class="btn btn-default"><i
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
    {{ $companies->links() }}
    <!-- /.card -->
  </div>
</div>
@endsection