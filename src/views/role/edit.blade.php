@extends('layouts.app',['pageTitle' => __('Role Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('Role') }}
    @endslot
@endcomponent

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Role') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        <form method="POST" action="{{ url('/admin/role/' . $role->id) }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('permission::role.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
