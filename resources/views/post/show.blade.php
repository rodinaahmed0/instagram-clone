@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/showPhoto.css')}}" rel="stylesheet">
@endpush
@section('content')

     @include('includes.navbar')

     <div class="container">
     <div class="card  " >
        <div class="row g-0">
          <div class="col-md-5">
            <img src="{{asset('images/posts/' . $post->image)}}" class="img-fluid rounded-start" alt="..." id="photo-show" >
          </div>
          <div class="  col-md-6 offset-md-1">
            <div class="card-body">
                <div class="par-box1">


                <div class="par-box2">
                        <div class="box2">
                            <a href="{{route('user.profile' , $post->user->id)}}" class="card-title" id="username-id" > <img src="{{asset('images/users/' . $post->user->avatar)}}" id="username">
                                 <span> {{$post->user->username}} </span> </a>
                        </div>

                        <div class="box2">

                            <ul>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle post-edit" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true" >
                                        ...
                                    </a>
                                    @if($post->user_id == Auth::user()->id)
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                                        <form action="{{route('post.delete' , $post->id)}}" method="GET">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger" > Delete </button>
                                        </form>

                                    <!-- <li><hr class="dropdown-divider"></li> -->
                                    <li><a class="dropdown-item " href="#">Cancel</a></li>
                                    </ul>
                                   @endif
                                  </li>
                            </ul>
                        </div>

                    </div>
                 @foreach ($post->comments as $comment )


                    <p class="card-text mt-2"><a href="{{route('user.profile' , $comment->user->id)}}" class="card-title"  >
                         <img src="{{asset('images/users/' . $comment->user->avatar)}}" id="username">
                         <strong> {{$comment->user->username}} </strong></a>
                          <span id="username-comment">{{$comment->comment}}</span> </p>

                @endforeach

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
          
                          <div class="comment-wrapper">
                            <a href="#">
                            <img src="{{asset('images/Smile.png')}}" class="icon" alt="">
                          </a>
                          <form action="{{route('post.comment' , $post->id)}}" method="get" style="display: inline-block; width: 100%">
                            @csrf
                           <input name="comment" type="text" class="comment-box" placeholder="Add a comment...">
                           <button type="submit"class="comment-btn">Post</button>
                       </form>
                        </div>
            </div>
          </div>
        </div>
      </div>
</div>

