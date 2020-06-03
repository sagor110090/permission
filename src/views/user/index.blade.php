@extends('layouts.app',['pageTitle' => __('User Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __('User') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __('User List') }}</h6>

        <div class="card-body">

            <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn-sm" title="Add New User">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>
            <form method="GET" action="{{ url('/admin/user') }}" accept-charset="UTF-8"
                class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="feather-16" data-feather="search"></i>
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>created at</th>
                            <th width='150'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ date('d-M-y h:i A', strtotime($item->created_at ))}}</td>
                            <td>
                                <a href="{{ url('/admin/user/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16" data-feather="eye"></i></button></a>
                                <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>

                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/user' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="sweetalertDelete({{$item->id}})"><i class="feather-16" data-feather="trash-2"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection