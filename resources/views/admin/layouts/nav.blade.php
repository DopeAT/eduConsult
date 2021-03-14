<!-- Sidebar -->
<ul class="navbar-nav theme-background sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        EduConsultOrg
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('admin.settings.index') }}">--}}
{{--            <i class="fas fa-fw fa-cogs"></i>--}}
{{--            <span>Settings</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmails" aria-expanded="true" aria-controls="collapseEmails">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Emails</span>
        </a>
        <div id="collapseEmails" class="collapse" aria-labelledby="headingEmails" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Email:</h6>
            {{--<a class="collapse-item" href="#">Compose</a>--}}
                <a class="collapse-item" href="{{ route('admin.messages.index') }}">Inbox</a>
            {{--<a class="collapse-item" href="#">Sent</a>--}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.products.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Products</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.services.index') }}">
            <i class="fas fa-fw fa-server"></i>
            <span>Services</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.survey.index') }}">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Survey Settings</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-fw fa-user-astronaut"></i>
            <span>Roles</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.faqs.index') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>FAQs</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.testimonials.index') }}">
            <i class="fas fa-fw fa-comment-dots "></i>
            <span>Testimonials</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.team.index') }}">
            <i class="fas fa-fw fa-users "></i>
            <span>Team</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.partners.index') }}">
            <i class="fas fa-fw fa-school "></i>
            <span>Partners</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pages.index') }}">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Web Pages</span>
        </a>
    </li>

    <!-- Nav Item - Users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users:</h6>
                <a class="collapse-item" href="/admin/users?type=1">Admin</a>
                <a class="collapse-item" href="/admin/users?type=2">Members</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Extras
    </div>

    <!-- Nav Item - Mail Data -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.newsletter.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Mail Data</span>
        </a>
    </li>

    <!-- Nav Item - Discounts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.discounts.index') }}">
            <i class="fas fa-fw fa-tags "></i>
            <span>Discounts</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
