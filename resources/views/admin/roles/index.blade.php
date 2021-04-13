@extends('layouts.dashboard')
@section('content')
<div class="app-content content ">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0" style="padding-right: 1rem; border-right: 1px solid #D6DCE1;">Roles</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Roles</a>
                        </li>
                        <li class="breadcrumb-item active">View
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<div class="content-body">
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Roles</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$role->id}}</td>
                                    <td class="text-success">{{$role->name}}</td>
                                    <td>{{ $role->created_at->format('l, F d, Y h:i:s A') }}</td>
                                    <td>{{ $role->updated_at->format('l, F d, Y h:i:s A') }}</td>
                                    <td>
                                        <div class="dropdown">
                                        @can(['roles.edit', 'roles.delete'])
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                        @endcan
                                            <div class="dropdown-menu">
                                                @can('roles.edit')
                                                <a class="dropdown-item" href="{{route('admin.roles.edit',[$role->id])}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                @endcan
                                                <a class="dropdown-item" href="javascript:void(0);" >
                                                @can('roles.delete')
                                                    <form action="{{route('admin.roles.destroy',[$role->id])}}" class="form-inline" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i data-feather="trash" class="mr-50" ></i>
                                                    <span><button  onclick="return  confirm('Do you want to delete Y/N')" type="submit" style="background: none;border: none;color: #b4b7bd;" >Delete</button></span>
                                                    </form>
                                                @endcan
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No Roles</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
</div>
@endsection