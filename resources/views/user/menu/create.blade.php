@extends('user.layouts.app')
@section('content')
    <div id="app" class="p-3 min-vh-60">
        <create_menu
            :user="{{ $user }}"
            data_request="{{ route('api.users.categories.DataCategory') }}"
            create_request="{{ route('api.users.categories.store') }}"
            edit_request="{{ route('api.users.categories.UpdateCategory','') }}"
            delete_request="{{ route('api.users.categories.DeleteCategory','') }}"
            show_data="{{ route('api.users.categories.ShowCategory','') }}"
            data_request_product="{{ route('api.users.products.DataProducts','') }}"
            create_request_product="{{ route('api.users.products.store') }}"
            edit_request_product="{{ route('api.users.products.UpdateProduct','') }}"
            show_data_product="{{ route('api.users.products.ShowProduct','') }}"
            delete_request_product="{{ route('api.users.products.DeleteProduct','') }}"
            lang="{{ app()->getLocale() }}"
        ></create_menu>

    </div>
    <footer class="footer background--dark py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Home')</a></li>
                        <li class="me-2 me-sm-4"><a href="{{ route('privacy.index') }}" class="text-white">@lang('messages.Privacy Policy')</a></li>
                        <li class="me-2 me-sm-4"><a href="{{ route('condition.index') }}" class="text-white">@lang('messages.Terms and Conditions')</a></li>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <div class="footer-social d-md-none d-block">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled">

                            <li class="pb-0 px-2 {{ $user->instagram ? '' : 'd-none' }}" >
                                <a href="{{ $user->instagram }}" target="_blank">
                                    <i class="fa-brands fa-instagram font-45 text-white"></i>
                                </a>
                            </li>
                            <li class="pb-0 px-2 {{ $user->whatsapp ? '' : 'd-none' }}">
                                <a href="{{ $user->whatsapp }}" target="_blank">
                                    <i class="fa-brands fa-whatsapp font-45 text-white"></i>
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
                    <ul class="list-unstyled d-block d-md-flex text-center align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-3 me-md-4 d-inline-block"><a href="" class="text-white">@lang('messages.Home')</a></li>
                        <li class="me-3 me-md-4 d-inline-block"><a href="{{ route('privacy.index') }}" class="text-white">@lang('messages.Privacy Policy')</a></li>
                        <li class="me-3 me-md-4 d-inline-block"><a href="{{ route('condition.index') }}" class="text-white">@lang('messages.Terms and Conditions')</a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="mt-md-0 mt-4">
                            <p class="mb-2 text-white text-md-start text-center font-12">©2024 {{ config('app.name') }} <span>@lang('messages.All rights reserved.')</span></p>
                        </div>
                        <div class="footer-social d-md-block d-none">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled">

                                <li class="pb-0 px-2 {{ $user->instagram ? '' : 'd-none' }}">
                                    <a href="{{ $user->instagram }}" target="_blank" class="">
                                        <i class="fa-brands fa-instagram font-20 text-white"></i>
                                    </a>
                                </li>
                                <li class="pb-0 px-2 {{ $user->whatsapp ? '' : 'd-none' }}">
                                    <a href="{{ $user->whatsapp }}" target="_blank" class="">
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
