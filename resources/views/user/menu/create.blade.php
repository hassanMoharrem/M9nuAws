@extends('user.layouts.app')
@section('content')
    <div id="app" class="p-3">
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
@endsection
