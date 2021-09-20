@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/home.css')}}" rel="stylesheet">
@endpush
@section('content')
            @include('includes.navbar')
                                               <!-- Start POST -->
    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      @foreach ($posts as $post )


<div class="par-box2">

    <div class="box2" name="username" class="username" >
        <a href="{{route('user.profile' , $post->user->id)}}" class="card-title ">
        <img src="{{asset('images/users/' . $post->user->avatar)}}" id="username">
         {{$post->user->name}} </a>
    </div>
    <div class="box2">

        <ul>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle post-edit" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                    ...
                </a>
                @if($post->user_id == Auth::user()->id)
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                    <form action="{{route('post.delete' , $post->id)}}" method="GET">
                        @csrf
                      <button style="position: relative;z-index:20;"
                      type="submit" class="dropdown-item text-danger" > Delete </button>
                    </form>

                  <!-- <li><hr class="dropdown-divider"></li> -->
                  <li><a class="dropdown-item " href="#">Cancel</a></li>
                </ul>
                @endif
              </li>
        </ul>
    </div>
</div>

<div class="card mb-3">
    <a style="width:100%" href="{{route('post.show' , $post->id)}}">
        <img src="{{asset('images/posts/' . $post->image)}}"
    style="height: 500px" class="card-img-top" alt="...">
    </a>

    <div class="card-body">
      <h5 class="card-title">
           <a @if ($user->isUserLikePost($post->id))
            href="{{route('post.unlike' , $post->id)}}"
            @else
            href="{{route('post.like' , $post->id)}}"
            @endif>
          <i class="@if ($user->isUserLikePost($post->id))
            fas
            @else
            far
            @endif
           fa-heart"></i></a>
          <a href=""> <i class="far fa-comment"></i></a>
           <a
           @if ($user->isUserSavePost($post->id))
           href="{{route('post.unsave' , $post->id)}}"
           @else
           href="{{route('post.save' , $post->id)}}"
           @endif
           >
            <i class=" @if ($user->isUserSavePost($post->id))
                fas
                @else
                far
                @endif
                 fa-bookmark"></i>
        </a></h5>
      <div class="card-text" name="like" id="like"><a href=""> {{$post->users_like_it->count()}} likes</a></div>
            <div class="card-text" id="discreption" name="discreption"><a href="">
                {{$post->user->name}}
            </a><small class="text-muted">
                {{$post->caption}}
            </small></div>
            @foreach ( $post->comments as $comment )
            @if ($loop ->first)
            <div class="card-text" id="comment" name="comment">
                <a href="">{{$comment->user->name}} </a>
                <small class="text-muted">
                    {{$comment->comment}}
                </small></div>
                @endif
            @endforeach

    </div>

    <div class="comment-wrapper">
      <a href="#">
      <img src="images/Smile.png" class="icon" alt="">
    </a>
    <form action="{{route('post.comment' , $post->id)}}" method="get" style="display: inline-block; width: 100%">
         @csrf
        <input name="comment" type="text" class="comment-box" placeholder="Add a comment...">
        <button type="submit"class="comment-btn">Post</button>
    </form>
  </div>

  </div>


  @endforeach




@endsection
