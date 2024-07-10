@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <default_user
            users_data="{{ route('api.admin.users.DataUsers') }}"
            create_request="{{ route('api.admin.users.AddUser') }}"
            edit_request="{{ route('api.admin.users.UpdateUser','') }}"
            delete_request="{{ route('api.admin.users.DeleteUser','') }}"
            show_data="{{ route('api.admin.users.ShowUser','') }}"
            show_sub="{{ route('admin.user.show','') }}"
            lang="{{ app()->getLocale() }}"
        ></default_user>
    </div>
@endsection
