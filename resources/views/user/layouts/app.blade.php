<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ (app()->getLocale() === 'ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="events">
    <meta name="author" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ url('/') }}/logo.png ">
    <meta property="og:url" content="{{ url('/') }}}">
    <meta name="twitter:card" content="{{ config('app.name') }}">
    <meta name="twitter:site" content="{{ config('app.name') }}">
    <meta name="twitter:image" content="{{ url('/') }}/logo.png">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/logo.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
          integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if(app()->getLocale() == 'ar')
        @vite(['resources/js/app.js','resources/sass/app-ar.scss'])
        <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/site/css/style-rtl.css') }}">
    @else
        @vite(['resources/js/app.js','resources/sass/app.scss'])
        <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

    @endif



</head>
<body>
<header id="main-header" class="w-100 {{ request()->is('user/profile') || request()->is('user/menu') || request()->routeIs('menu') ? 'position-relative bg-white shadow-sm' :'position-absolute z-index-999' }}">
<div class="container">
    <div class="row">
        <div class="col-3 my-auto">
            <a href="{{ route('site') }}" class="d-inline-block py-2 py-md-4">
                    <img src="{{ asset('assets/site/images/logo.png') }}" width="100" height="{{request()->is('user/profile') || request()->is('user/menu')|| request()->routeIs('menu') ? '30':'60'}}" class="contain logo-image" alt="">
{{--                    <h2 class="mb-1 text-white">m9nuAws</h2>--}}

            </a>
        </div>
        <div class="col-9 my-auto text-end">
            <ul class="py-2 py-md-4 ps-0 mb-0">
                <li class="d-inline-block pe-3">
                    @if(Auth::check())
                        <div class="nav-link dropdown lang">
                            <a class="btn text-white-muted p-0 m-0 bg-none rounded-10 dropdown-toggle dropdown-toggleUser align-middle" href="#" role="button" id="dropdownMenuLinkUser" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/site/images/user.png') }}" width="35" height="35" class="object-fit-contain rounded-circle border" alt=""><span class="ms-2  {{ request()->is('user/profile') || request()->is('user/menu')|| request()->routeIs('menu') ? 'text-primary':'text-truncate' }} d-inline-block align-middle my-auto" style="max-width: 100px">{{ app()->getLocale() == 'en' ? Auth::user()->f_name : Auth::user()->f_name_ar}}</span>
                            </a>
                            <ul class="dropdown-menu border-0 shadow fade text-start" aria-labelledby="dropdownMenuLinkUser">
                                <li class="px-2 pt-2 pb-2 border-bottom text-muted"><a class="dropdown-item text-muted" href="{{ route('user.profile.index') }}"><h6 class="p-2 bg-primary rounded-circle me-2 d-inline-block"><i class="fas fa-user p-1 text-white"></i></h6>@lang('messages.My Profile')</a></li>
                                <li class="p-2">
                                    <a class="dropdown-item py-2 text-muted" href="{{ route('user.menu.index') }}"><h6 class="mb-0"><i class="fas fa-list font-16 me-2 text-primary"></i>@lang('messages.Menu')</h6></a>
{{--                                    <a class="dropdown-item py-2 text-muted" href="#"><h6 class="mb-0"><i class="fas fa-folder h6 me-2 text-primary"></i>Terms &amp; Conditions</h6></a>--}}
                                    <a class="dropdown-item py-2 text-muted" href="{{ route('user.logout') }}"><h6 class="mb-0"><i class="fas fa-arrow-circle-left font-16 me-2 ms-0 text-primary"></i>@lang('messages.logout')</h6></a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="font-18 text-dark" href="{{ route('user.login') }}">
                            <i class="fa-regular fa-user align-middle text-primary font-16"></i><span
                                class="align-middle font-16 ms-2 {{ request()->routeIs('menu') ? 'text-primary' : 'text-white-muted' }}">@lang('messages.Sign In')</span>
                        </a>
                    @endif
                </li>
                <li class="d-inline-block ps-md-2 ps-2">
                    @if(app()->getLocale() == 'ar')
                        <a class="dropdown-item change-lang rounded-2" href="javascript:void(0)" data-language="en">
                            <h4 class="mb-0 font-14 rounded-2 p-2 {{ request()->is('user/profile') || request()->is('user/menu') || request()->routeIs('menu') ? 'bg-primary text-white' : 'bg-white text-primary' }}">EN</h4>
                            <span class="align-middle"></span>
                        </a>
                    @else
                        <a class="dropdown-item change-lang rounded-2" href="javascript:void(0)" data-language="ar">
                            <h4 class="mb-0 font-14 rounded-2 p-2 {{ request()->is('user/profile') || request()->is('user/menu') || request()->routeIs('menu') ? 'bg-primary text-white' : 'bg-white text-primary' }}">AR</h4>
                            <span class="align-middle"></span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>

</div>
</header>
    @yield('content')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const changeLangLinks = document.querySelectorAll('.change-lang');

        changeLangLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const language = this.getAttribute('data-language');

                fetch('/locale', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        locale: language
                    })
                }).then(function(response) {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Failed to switch language');
                    }
                }).catch(function(error) {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
</body>

</html>
