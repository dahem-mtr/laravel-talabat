@extends('layouts.dashboard')
@section('title','user Profile')
@section('namePage','user Profile')

@section('content')

@include('dashboard.components.alert') 

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{URL::asset('dist/img/boxed-bg.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>


               

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">user data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('users.update',$user->id)}}" method="POST" role="form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" placeholder="Enter text" name="name" value="{{ $user->name }}">
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control" placeholder="Enter text" name="email"
                                value="{{ $user->email }}">
                            {{ $errors->first('email') }}
                        </div>
                        @if (Auth::user()->group->name == 'admins')
                        <div class="form-group">
                            <label>Group</label>
                            
                            <select class="form-control" name="group_id">
                                <option value="{{$user->group->id}}">{{$user->group->name }}</option>
                                @foreach ($groups as $group)
                                @if ( $group->name !== $user->group->name )
                                <option value="{{$group->id}}"> {{$group->name}} </option>
                        @endif

                                @endforeach
                                
                                
                                
                            </select>
                            
                            
                        </div>
                        @endif
                        <button type="submit" class="btn btn-success">update</button>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
