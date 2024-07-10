@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <category
            sub_id = "{{ $user->id }}"
            category_data="{{ route('api.admin.categories.DataCategories',$user->id) }}"
            create_request="{{ route('api.admin.categories.AddCategory') }}"
            edit_request="{{ route('api.admin.categories.UpdateCategory','') }}"
            delete_request="{{ route('api.admin.categories.DeleteCategory','') }}"
            show_data="{{ route('api.admin.categories.ShowCategory','') }}"
            show_sub="{{ route('admin.category.show','') }}"
            lang="{{ app()->getLocale() }}"
        ></category>
    </div>
@endsection
