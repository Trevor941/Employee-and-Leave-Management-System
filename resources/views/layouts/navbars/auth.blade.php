<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="upload/{{auth()->user()->profilepic}}">
            </div>
        </a>
        <a href="#" class="simple-text logo-normal text-capitalize">
           {{ auth()->user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="fa fa-university"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="fa fa-user"></i>
                    <p>
                            My Profile
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'leaveapp' ? 'active' : '' }}">
                            <a href="/leaves/create">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">Leave Application</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if(auth()->user()->role_id === 1)
            <li class="{{ $elementActive == 'allemployees' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                   <i class="fa fa-paste"></i>
                    <p>All Employees</p>
                </a>
             </li>
            <li class="{{ $elementActive == 'addUsers' ? 'active' : '' }}">
                <a href="/user/create">
                   <i class="fa fa-user-plus"></i>
                    <p>ADD EMPLOYEES</p>
                </a>
            </li>
            
             <li class="{{ $elementActive == 'leaves' ? 'active' : '' }}">
                <a href="{{ route('leaves.index') }}">
                   <i class="fa fa-paste"></i>
                    <p>All leave Applications</p>
                </a>
             </li>
             @endif
             {{--
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Approved Leave Applications</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Pending Leave Applications</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>Rejected Leave Applications</p>
                </a>
            </li> --}}
           
        </ul>
    </div>
</div>
