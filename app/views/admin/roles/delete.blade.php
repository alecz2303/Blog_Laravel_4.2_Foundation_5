@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

    <!-- Tabs -->
        <dl class="tabs" data-tab>
            <dd class="active"><a href="#general">General</a></dd>
        </dl>
    <!-- ./ tabs -->
    {{-- Delete Post Form --}}
    <form id="deleteForm" method="post" action="@if (isset($role)){{ URL::to('admin/roles/' . $role->id . '/delete') }}@endif" autocomplete="off">
        
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $role->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                Delete Role
                <element class="button secondary close_popup">Cancel</element>
                <button type="submit" class="alert">Delete</button>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>
@stop