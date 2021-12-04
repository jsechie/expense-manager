<!-- deleted from menu file 
this is for permissions -->
@can('permission_access')
    <li class="nav-item">
        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
            <i class="fa-fw fas fa-unlock-alt nav-icon">

            </i>
            {{ trans('cruds.permission.title') }}
        </a>
    </li>
@endcan
<!-- end of permission -->