@extends('user.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <profile
            :user_data="{{ $user }}"
{{--            :qrCode="{{ $qrCode }}"--}}
            user_data_update="{{ route('api.users.profile.edit') }}"
            lang="{{ app()->getLocale() }}"
        ></profile>
    </div>

@endsection
