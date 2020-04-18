@extends('layouts.app',['pageTitle' => __('Role Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('Role') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Role') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __(' Back') }}</button></a>
                        <a href="{{ url('/admin/role/' . $role->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('Edit') }}</button></a>

                        <form method="POST" id="deleteButton{{$role->id}}" action="{{ url('admin/role' . '/' . $role->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$role->id}})"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $role->name }} </td></tr><tr><th> Permission </th><td> {{ $role->permission }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
