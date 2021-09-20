                                                                <!-- Start NavBar -->

    <nav class="mb-5">
        <div class="
        @if(Route::currentRouteName() == 'user.edit' || Route::currentRouteName() == 'post.new')
        con
        @else
        container
        @endif
        ">
            <div class="box1">

                <div class="heading"></div>
            </div>

            <div class="box1" id="search">
                <input type="search"  placeholder="&#xf002 Search" style="font-family:Arial, FontAwesome">
            </div>
            <div class="box1">
                <ul>
                    <li><a href="{{route('home')}}" class="home"><img src="{{asset('images/home.png')}}" alt="Home"></a></li>
                    {{-- <form action="{{route('post.new')}}" method="post">

                    </form> --}}
                    <li><a href="{{route('post.new')}}" class="NewPost"><img src="{{asset('images/add (2).png')}}" alt="AddPost" id="NewPost"></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('images/users/' . Auth::user()->avatar)}}" alt="" class="profile">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dorper">
                            <li><a class="dropdown-item" href="{{route('user.profile', Auth::user()->id)}}"><i class="far fa-user-circle"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('user.profile', Auth::user()->id)}}"><i class="far fa-bookmark"></i> Saved</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
                        </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
