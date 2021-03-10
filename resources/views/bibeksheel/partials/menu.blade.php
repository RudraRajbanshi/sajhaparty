@section('sidebar')
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
		<!-- Brand -->
		<div class="sidenav-header  d-flex  align-items-center">
			<a class="navbar-brand" href="{{ route('admin.members') }}">
                <div style="color: rgb(61, 27, 216)">
                    <div class="mt-3"><b> Bibeksheel </b></div>
                    <small> Sajha Party </small>

                </div>
				{{-- <img src="" class="navbar-brand-img" alt="..."> --}}
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
				{{-- No dropdown side menu --}}
				<ul class="navbar-nav mb-md-3">
					{{-- <li class="nav-item">
						<a class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}" href="{{route('admin.home')}}" target="_blank">
							<i class="fas fa-home nav-icon text-cyan">

							</i>
							<span class="nav-link-text"> {{ trans('cruds.dashboard.title') }} </span>
						</a>
					</li> --}}
                    <li class="nav-item">
						<a class="nav-link" href="{{route('admin.members')}}">
							<i class="fas fa-home nav-icon text-cyan">

							</i>
							<span class="nav-link-text"> Members </span>
						</a>
					</li>
				</ul>
				{{-- end of no dropdown side menu --}}
				<!-- Nav items -->
				<ul class="navbar-nav">
					@can('user_management_access')
					<li class="nav-item">
						<a class="nav-link collapsed" href="#navbar-user-management" data-toggle="collapse" role="button"
							aria-expanded="false" aria-controls="navbar-user-management">
							<i class="fas fa-users nav-icon text-primary">

							</i>
							<span class="nav-link-text"> {{ trans('cruds.userManagement.title') }} </span>

						</a>
						<div class="collapse" id="navbar-user-management">
							<ul class="nav nav-sm flex-column">
								@can('permission_access')
								<li class="nav-item">
									<a href="{{ route("admin.permissions.index") }}"
										class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-unlock-alt nav-icon">
											</i>
										</span>
										<span class="sidenav-normal"> {{ trans('cruds.permission.title') }} </span>

									</a>
								</li>
								@endcan
								@can('role_access')
								<li class="nav-item">
									<a href="{{ route("admin.roles.index") }}"
										class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-briefcase nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.role.title') }}
										</span>
									</a>
								</li>
								@endcan
								@can('user_access')
								<li class="nav-item">
									<a href="{{ route("admin.users.index") }}"
										class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-user nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.user.title') }}
										</span>
									</a>
								</li>
								@endcan
							</ul>
						</div>
					</li>
					@endcan
					@can('location_management_access')
					<li class="nav-item">
						<a class="nav-link" href="#navbar-location-management" data-toggle="collapse" role="button"
							aria-expanded="false" aria-controls="navbar-location-management">
							<i class="ni ni-pin-3 text-primary">

							</i>
							<span class="nav-link-text"> {{ trans('cruds.locationManagement.title') }} </span>

						</a>
						<div class="collapse" id="navbar-location-management">
							<ul class="nav nav-sm flex-column">
								@can('province_access')
								<li class="nav-item">
									<a href="{{ route("admin.provinces.index") }}"
										class="nav-link {{ request()->is('admin/provinces') || request()->is('admin/provinces/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-unlock-alt nav-icon">
											</i>
										</span>
										<span class="sidenav-normal"> {{ trans('cruds.province.title') }} </span>

									</a>
								</li>
								@endcan
								@can('district_access')
								<li class="nav-item">
									<a href="{{ route("admin.districts.index") }}"
										class="nav-link {{ request()->is('admin/districts') || request()->is('admin/districts/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-unlock-alt nav-icon">
											</i>
										</span>
										<span class="sidenav-normal"> {{ trans('cruds.district.title') }}
										</span>
									</a>
								</li>
								@endcan
								@can('municipality_access')
								<li class="nav-item">
									<a href="{{ route("admin.municipalities.index") }}"
										class="nav-link {{ request()->is('admin/municipalities') || request()->is('admin/municipalities/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-unlock-alt nav-icon">
											</i>
										</span>
										<span class="sidenav-normal"> {{ trans('cruds.municipality.title') }}
										</span>
									</a>
								</li>
								@endcan
							</ul>
						</div>
					</li>
					@endcan
					@can('membership_management_access')
					<li class="nav-item">
						<a class="nav-link" href="#navbar-membership-management" data-toggle="collapse" role="button"
							aria-expanded="false" aria-controls="navbar-membership-management">
							<i class="fas fa-users nav-icon text-primary">

							</i>
							<span class="nav-link-text"> {{ trans('cruds.membershipManagement.title') }} </span>

						</a>
						<div class="collapse" id="navbar-membership-management">
							<ul class="nav nav-sm flex-column">
								@can('member_access')
								<li class="nav-item">
									<a href="{{ route("admin.members.index") }}"
										class="nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-user-friends nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.member.title') }}
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route("admin.members.choose.membership-code")  }}"
										class="nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-user-plus nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.member.add_member') }}
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route("admin.members.approve.index")  }}"
										class="nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-user-plus nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.member_approve.title') }}
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route("admin.members.edit.approve.index")  }}"
										class="nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-user-check nav-icon">
											</i>
										</span>
										<span class="sidenav-normal">
											{{ trans('cruds.member_edit_approve.title') }}
										</span>
									</a>
								</li>
								@endcan
							</ul>
						</div>
					</li>
					@endcan
					@can('form_code_access')
					<li class="nav-item">
						<a class="nav-link" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="false"
							aria-controls="navbar-settings">
							<i class="ni ni-settings-gear-65 text-primary">

							</i>
							<span class="nav-link-text"> {{ trans('cruds.settings.title') }} </span>

						</a>
						<div class="collapse" id="navbar-settings">
							<ul class="nav nav-sm flex-column">
								@can('form_code_access')
								<li class="nav-item">
									<a href="{{ route("admin.settings.form-codes.index") }}"
										class="nav-link {{ request()->is('admin/form-codes') || request()->is('admin/form-codes/*') ? 'active' : '' }}">
										<span class="sidenav-mini-icon">
											<i class="fa-fw fas fa-folder-open nav-icon">

											</i>
										</span>
										<span class="sidenav-normal"> {{ trans('cruds.form-codes.title') }} </span>
									</a>
								</li>
								@endcan
							</ul>
						</div>
					</li>
					@endcan
			</div>
		</div>
	</div>
</nav>
@endsection
