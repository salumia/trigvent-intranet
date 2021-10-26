<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                {{-- <img src="{{url('/public/bsbmd/images/user.png')}}" width="48" height="48" alt="User" /> --}}
                
                @if (Auth::user()->image)
                <img src="{{ url('/public/employee-images/' . Auth::user()->image) }}"
                    alt="image" width="48" height = "48"  class="rounded-circle">

            @else
                @if (Auth::user()->gender == 'male')
                    <img src="{{ url('/public/employee-images/avatar-male.png') }}"  
                        alt="Admin" class="rounded-circle" width="48" height = "48">
                @else
                
                <img src="{{ url('/public/employee-images/avatar-female.png') }}"  
                    alt="Admin" class="rounded-circle" width="48" height = "48">
                @endif
            @endif
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ ucwords(Auth::user()->first_name) }}</div>
                <div class="email">{{ Auth::user()->personal_email_address }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('employeeDetails') }}"><i class="material-icons">person</i>Profile</a>
                        </li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        {{-- <li role="seperator" class="divider"></li> --}}
                        {{-- <li><a href="{{ route('changePassword') }}"><i class="material-icons">person</i>Change
                                Password</a></li>
                        <li><a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"><i
                                    class="material-icons">input</i>Sign Out</a></li> --}}
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li {{ Route::is('dashboard') ? 'class=active' : '' }}>
                    <a href="{{ route('dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                {{-- @canany(['isAdmin', 'isHr']) --}}
                 @can(['isHrOrAdmin'])  
                    <li {{ Route::is('addEmployee') || Route::is('employeesListing') ? 'class=active' : '' }}>
                        <a {{ Route::is('addEmployee') || Route::is('employeesListing') ? 'class=toggled' : '' }}
                            href="javascript:void(0);" class="menu-toggle waves-effect waves-block  ">
                            <i class="material-icons">trending_down</i>
                            <span>Employees</span>
                        </a>
                        {{-- {{ old('designation') == $des->id ? 'selected' : '' }} --}}
                        <ul class="ml-menu">
                            <li {{ Route::is('addEmployee') ? 'class=active' : '' }}>
                                <a href="{{ route('addEmployee') }}" class="nav-link  waves-effect waves-block  ">
                                    <span>Add new</span>
                                </a>
                            </li>
                            <li {{ Route::is('employeesListing') ? 'class=active' : '' }}>
                                <a href="{{ route('employeesListing') }}" class="nav-link  waves-effect waves-block">
                                    <span>Listing</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li {{ Route::is('addattendence') || Route::is('viewattendence') ? 'class=active' : '' }}>
                        <a {{ Route::is('addattendence') || Route::is('viewattendence') ? 'class=toggled' : '' }}
                            href="javascript:void(0);" class="menu-toggle waves-effect waves-block  ">
                            <i class="material-icons">trending_down</i>
                            <span>Attendence Management</span>
                        </a>
                        {{-- {{ old('designation') == $des->id ? 'selected' : '' }} --}}
                        <ul class="ml-menu">
                            <li {{ Route::is('addattendence') ? 'class=active' : '' }}>
                                <a href="{{ route('addattendence') }}" class="nav-link  waves-effect waves-block  ">
                                    <span>Add attendence</span>
                                </a>
                            </li>
                            <li {{ Route::is('viewattendence') ? 'class=active' : '' }}>
                                <a href="{{ route('viewattendence') }}" class="nav-link  waves-effect waves-block">
                                    <span>View attendence</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                  @endcan 

{{-- ---------------------------------------------------------leave Management--------------------------------------------}}


                  <li {{ Route::is('apply_leaves') || Route::is('leave_listing') ? 'class=active' : '' }}>
                    <a {{ Route::is('apply_leaves') || Route::is('leave_listing') ? 'class=toggled' : '' }}
                        href="javascript:void(0);" class="menu-toggle waves-effect waves-block  ">
                        <i class="material-icons">trending_down</i>
                        <span>Leave Management</span>
                    </a>
                    {{-- {{ old('designation') == $des->id ? 'selected' : '' }} --}}
                    <ul class="ml-menu">

                        @can(['isHrOrEmployee']) 
                        <li {{ Route::is('apply_leaves') ? 'class=active' : '' }}>
                            <a href="{{ route('apply_leaves') }}" class="nav-link  waves-effect waves-block  ">
                                <span>Apply Leaves</span>
                            </a>
                        </li>
                       
                        <li {{ Route::is('my_leaves') ? 'class=active' : '' }}>
                            <a href="{{ route('my_leaves') }}" class="nav-link  waves-effect waves-block">
                                <span>My leaves</span>
                            </a>
                        </li>
                        @endcan 
                        @can(['isHrOrAdmin'])
                        <li {{ Route::is('leaves_listing') ? 'class=active' : '' }}>
                            <a href="{{ route('leaves_listing') }}" class="nav-link  waves-effect waves-block  ">
                                <span>Leaves listng</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
{{-- -------------------------------------------------------------leave Management end--------------------------------------------------}}


                   @can(['isEmployee'])   
                  <li {{ Route::is('viewemployeeattendence') ? 'class=active' : '' }}>
                    <a href="{{ route('viewemployeeattendence') }}">
                        <i class="material-icons">fingerprint </i>
                        <span>My attendence</span>
                    </a>
                </li>
                 @endcan  

                <li {{ Route::is('employeeDetails') ? 'class=active' : '' }}>
                    <a href="{{ route('employeeDetails') }}">
                        <i class="material-icons">person</i>
                        <span>My Profile</span>
                    </a>
                </li>
               

                {{-- </li> --}}

                {{-- employee details --}}



            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;
                @php
                    echo date('Y');
                @endphp
                <a href="javascript:void(0);">{{ config('constants.title') }}</a>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0 Beta
            </div>
        </div>
        <!-- #Footer -->
    </aside>

    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
