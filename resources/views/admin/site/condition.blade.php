@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <condition
            condition_data="{{ route('api.admin.condition.DataCondition') }}"
            create_request="{{ route('api.admin.condition.AddCondition') }}"
            edit_request="{{ route('api.admin.condition.UpdateCondition','') }}"
            delete_request="{{ route('api.admin.condition.DeleteCondition','') }}"
            show_data="{{ route('api.admin.condition.ShowCondition','') }}"
            lang="{{ app()->getLocale() }}"
        ></condition>
    </div>
@endsection
