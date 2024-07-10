@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <slider
            slider_data="{{ route('api.admin.slider.DataSlider') }}"
            create_request="{{ route('api.admin.slider.AddSlider') }}"
            edit_request="{{ route('api.admin.slider.UpdateSlider','') }}"
            delete_request="{{ route('api.admin.slider.DeleteSlider','') }}"
            show_data="{{ route('api.admin.slider.ShowSlider','') }}"
            lang="{{ app()->getLocale() }}"
        ></slider>
    </div>
@endsection
