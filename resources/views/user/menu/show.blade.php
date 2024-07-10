@extends('user.layouts.app')
@section('content')
    <section>
        <div class="position-relative " style='background-image: url({{$user->background}}) ; background-repeat: no-repeat ; background-size: cover ; background-position: center'>
            <div class="container">
                <div class="row align-items-center h-100vh h-100vh-sm">
                    <div class="col-md-6">
                        <div data-aos="flip-up" data-aos-duration="1500" class="pt-5 pt-md-0 mt-md-0">
                            <h4 class="text-primary font-bold mt-3 mb-3 text-uppercase font-45">{{ $user->company_name_lang }}</h4>
                            <p class="font-18 text-sub mb-4 pb-2">
                                {{ $user->description_lang }}
                            </p>
                            <a href="" class="hover-button py-3 text-primary border-primary border px-3 rounded-2"><span>Contact Us <i class="fas fa-link"></i></span></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <figure class="text-end">
                            <img src="{{ $user->image }}" width="100%" height="400" class="text-end contain" data-aos="zoom-in" data-aos-duration="1500"
                                 alt="">
                        </figure>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <div class="container">

    <section class="mt-4">
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
                                    <span class=" mb-0 text-white">Price : {{$item->price}}$</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
    </div>
    <footer class="footer background--dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-md-4 pb-md-2 mb-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white">Home</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">Privacy Policy</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">Terms and Conditions</a></li>
                        <li><a href="" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <div>
                        <div class="d-inline-block bg-white p-2 rounded-3">
                            {!! $qrCode !!}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="footer-social order-md-2">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled mt-2">

                                <li class="pb-0 px-2">
                                    <a href="" target="_blank">
                                        <i class="fa-brands fa-instagram font-20 text-white"></i>
                                    </a>
                                </li>
                                <li class="pb-0 px-2">
                                    <a href="" target="_blank">
                                        <i class="fa-brands fa-whatsapp font-20 text-white"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="mt-md-0 mt-4">
                            <p class="mb-2 text-white text-md-start text-center">©2024 asdasd <span>All rights reserved.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
