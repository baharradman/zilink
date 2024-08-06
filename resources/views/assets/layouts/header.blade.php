<!-- start header -->
<header class="header mb-4">


    <!-- start top-header logo, searchbox and cart -->
    <section class="top-header">
        <section class="container-xxl ">
            <section class="d-flex justify-content-between align-items-center py-3">
                <section class=""><a class="text-decoration-none" href="index.html"><img src="{{asset('admin-assets/images/logo-zilink.svg')}}" alt="logo"></a></section>
                <section>
                    @auth
                    <section class="d-inline px-3">
                        <button class="btn btn-link text-decoration-none text-dark dropdown-toggle profile-button" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </button>
                        <section class="dropdown-menu dropdown-menu-end custom-drop-down" aria-labelledby="dropdownMenuButton1">
                           
                            <section><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fa fa-sign-out-alt"></i>پروفایل کاربر</a></section>
                            <section>
                                <hr class="dropdown-divider">
                            </section>
                            <section><a class="dropdown-item" href="{{ route('auth.logout') }}"><i class="fa fa-sign-out-alt"></i>خروج</a></section>

                        </section>
                    </section>

                    @endauth


                    @guest
                    <a href="{{ route('auth.login-register-form') }}" class="btn btn-link text-decoration-none text-dark profile-button">
                        <i class="fa fa-user-lock"></i>
                    </a>
                    @endguest
                    <a class="btn btn-primary" href="{{ route('admin.home') }}" role="button">داشبورد</a>
                    <a class="btn btn-primary" href="{{ route('expelore.index') }}" role="button">اکسپلور</a>
                </section>
            </section>
        </section>
    </section>
    <!-- end top-header logo, searchbox and cart -->

</header>
<!-- end header -->