@extends('layouts.dashboard')
@section('title',$group_name)

@section('content')

@include('dashboard.components.alert') 

@component('dashboard.components.breadcrumb')
@slot('title')
group {{$group_name}}
@endslot
<li class="breadcrumb-item active"> {{$group_name}}</li>
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
                      <th>User</th>
                      <th>tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>
                      
                     <form action="{{route('users.destroy',$user->id)}}" method="POST">
                      <a href="{{ route('users.show', $user->id) }}" type="button" class="btn btn-default"><i class="fas fa-edit"></i></a>
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
            {{ $users->links() }}
            <!-- /.card -->
          </div>
        </div>
@endsection
