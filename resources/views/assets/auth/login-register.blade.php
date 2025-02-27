@extends('assets.layouts.master-simple')

@section('content')
<section class=" vh-100 d-flex justify-content-center align-items-center pb-5">
    <form action="{{ route('auth.login-register') }}" method="post">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="{{ asset('admin-assets/images/logo-zilink.svg') }}" alt="">
            </section>
            <section class="login-title">ورود / ثبت نام</section>
            <section class="login-info"> پست الکترونیک خود را وارد کنید</section>
            <section class="login-input-text">
                <input type="text" name="id" value="{{ old('id') }}">
                @error('id')
                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </section>
            <section class="login-btn d-grid g-2"><button class="btn btn-primary">ورود به زیلینک</button></section>
            <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>
        </section>
    </form>
</section>
@endsection