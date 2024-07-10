@extends('admin.layouts.app')
@section('content')
    <div id="app" class="p-3">
        <advantage
            advantage_data="{{ route('api.admin.advantage.DataAdvantage') }}"
            create_request="{{ route('api.admin.advantage.AddAdvantage') }}"
            edit_request="{{ route('api.admin.advantage.UpdateAdvantage','') }}"
            delete_request="{{ route('api.admin.advantage.DeleteAdvantage','') }}"
            show_data="{{ route('api.admin.advantage.ShowAdvantage','') }}"
            lang="{{ app()->getLocale() }}"
        ></advantage>
    </div>
@endsection
