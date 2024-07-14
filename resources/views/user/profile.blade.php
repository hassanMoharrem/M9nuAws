@extends('user.layouts.app')
@section('content')

    <div id="app" class="p-3">
        <profile
            :user_data="{{ $user }}"
            user_data_update="{{ route('api.users.profile.edit') }}"
            lang="{{ app()->getLocale() }}"
        ></profile>
    </div>
    <footer class="footer background--dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-md-5 pb-md-5 mb-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Home')</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Privacy Policy')</a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white">@lang('messages.Terms and Conditions')</a></li>
                        <li><a href="" class="text-white">@lang('messages.Contact Us')</a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="footer-social order-md-2">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled">

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
                            <p class="mb-2 text-white text-md-start text-center">©2024 {{ config('app.name') }} <span>@lang('messages.All rights reserved.')</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection
