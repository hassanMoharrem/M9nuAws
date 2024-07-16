@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <privacy
            privacy_data="{{ route('api.admin.privacy.DataPrivacy') }}"
            create_request="{{ route('api.admin.privacy.AddPrivacy') }}"
            edit_request="{{ route('api.admin.privacy.UpdatePrivacy','') }}"
            delete_request="{{ route('api.admin.privacy.DeletePrivacy','') }}"
            show_data="{{ route('api.admin.privacy.ShowPrivacy','') }}"
            lang="{{ app()->getLocale() }}"
        ></privacy>
    </div>
@endsection
