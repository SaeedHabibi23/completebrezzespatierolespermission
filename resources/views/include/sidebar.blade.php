   <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    @if(auth()->user()->hasRole('admin'))
                    <li><a class="" href="{{route('admin.roles.index')}}">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Roles</span>
                    </a>
                    </li>
                    @endif
                    @can('can delete')
                    <li>
                        <a class="" href="{{route('admin.permission.index')}}">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Permission</span>
                        </a>
                    </li>
                @endcan
                    <li><a class="" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Users</span>
                    </a>
                    </li>
                 
					
                   
                   
                </ul>
			
				
				
			</div>
        </div>
        <!--**********************************
            Sidebar end