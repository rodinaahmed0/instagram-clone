@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/home.css')}}" rel="stylesheet">
@endpush
@section('content')
<nav class="mb-5">
  <div class="container">
      <div class="box1">

          <div class="heading"></div>
      </div>

      <div class="box1" id="search">
          <input type="search"  placeholder="&#xf002 Search" style="font-family:Arial, FontAwesome">
      </div>
      <div class="box1">
          <ul>
              <li><a href="#" class="home"><img src="images/home.png" alt="Home"></a></li>
              <li><a href="NewPost.html" class="NewPost"><img src="images/add (2).png" alt="AddPost" id="NewPost"></a></li>
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
                                                            <!-- End NavBar -->

                                                              <!-- Start POST -->
    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif 
      <div class="par-box2">

        <div class="box2" name="username" class="username" >
            <a href="#" class="card-title "> <img src="images/IMG-20200115-WA0105.jpg" id="username"> Abdelrahman Ibrahim</a>
        </div>
        <div class="box2">
            <ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle post-edit" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        ...
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                      <form action="" method="POST">    
                        <li><a class="dropdown-item text-danger" href="#"> Delete</a></li>
                    </form>

    
                      <!-- <li><hr class="dropdown-divider"></li> -->
                      <li><a class="dropdown-item " href="#">Cancel</a></li>
                    </ul>
                  </li>
            </ul>
        </div>
    </div>
    
    <div class="card mb-3">
    
        <img src="images/WhatsApp Image 2021-09-12 at 4.38.07 PM.jpeg " class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> <a href=""><i class="far fa-heart"></i></a> <a href=""><i class="far fa-comment"></i></a> <a href=""><i class="far fa-bookmark"></i></a></h5>
          <div class="card-text" name="like" id="like"><a href=""> 1456 likes</a></div>
                <div class="card-text" id="discreption" name="discreption"><a href="">Abdelrahman Ibr... </a><small class="text-muted">Last updated 3 mins ago Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae dolorum facilis ullam debitis a ratione, atque modi rerum eius nesciunt assumenda, possimus, omnis exercitationem! Sit exercitationem repellendus veniam architecto quae.</small></div>
                <div class="card-text" id="comment" name="comment"><a href="">Mohamed </a><small class="text-muted">Last updated 3 mins ago Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae dolorum facilis ullam debitis a ratione, atque modi rerum eius nesciunt assumenda, possimus, omnis exercitationem! Sit exercitationem repellendus veniam architecto quae.</small></div>
        </div>      
              
        <div class="comment-wrapper">
          <a href="#">
          <img src="images/Smile.png" class="icon" alt="">
        </a>
          <input type="text" class="comment-box" placeholder="Add a comment...">
          <button class="comment-btn">post</button>
      </div>
    
      </div>
    
@endsection
