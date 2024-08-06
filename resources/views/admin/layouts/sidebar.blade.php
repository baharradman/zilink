<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{route('admin.home')}}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>محتوا</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{route('admin.shop.index')}}"> فروشگاه </a>
                </section>

                @if(Auth::check() && Auth::user()->email==="baharradman4748@gmail.com")
                <section class="sidebar-dropdown">
                    <a href="{{route('admin.category.index')}}"> دسته بندی</a>
                </section>
                @endif
                <section class="sidebar-dropdown">
                    <a href="{{route('admin.product.index')}}"> محصولات </a>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{route('admin.link.index')}}"> لینک ها </a>
                </section>
            </section>
            <section class="sidebar-part-title">کاربران</section>
            <a href="{{ route('admin.user.admin-user.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران ادمین</span>
            </a>
            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سطوح دسترسی</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>

                <section class="sidebar-dropdown">
                    <a href="{{route('admin.user.role.index')}}"> مدیریت نقش ها </a>
                    <a href="{{route('admin.user.permission.index')}}"> مدیریت دسترسی ها </a>
                </section>
            </section>
        </section>
    </section>
</aside>