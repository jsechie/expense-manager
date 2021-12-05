<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <hr>
            @can('expense_category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('cruds.expenseCategory.title') }}
                    </a>
                </li>
            @endcan
            @can('income_category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('cruds.incomeCategory.title') }}
                    </a>
                </li>
            @endcan
            @can('expense_access')
                <li class="nav-item">
                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-arrow-circle-right nav-icon">

                        </i>
                        {{ trans('cruds.expense.title') }}
                    </a>
                </li>
            @endcan
            @can('income_access')
                <li class="nav-item">
                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-arrow-circle-right nav-icon">

                        </i>
                        {{ trans('cruds.income.title') }}
                    </a>
                </li>
            @endcan

            @can('expense_report_access')
                <li class="nav-item">
                    <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-chart-line nav-icon">

                        </i>
                        {{ trans('cruds.expenseReport.title') }}
                    </a>
                </li>
            @endcan
            
            @can('petty_cash_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-calculator nav-icon">

                        </i>
                        {{ __('Petty Cash') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('petty_cash_create')
                            <li class="nav-item">
                                <a href="{{ route('admin.petty-cash.index') }}" class="text-warning nav-link {{ request()->is('admin/petty-cash/') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-book nav-icon">

                                    </i>
                                    {{ __('Make A Request') }}
                                </a>
                            </li>
                        @endcan
                        @can('petty_cash_approve')
                            <li class="nav-item">
                                <a href="{{ route('admin.petty-cash.processApprove') }}" class="nav-link {{ request()->is('admin/petty-cash/process/approve') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ __('Approve Request') }}
                                </a>
                            </li>
                        @endcan
                        @can('petty_cash_receive')
                            <li class="nav-item">
                                <a href="{{ route('admin.petty-cash.processReceive') }}" class="nav-link {{ request()->is('admin/petty-cash/process/receive') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ __('Receive Request') }}
                                </a>
                            </li>
                        @endcan
                        
                        @can('petty_cash_reimburse')
                            <li class="nav-item">
                                <a href="{{ route('admin.petty-cash.reimburse') }}" class="nav-link {{ request()->is('admin/petty-cash/process/reimburse') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ __('Reimburse') }}
                                </a>
                            </li>
                        @endcan
                        @can('petty_cash_archive_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.petty-cash.archive') }}" class="nav-link {{ request()->is('admin/petty-cash/process/archive') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ __('Archived Requests') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <hr>
            <li class="nav-item">
                <a href="{{ route('admin.profile.index') }}" class="nav-link {{ request()->is('admin/profile') }}">
                    <i class="fa-fw fas fa-wrench nav-icon">

                    </i>
                    {{ __('Profile Settings') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>