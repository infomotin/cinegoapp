<div class="sidebar-widget category-widget">
    <div class="widget-title">
        <h4>Menu</h4>
    </div>
    <div class="widget-content">
        <ul class="category-list ">

            <li class="current"> <a href="{{ route('dashboard') }}"><i class="fab fa fa-envelope "></i>
                    Dashboard </a></li>

            <li><a href="{{ route('user.settings') }}"><i class="fa fa-cog" aria-hidden="true"></i>
                    Settings</a></li>
            <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy
                    credits<span class="badge badge-info">( 10 credits)</span></a></li>
            <li><a href="blog-details.html"><i class="fa fa-list-alt" aria-hidden="true"></i></i>
                    Properties </a></li>
            <li><a href="blog-details.html"><i class="fa fa-indent" aria-hidden="true"></i> Add a
                    Property </a></li>
            <li><a href="{{ route('user.change.password') }}"><i class="fa fa-key" aria-hidden="true"></i> Security
                </a></li>
            <li><a href="{{ route('user.logout') }}"><i class="fa fa-chevron-circle-up"
                        aria-hidden="true"></i> Logout </a></li>
        </ul>
    </div>
</div>