<nav class="navbar navbar-top navbar-expand navbar-dark  border-bottom" style="background-color: #68150F">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main"
                action="{{ route('search') }}" method="POST">
                @csrf
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text" name="search">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form> --}}
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"> <i class="fa fas fa-angle-down"></i>
                        {!! Str::upper(app()->getLocale()) !!}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {!! Form::open(['url' => ['settings/updateLanguage'], 'method' => 'patch', 'id' => 'languages-form']) !!}
                        {!! Form::hidden('locale', app()->getLocale(), ['id' => 'current-language']) !!}
                        {{-- {!! Form::hidden($name, $value, [$options]) !!} --}}
                        <a href="#" class="dropdown-item @if (app()->getLocale() == 'en') active @endif"
                            onclick="changeLanguage('en')">
                            <i class="fas fa-circle mr-2"></i> English
                        </a>
                        <a href="#" class="dropdown-item @if (app()->getLocale() == 'it') active @endif"
                            onclick="changeLanguage('it')">
                            <i class="fas fa-circle mr-2"></i> Italiana
                        </a>
                        {!! Form::close() !!}
                    </div>
                </li>
                @php
                    if (auth()->user()->hasrole('super-admin'))
                    {
                        $users = App\User::join('messages', 'users.id', '=', 'messages.from_user')
                            // ->join('messages', 'users.id', '=', 'messages.from_user')
                            ->where('messages.to_user', auth()->id())
                            ->where('messages.is_read', 0)
                            ->select('users.*')
                            ->get();
                    } else {
                        $users = App\User::join('messages', 'users.id', '=', 'messages.from_user')
                            ->where('users.id', 1)
                            ->where('messages.to_user', auth()->id())
                            ->where('messages.is_read', 0)
                            ->get();
                    }
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-default" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">

                        <span><i class="ni ni-bell-55" style="color: white; font-size:20px;"></i></span>

                        @if ($users->count() > 0)
                        <span class="badge badge-md badge-circle badge-floating" style="margin-left:-10px;color: #68150F;
                        background-color: #EDD7BF; ">{{ $users->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have
                                {{ $users->count() }}
                                <strong class="text-primary">New</strong>
                                messages.
                            </h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <ul class="list-unstyled list-group-item list-group-item-action">
                                @php
                                    $users_ids = [];
                                @endphp
                                @foreach ($users as $user)
                                    @if (!in_array($user->id, $users_ids))
                                        @php
                                            $users_ids[] = $user->id;
                                        @endphp
                                        <li class="user" data-id="{{ $user->id }}" id="user-{{ $user->id }}"
                                            user-id="{{ $user->id }}">
                                            <a href="{{ route('chat') }}">
                                                <div class="media">

                                                    <div class="chat-user-img online align-self-center mr-3">
                                                        <i class="fa fa-user-circle-o fa-6" aria-hidden="true"
                                                            style="font-size: 25px"></i>
                                                        <span class="user-status"></span>
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-15 mb-1">{{ $user->name }}
                                                        </h5>
                                                    </div>
                                                    @if (date('Y-m-d') == date('Y-m-d', strtotime($user->created_at)))
                                                        <div class="font-size-11">
                                                            {{ date('h:i a', strtotime($user->created_at)) }}</div>
                                                    @else
                                                        <div class="font-size-11">
                                                            {{ date('d/m', strtotime($user->created_at)) }}</div>
                                                    @endif
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                        <!-- View all -->
                        <a href="{{ route('chat') }}"
                            class="dropdown-item text-center text-primary font-weight-bold py-3">View
                            all</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('chat') }}">
                        <i class="ni ni-chat-round" style="color: white"></i>
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ni ni-ungroup" style="color: white"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                        <div class="row shortcuts px-4">
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                    <i class="ni ni-calendar-grid-58"></i>
                                </span>
                                <small>Calendar</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                    <i class="ni ni-email-83"></i>
                                </span>
                                <small>Email</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                    <i class="ni ni-credit-card"></i>
                                </span>
                                <small>Payments</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                    <i class="ni ni-books"></i>
                                </span>
                                <small>Reports</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                    <i class="ni ni-pin-3"></i>
                                </span>
                                <small>Maps</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                    <i class="ni ni-basket"></i>
                                </span>
                                <small>Shop</small>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            {{-- <span class="avatar avatar-sm rounded-circle">
                                @if (Auth::user()->profile_photo)
                                    <img width="45" height="45" class="img-fluid rounded-pill"
                                        src="{{ asset(Auth::user()->profile_photo) }}" alt="">
                                @else
                                <i class="far avatar avatar-sm rounded-circle fa-user"></i>
                                @endif
                            </span> --}}
                            <i class="fa fa-user-circle-o fa-6" aria-hidden="true" style="font-size: 25px"></i>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"
                                    style="color:white">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        @can('settings.update')
                            <a href="{{ route('settings.index') }}" class="dropdown-item">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        @endcan
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
