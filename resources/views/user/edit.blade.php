@extends('layouts.app')

@push('custom-css')
<link href="{{asset('css/profile2.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

@section('content')

  @include('includes.navbar')

<div  class="container">
    <div class="row">

         <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                 Edit Profile
                </a>
                <!-- <a href="#" class="list-group-item list-group-item-action">Change Password</a> -->
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">Logout</a>

              </div>
         </div>
         <div class="col-md-8">
               <div class="container">
               <div class="row">
                    <div class="col-md-2">
                        <img class="edit-img" src="{{asset('images/users/' . $user->avatar)}}" alt="">
                    </div>

                    <div class="col-md-10">
                        <h6 class="mt-2" style="font-weight: 700;">{{$user->username}}</h6>
                        <i type="button" class=" update-color" data-toggle="modal" data-target="#exampleModalCenter">
                            Change Profile Photo
                        </i>
                    </div>

               </div>
            </div>

             <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">

            <ul class="list-group text-center">
            <form method="POST" action="{{route('user.updateImg')}}"  enctype="multipart/form-data">
              @method('PUT')
              @csrf
                   <li class="list-group-item">
                     <label style="cursor: pointer; " name="avatar" class="update-color des-pop mr-5" for="upload-img">
                        Upload Photo
                     </label>
                    <input class="form-control-file"  id="upload-img" name="avatar" type="file">

                    <a class="update-color des-pop mr-3"  href="#"> <button  class="btn btn-primary" type="submit">Submit</button> </a> </li>
                  </li>
                    </form>

                <li class="list-group-item">
                    <a href="{{route('user.deleteImg' , Auth::user()->id)}}"
                    style="font-weight: 600;" class="des-pop text-danger">
                  Remove Current Photo
                </a>
                </li>
               <li class="list-group-item"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
              </ul>

        </div>

      </div>
    </div>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
            <div class="container py-4">
                <form method="POST" action="{{route('user.update' , $user->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="form-group py-2">
                      <div class="row">
                       <div class="col-md-2">
                        <label class="m-2 form-labels">Name</label>
                       </div>
                       <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name}}">
                       </div>

                  </div>
                  </div>

                  <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Username</label>
                     </div>
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="username" value="{{old('username') ?? $user->username}}">
                     </div>

                </div>
                </div>

                <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Email</label>
                     </div>
                     <div class="col-md-10">
                      <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email}}">
                     </div>

                </div>
                </div>

                <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Website</label>
                     </div>
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="website" >
                     </div>

                </div>
                </div>

                <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Bio</label>
                     </div>
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="bio" value="{{old('bio') ?? $user->bio}}" >

                     </div>

                </div>
                </div>

                <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Phone</label>
                     </div>
                     <div class="col-md-10">
                      <input type="number" class="form-control" name="phone" value="{{old('phone') ?? $user->phone}}" >
                     </div>

                </div>
                </div>

                <div class="form-group py-2">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Gender</label>
                     </div>
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="gender" value="{{old('gender') ?? $user->gender}}">
                     </div>

                </div>
                </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>

                </form>
              </div>


         </div>



    </div>



</div>


@endsection


