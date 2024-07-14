<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="events">
    <meta name="author" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ url('/') }}/logo.png">
    <meta property="og:url" content="http://m9nuAws">
    <meta name="twitter:card" content="{{ config('app.name') }}">
    <meta name="twitter:site" content="{{ config('app.name') }}">
    <meta name="twitter:image" content="{{ url('/') }}/logo.png">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/logo.png') }}" />
    @vite(['resources/js/app.js','resources/sass/app.scss'])
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
    <!--        <link rel="stylesheet" href="assets/css/style-rtl.css">-->
</head>
<body>

    <div class="w-100 overflow-hidden">
        <main>
            <div class="row">
                <div class="col-md-7">
                    <figure class="mb-0 position-relative">
                        <div class="bg-overlay w-100 h-100 position-absolute top-0 start-0"></div>
                        <img src="{{ asset('assets/site/images/auth-bg.jpg') }}" class="w-100 cover h-100vh" alt="">
                    </figure>
                </div>
                <div class="col-md-5 my-md-auto position-absolute-sm">
                    <div class="p-5">
                        <div class="text-center">
                            <a href="" class="">
                                <img src="{{ asset('assets/site/images/logo.png') }}" alt="" width="150" height="60" class="contain logo">
                            </a>
                            <h5 class="mb-0 mt-3 text-primary">@lang('messages.Sign In')</h5>
                            <p class="text-muted mt-2">@lang('messages.Sign in to start your session')</p>
                        </div>
                        <form class="mt-4" action="{{ route('user.login.store') }}" method="POST">
                            @csrf
                            @error('Error')
                            <div class="text-danger font-12 my-2 text-start">{{ $message }}</div>
                            @enderror
                            <div class="mb-4 form-group">
                                <div class="form-floating">
                                    <input type="email" class="form-control ps-5 font-12" id="floatingInputGroup1 " value="{{ old('email') }}" name="email"  placeholder="@lang('messages.Email')">
                                    <label for="floatingInputGroup1" class="text-muted">@lang('messages.Email')</label>
                                    <div class="form-floating-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    @error('email')
                                    <div class="text-danger font-12 mb-2" style="font-size: 12px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 form-group">
                                <div class="form-floating">
                                    <input type="password" class="form-control pe-5 font-12" id="input-password" name="password" placeholder="@lang('messages.Password')">
                                    <label for="input-password" class="text-muted">@lang('messages.Password')</label>
                                    <div class="form-floating-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    </div>
                                    @error('password')
                                    <div class="text-danger font-12 mb-2" style="font-size: 12px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-check font-size-15">
                                        <input class="form-check-input" type="checkbox" id="remember-check" name="remember" value="1">
                                        <label class="form-check-label font-size-13 text-muted" for="remember-check">
                                            <span>@lang('messages.Remember Me')</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">@lang('messages.Sign In')</button>
                            </div>
                        </form>
                        <div class="mt-5 text-center">
                            <p class="text-muted mb-4"><a href="" class="text-primary fw-medium">@lang('messages.I forgot my password')</a> </p>
                            <p class="text-muted mb-4">
                                © 2024 @lang('messages.Copyright') | {{ config('app.name') }} @lang('messages.All rights reserved.')
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
