@extends('layouts.app')

@push('custom-css')
<link href="{{asset('css/profile.css')}}" rel="stylesheet">
@endpush

@section('content')
@include('includes.navbar')


<div class="con-profile-border">
<div class="contanier-profile">


    <div class="big-box1">
        <a href="">
            <img src="{{asset('images/users/'. $user->avatar)}}" alt="Profile" id="profile-img">
        </a>
    </div>
    <div class="big-box2">
        <div class="contanier-username">
                <div class="username">
                    <p id="username"> {{$user->username}} </p>
                </div>
                <div class="edit-profile">
                    @if(Auth::user()->id == $user->id)
                    <form method="get" action="{{route('user.edit' , Auth::user()->id)}}">
                        @csrf
                        <button type=submit">Edit Profile</button>
                    </form>
                    @else

                        @if ($user->isAuthUserFollowedUser($user->id))
                        <form method="get" action="{{route('user.unfollow',$user->id)}}">
                        <button type="submit">UnFollow</button>
                        </form>
                        @else
                        <form method="get" action="{{route('user.follow',$user->id)}}">

                        <button type="submit">
                            @if($user->followBack($user->id))
                             Follow Back
                             @else
                             Follow
                             @endif
                        </button>
                        </form>
                        @endif

                    @endif
                </div>


                <div class="setting">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <img src="{{asset('images/setting.png')}}" alt="" class="profile">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-key"></i> Change Password</a></li>
                            </li>
                    </ul>
                </div>
        </div>

        <div class="follow ">
            <div class="Posts">
                <a href=""><strong> {{$user->posts->count()}} </strong> Posts</a>
            </div>
            <div class="followers">
                <a data-toggle="modal" data-target="#exampleModalCenter" href=""><strong> {{$user->followers->count()}} </strong>Followers</a>
            </div>
            <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Followers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @foreach ($user->followers as $u )


                    <a href="{{route('user.profile' , $u->id )}}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-md-2">
                                <img style="width: 100%;" class="profile"  src="{{asset('images/users/' . $u->avatar)}}" alt="">

                            </div>
                            <div class="col-md-10">
                                <h4 class="mt-2" style="font-weh4ght: 600; font-size:18px ">{{$u->name}}</h4>
                                <i class="mt-2" style="font-weight: 600; font-size:15px ">@ {{$u->username}}</i>
                            </div>
                      </div>
                      </a>
                      @endforeach
                </div>

            </div>
            </div>
        </div>
            <div class="following">
                <a data-toggle="modal" data-target="#exampleModalCenter1" href="">
                     <strong> {{$user->followings->count()}} </strong> Following</a>

            </div>
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Following</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($user->followings as $u )


                        <a href="{{route('user.profile' , $u->id )}}" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width: 100%;" class="profile"  src="{{asset('images/users/' . $u->avatar)}}" alt="">

                                </div>
                                <div class="col-md-10">
                                    <h4 class="mt-2" style="font-weh4ght: 600; font-size:18px ">{{$u->name}}</h4>
                                    <i class="mt-2" style="font-weight: 600; font-size:15px ">@ {{$u->username}}</i>
                                </div>
                          </div>
                          </a>
                          @endforeach
                    </div>

                </div>
                </div>
            </div>


        </div>

        <div class="only-name">
            <div class="naming">

                <h5>{{$user->name}} </h5>
            </div>


            <div class="bio">
                <p>
                    {{$user->bio }}
                </p>

            </div>
        </div>
    </div>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-th"></i> Posts</button>
    </li>

    @if(Auth::user()->id == $user->id)
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <i class="far fa-bookmark"></i> Saved</button>
    </li>
    @endif

    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="contanier-posts">

            {{-- Posts --}}
            @foreach ($user->posts as $post )
            <div class="first-box">
                <a href="{{route('post.show' , $post->id)}}">
                    <img src="{{asset('images/posts/' . $post->image)}}" alt="">
                </a>
                </div>
            @endforeach


        </div>
    </div>
    @if(Auth::user()->id == $user->id)
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="contanier-posts">
            {{-- Saved Posts --}}
            @foreach ($user->saved_posts as $post )
            <div class="first-box">
                <a href="{{route('post.show' , $post->id)}}">
                    <img src="{{asset('images/posts/' . $post->image)}}" alt="">
                </a>
                </div>
            @endforeach



        </div>
    </div>

    @endif

    </div>

</div>



@endsection

