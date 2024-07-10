@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <step
            step_data="{{ route('api.admin.step.DataStep') }}"
            create_request="{{ route('api.admin.step.AddStep') }}"
            edit_request="{{ route('api.admin.step.UpdateStep','') }}"
            delete_request="{{ route('api.admin.step.DeleteStep','') }}"
            show_data="{{ route('api.admin.step.ShowStep','') }}"
            lang="{{ app()->getLocale() }}"
        ></step>
    </div>
@endsection
