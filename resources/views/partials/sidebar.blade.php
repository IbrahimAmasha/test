<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (auth()->user()->hasPermission('manage_users'))
        <li class="nav-item nav-category">@lang('messages.main')</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.management') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">@lang('messages.users')</span>
            </a>
        </li>
        @endif

        @if (auth()->user()->hasPermission('manage_roles'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.role.management') }}">
                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                    <span class="menu-title">@lang('messages.roles')</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->hasPermission('manage_permissions'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.permission.management') }}">
                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                    <span class="menu-title">@lang('messages.permissions')</span>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermission('add_course'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.add.course') }}">
                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                    <span class="menu-title">@lang('messages.Add a course')</span>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermission('enroll_in_courses'))
        <li class="nav-item nav-item-margin">
            <a class="nav-link" href="{{ route('student.enroll.in.course') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">@lang('Courses')</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('student.courses') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">@lang('My Courses')</span>
            </a>
        </li>

        @endif

        @if (auth()->user()->hasPermission('view_own_courses'))
        <li class="nav-item nav-item-margin">
            <a class="nav-link" href="{{ route('trainer.courses') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">@lang('My courses')</span>
            </a>
        </li>
    @endif

    </ul>
</nav>
