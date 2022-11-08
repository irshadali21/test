
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}" data-toggle="tooltip" data-original-title="{{ setting('company_name') }}">
                @if (setting('company_logo'))
                <img alt="{{ setting('company_name') }}"
                height="45"
                class="navbar-brand-img"
                src="{{ asset(setting('company_logo')) }}">
                <strong>{{ substr(setting('company_name'), 0, 15) }}</strong>
                @else
                <strong>{{ substr(setting('company_name'), 0, 15) }}</strong>
                @endif
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}" href="{{route('home')}}">
                            <i class="ni ni-shop " style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    @canany(['view-file', 'create-file'])
                    
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('files*')) ? 'active' : '' }}" href="#navbar-files"  data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-files">
                            <i class="fas fa-tasks" style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Files</span>
                        </a>
                        <div class="collapse {{ (request()->is('files*')) ? 'show' : '' }} {{ (request()->is('certificate*')) ? 'show' : '' }}" id="navbar-files">
                            <ul class="nav nav-sm flex-column">
                                
                                @canany(['create-file'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('files.create')}}">
                                        <span class="sidenav-mini-icon">D </span>
                                        <span class="nav-link-text">Create New File</span>
                                    </a>
                                </li>
                                @endcan
                                @canany(['update-file'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('files.index')}}">
                                        <span class="sidenav-mini-icon">D </span>
                                        <span class="nav-link-text">Edit File</span>
                                    </a>
                                </li>
                                @endcan
                                @canany(['update-file'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('certificate.index')}}">
                                        <span class="sidenav-mini-icon">D </span>
                                        <span class="nav-link-text">Consult</span>
                                    </a>
                                </li>
                                @endcan
                                @canany(['view-reports'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('reports.index')}}">
                                        <span class="sidenav-mini-icon">D </span>
                                        <span class="nav-link-text">Reports</span>
                                    </a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('update-settings')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{route('settings.index')}}">
                            <i class="ni ni-settings-gear-65" style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Settings</span>
                        </a>
                    </li>
                    @endcan
                    
                    
                    @canany(['view-user', 'create-user'])
                    
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}" href="#navbar-users"  data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-users">
                            <i class="fas fa-user" style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Users</span>
                        </a>
                        <div class="collapse {{ (request()->is('users*')) ? 'show' : '' }}" id="navbar-users">
                            <ul class="nav nav-sm flex-column">
                                @can('view-user')
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">All Users</span></a>
                                </li>
                                @endcan
                                @can( 'create-user')
                                <li class="nav-item">
                                    <a href="{{route('users.create')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">Add New User</span></a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan
                    
                    @canany(['view-permission', 'create-permission'])
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('permissions*')) ? 'active' : '' }}" href="{{route('permissions.index')}}">
                            <i class="fas fa-lock-open "style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Permissions</span>
                        </a>
                    </li>
                    @endcan
                    @canany(['view-role', 'create-role'])
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('roles*')) ? 'active' : '' }}" href="{{route('roles.index')}}">
                            <i class="fas fa-lock "style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Roles</span>
                        </a>
                    </li>
                    @endcan
                    
                    @canany(['media'])
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('media*')) ? 'active' : '' }}" href="{{route('media.index')}}">
                            <i class="fas fa-images "style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Manage Media</span>
                        </a>
                    </li>
                    @endcan
                    @canany(['view-activity-log'])
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('activity-log*')) ? 'active' : '' }}" href="{{route('activity-log.index')}}">
                            <i class="fas fa-history "style="color: #B5ABA2"></i>
                            <span class="nav-link-text">Activity Log</span>
                        </a>
                    </li>
                    @endcan
                    
                    
                </ul>
            </div>
        </div>
    </div>
</nav>
