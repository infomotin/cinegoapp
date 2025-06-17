@php
    $id = Auth::user()->id;
    $status = DB::table('users')->where('id', $id)->value('status');
@endphp
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">
            Cine<span>Go <span>App</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @if ($status == 'active')
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="dashboard.html" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Properties</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Property</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.property.index') }}" class="nav-link">All Properties</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.property.create') }}" class="nav-link">Add Property</a>
                            </li>

                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Package</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.buy.package') }}" class="nav-link">Buy Package</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.property.create') }}" class="nav-link">Add Property</a>
                            </li>

                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Package history</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('package.history') }}" class="nav-link">Package Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.message.report') }}" class="nav-link">Message Report</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('agent.message.index') }}" class="nav-link">Message inbox </a>
                            </li>

                        </ul>
                    </div>

                </li>


            </ul>
        </div>
    @else
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="dashboard.html" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="fs-4" style="text-align: center">Agent Account is not active, please contact admin.</p>
            <a href="{{ route('agent.logout') }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
            </a>
        </div>
    @endif

</nav>
