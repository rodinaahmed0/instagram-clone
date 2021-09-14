@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/NewPost.css')}}" rel="stylesheet">
@endpush
@section('content')

<nav class="mb-5">
    <div class="container1">
        <div class="box1">

            <div class="heading"></div>
        </div>

        <div class="box1" id="search">
            <input type="search"  placeholder="&#xf002 Search" style="font-family:Arial, FontAwesome">
        </div>
        <div class="box1">
            <ul>
                <li><a href="Home.html" class="home"><img src="images/home.png" alt="Home"></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <img src="images/IMG-20200115-WA0113.jpg" alt="" class="profile">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                      <li><a class="dropdown-item" href="Profile.html"><i class="far fa-user-circle"></i> Profile</a></li>
                      <li><a class="dropdown-item" href="Saved.html"><i class="far fa-bookmark"></i> Saved</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Setting</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                  </li>
            </ul>
        </div>
    </div>
</nav> 
<div class="container">
    <div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">
    <form class="mt-5" method="POST"  action="" enctype="multipart/form-data">
        <!-- @csrf -->
        <!-- discreption -->
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Title</label>
                    <input type="text" class="form-control" name="caption" id="caption" aria-describedby="caption" placeholder="Enter Caption">
                </div>

            <!-- {{-- photo --}} -->
                <div class="mb-5">
                    <label for="exampleInputEmail1"  class="form-label">Photo</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="body" id="body">
                      </div>
                </div>

                
                <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

</div>
</div>
@endsection
