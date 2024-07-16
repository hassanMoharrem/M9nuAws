@extends('user.layouts.app')
@section('content')
    <section>
       <div class="container min-vh-100-edit p-5">
           @if($privacy)
               {!! $privacy !!}
           @else
               <span class="text-primary font-28">No Privacy Policy</span>
           @endif
       </div>
    </section>
    <footer class="footer background--dark py-4">
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
                            @foreach($social as $row)
                                @if($row->name ==='instagram')
                                    <li class="pb-0 px-2">
                                        <a href="{{$row->link}}" target="_blank" class="">
                                            <i class="fa-brands fa-instagram font-45 text-white"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($row->name ==='whatsapp')
                                    <li class="pb-0 px-2">
                                        <a href="{{$row->link}}" target="_blank" class="">
                                            <i class="fa-brands fa-whatsapp font-45 text-white"></i>
                                        </a>
                                    </li>
                                @endif


                            @endforeach
                        </ul>
                    </div>
                    {{--                    <div>--}}
                    {{--                        <div class="d-inline-block bg-white p-2 rounded-3">--}}
                    {{--                            {!! $qrCode !!}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
                                @foreach($social as $row)
                                    @if($row->name ==='instagram')
                                        <li class="pb-0 px-2">
                                            <a href="{{$row->link}}" target="_blank" class="">
                                                <i class="fa-brands fa-instagram font-20 text-white"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($row->name ==='whatsapp')
                                        <li class="pb-0 px-2">
                                            <a href="{{$row->link}}" target="_blank" class="">
                                                <i class="fa-brands fa-whatsapp font-20 text-white"></i>
                                            </a>
                                        </li>
                                    @endif


                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
