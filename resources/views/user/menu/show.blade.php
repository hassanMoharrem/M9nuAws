@extends('user.layouts.app')
@section('content')
    <section>
        <div class="text-center">
            <figure class="text-center pt-2">
                <img src="{{ $user->image }}" width="200" height="200" class="border border-3 border-primary text-end contain p-2 rounded-circle position-relative z-index-9999 bg-white mx-auto" data-aos="zoom-in" data-aos-duration="1500"
                     alt="">
            </figure>
        </div>
        <div class="align-content-center mt-n-80">
            <figure>
                <img src="{{ asset($user->background) }}" class="w-100 cover" height="500px" alt="">
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div data-aos="flip-up" data-aos-duration="1500" class="text-center py-4">
                        <h4 class="text-primary font-bold mt-2 text-uppercase font-45 text-center ">{{ $user->company_name_lang }}</h4>
                        <p class="font-18 text-main">
                            {{ $user->description_lang }}
                        </p>
                        {{--                            <a href="" class="hover-button py-3 text-primary border-primary border px-3 rounded-2"><span>Contact Us <i class="fas fa-link"></i></span></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

    <section class="mt-2">
        @foreach($categoriesWithProducts as $row)
            <div class="mb-3 text-center">
                <h2 class="text-center text-dark font-28 mb-4 after-line-primary position-relative d-inline-block mx-auto">{{ $row->name_lang }}</h2>
                <div class="row justify-content-center">
                    @foreach($row->products as $item)
                        <div class="col-md-6 my-3">
                            <div class="bg-white shadow text-start rounded-10 position-relative mb-4" data-aos="fade-down" data-aos-duration="1500">
                                <div class="position-relative d-inline-block rounded-10 w-40 hover_image">
                                    <div class="position-absolute rounded-10-left  w-100 h-100 overlay-2"></div>
                                    <img src="{{$item->image}}" class="cover d-inline-block  rounded-10-left border-end border-light w-100" alt="" height="190px">
                                </div>
                                <div class="w-60 d-inline-block align-top px-3 py-4 hover_image_60">
                                    <h4 class="h4 text-primary">{{$item->name_lang}}</h4>
                                    <p class="mt-2 mb-2">{{$item->description_lang}}</p>
                                </div>
                                <div class="position-absolute end-0 bottom-0 bg-primary m-2 rounded-pill px-3 py-1 ">
                                    <span class=" mb-0 text-white">{{$item->price}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
    </div>
    <footer class="footer background--dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Home')</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Privacy Policy')</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Terms and Conditions')</a></li>
                        <li><a href="" class="text-white">@lang('messages.Contact Us')</a></li>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <div class="footer-social d-md-none d-block">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled">

                            <li class="pb-0 px-2">
                                <a href="{{ $user->instagram }}" target="_blank">
                                    <i class="fa-brands fa-instagram font-28 text-white"></i>
                                </a>
                            </li>
                            <li class="pb-0 px-2">
                                <a href="{{ $user->whatsapp }}" target="_blank">
                                    <i class="fa-brands fa-whatsapp font-28 text-white"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div>
                        <div class="d-inline-block bg-white p-2 rounded-3">
                            {!! $qrCode !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-md-none d-block">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-3 me-sm-4"><a href="" class="text-white font-12">Home</a></li>
                        <li class="me-3 me-sm-4"><a href="" class="text-white font-12">Privacy Policy</a></li>
                        <li class="me-3 me-sm-4"><a href="" class="text-white font-12">Terms and Conditions</a></li>
                        <li><a href="" class="text-white font-12">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="mt-md-0 mt-4">
                            <p class="mb-2 text-white text-md-start text-center font-12">©2024 {{ config('app.name') }} <span>@lang('messages.All rights reserved.')</span></p>
                        </div>
                        <div class="footer-social d-md-block d-none">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled">

                                <li class="pb-0 px-2">
                                    <a href="{{ $user->instagram }}" target="_blank">
                                        <i class="fa-brands fa-instagram font-20 text-white"></i>
                                    </a>
                                </li>
                                <li class="pb-0 px-2">
                                    <a href="{{ $user->whatsapp }}" target="_blank">
                                        <i class="fa-brands fa-whatsapp font-20 text-white"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
