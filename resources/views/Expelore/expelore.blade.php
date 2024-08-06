@extends('assets.layouts.master-two-col')
@section('content')
<!-- start body -->
<section class="">
    <section id="main-body-two-col" class="container-xxl body-container">
        <section class="row">
            @include('assets.layouts.partials.sidebar')
            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                    <section class="main-product-wrapper row my-4">
                        @forelse($shops as $shop)
                        <section class="col-md-3 p-0">
                            <section class="product">
                                <a class="product-link" href="{{route('expelore.shop',$shop->id)}}">
                                    <div class="card card-custom" style="box-sizing:border-box">
                                        <div class="card-header d-flex flex-column align-items-center">
                                            <h6 class="mt-3">{{$shop->title }}</h6>
                                            <img src="{{asset($shop->profile_image)}}" alt="عکس پروفایل" class="profile-img rounded-circle" style="height: 40px; width:40px">
                                        </div>
                                        <div class="card-body p-0 ">
                                            <h6 class="card-title mt-2" style="text-align: center;">گالری محصولات</h6>
                                            <div class="row ps-2">
                                                @forelse($shop->product as $product)
                                                <div class="col-md-3">
                                                    <img src="{{ url($product->image) }}" alt="{{ $product->name }} " style="height:50px; width: 50px;">
                                                </div>
                                                @empty
                                                <p>ایتمی یافت نشد</p>

                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="links m-2 ">
                                            <a href="#" class="btn btn-primary">لینک ۱</a>
                                        </div>
                                        @if($shop->user->mobile)
                                        <div class="card-footer text-center ">
                                            <p class="">شماره تماس: {{$shop->user->mobile}}</p>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
                                </a>
                            </section>
                        </section>
                        @empty
                        <h1 class="text-danger">محصولی یافت نشد</h1>
                        @endforelse
                    </section>
                </section>
            </main>
        </section>
    </section>
</section>
<!-- end body -->
@endsection

@section('script')

@endsection