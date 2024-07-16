@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <social
            social_data="{{ route('api.admin.social.DataSocial') }}"
            create_request="{{ route('api.admin.social.AddSocial') }}"
            edit_request="{{ route('api.admin.social.UpdateSocial','') }}"
            delete_request="{{ route('api.admin.social.DeleteSocial','') }}"
            show_data="{{ route('api.admin.social.ShowSocial','') }}"
            lang="{{ app()->getLocale() }}"
        ></social>
    </div>
@endsection
