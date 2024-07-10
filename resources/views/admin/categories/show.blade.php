@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <product
            sub_id = "{{ $category->id }}"
            product_data="{{ route('api.admin.products.DataProducts',$category->id) }}"
            create_request="{{ route('api.admin.products.AddProduct') }}"
            edit_request="{{ route('api.admin.products.UpdateProduct','') }}"
            delete_request="{{ route('api.admin.products.DeleteProduct','') }}"
            show_data="{{ route('api.admin.products.ShowProduct','') }}"
            lang="{{ app()->getLocale() }}"
        ></product>
    </div>
@endsection
