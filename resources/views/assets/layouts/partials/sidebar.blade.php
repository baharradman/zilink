<aside id="sidebar" class="sidebar col-md-3">
    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <form action="{{ route('expelore.index', ['category' => request()->category ? request()->category->id : null]) }}"
            method="get">
            <input type="hidden" name="sort" value="{{ request()->sort }}">
            <!-- start sidebar nav-->
            <section class="sidebar-nav">
                <section class="sidebar-nav-item">
                    @include('assets.layouts.partials.categories', ['categories' => $categories])
                </section>
            </section>
            <!--end sidebar nav-->
    </section>
</aside>
