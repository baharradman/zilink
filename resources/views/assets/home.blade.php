@extends('assets.layouts.master-one-col')


@section('content')

<!-- start slideshow -->
<section class="container-xxl my-4">
    <section class="row">
        <section class="col-md-8 pe-1">
            <section id="slideshow" class="owl-carousel owl-theme">
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/1.jpg" alt=""></a></section>
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/2.jpg" alt=""></a></section>
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/3.jpg" alt=""></a></section>
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/4.jpg" alt=""></a></section>
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/5.jpg" alt=""></a></section>
                <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img class="w-100 rounded-2 d-block h-auto" src="assets/images/slideshow/6.gif" alt=""></a></section>
            </section>
        </section>
        <section class="col-md-4 ps-1">
            <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2" src="assets/images/slideshow/20.jpg" alt=""></a></section>
            <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2" src="assets/images/slideshow/25.jpg" alt=""></a></section>
        </section>
    </section>
</section>
<!-- end slideshow -->


<!-- start product lazy load -->
<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>نمونه فروشگاه ها</span>
                            </h2>
                            <section class="content-header-link">
                                <a href="#">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($shops as $shop )
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <a class="product-link" href="#">
                                            <section class="product-name">
                                                <h1>{{$shop->title}}</h1>
                                            </section>
                                            <section class="product-image">
                                                <img class="" src="{{asset($shop->profile_image)}}" alt="">
                                            </section>
                                            <section class="product-colors"></section>
                                        </a>
                                    </section>
                                </section>
                            </section>

                            @endforeach

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end product lazy load -->



<!-- start ads section -->
<section class="mb-3">
    <section class="container-xxl">
        <!-- two column-->
        <section class="row py-4">
            <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/two-col-1.jpg" alt=""></section>
            <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/two-col-2.jpg" alt=""></section>
        </section>

    </section>
</section>
<!-- end ads section -->


<!-- start product lazy load -->
<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>دسته بندی های زیلینک</span>
                            </h2>
                            <section class="content-header-link">
                                <a href="#">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">
                            @foreach ($categories as $category )
                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">
                                        <a class="product-link" href="#">
                                            <section class="product-name">
                                                <h1>{{$category->name}}</h1>
                                            </section>
                                            <section class="product-image">
                                                <img class="" src="{{asset($category->image)}}" alt="">
                                            </section>
                                            <section class="product-colors"></section>
                                        </a>
                                    </section>
                                </section>
                            </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end product lazy load -->



<!-- start ads section -->
<section class="mb-3">
    <section class="container-xxl">
        <!-- one column -->
        <section class="row py-4">
            <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/one-col-1.jpg" alt=""></section>
        </section>

    </section>
</section>
<!-- end ads section -->


<!-- start brand part-->
<section class="brand-part mb-4 py-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex align-items-center">
                        <h2 class="content-header-title">
                            <span>برندهای ویژه</span>
                        </h2>
                    </section>
                </section>
                <!-- start vontent header -->
                <section class="brands-wrapper py-4">
                    <section class="brands dark-owl-nav owl-carousel owl-theme">
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/huawei.jpg" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/adata.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/casio.jpg" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/gplus.jpg" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/logitech.jpg" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/nokia.jpg" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/pakshoma.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/panasonic.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/parskhazar.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/samsung.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/snowa.png" alt=""></a>
                            </section>
                        </section>
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="assets/images/brand/xvision.png" alt=""></a>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end brand part-->

@endsection