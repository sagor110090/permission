@extends('layouts.app',['pageTitle' => __('Role Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __('Role') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __('Role List') }}</h6>

        <div class="card-body">

            <a href="{{ url('/admin/role/create') }}" class="btn btn-success btn-sm" title="Add New Role">
                <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}
            </a>
            <form method="GET" action="{{ url('/admin/role') }}" accept-charset="UTF-8"
                class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th width='300'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                            @php
                                $permission = json_decode($item->permission);
                                if ($permission!=null) {
                                    foreach ($permission as $key => $value) {
                                        echo "$value,<br> ";
                                    }
                                }
                            @endphp </td>
                            <td>
                                <a href="{{ url('/admin/role/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"
                                            aria-hidden="true"></i></button></a>
                                <a href="{{ url('/admin/role/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>
                                    </button></a>

                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/role' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="sweetalertDelete({{$item->id}})"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection