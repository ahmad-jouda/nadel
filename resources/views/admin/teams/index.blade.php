@extends('layouts.dashboard')
@section('content')
<div class="app-content content ">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0" style="padding-right: 1rem; border-right: 1px solid #D6DCE1;">Team</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Team</a>
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
                        <h4 class="card-title">All Team</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Instagram</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Phone</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($teams as $team)
                                <tr>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{$team->name}}">
                                                <img src="{{$team->image_url}}" alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-success"><a href="#">{{$team->name}}</td>
                                    <td class="text-success"><a href="#">{{$team->instagram}}</td>
                                    <td class="text-success"><a href="#">{{$team->facebook}}</td>
                                    <td class="text-success"><a href="#">{{$team->twitter}}</td>
                                    <td class="text-success"><a href="#">{{$team->phone}}</td>
                                    <td class="text-success"><a href="#">{{$team->jobtitle->job_title}}</td>
                                    <td>
                                        <div class="dropdown">
                                        @can(['teams.edit', 'teams.delete'])
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                        @endcan
                                            <div class="dropdown-menu">
                                            @can('teams.edit')
                                                <a class="dropdown-item" href="{{route('admin.teams.edit',[$team->id])}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                            @endcan   
                                                <a class="dropdown-item" href="javascript:void(0);" >
                                                @can('teams.delete')
                                                    <form action="/admin/teams/{{$team->id}}" class="form-inline" method="post">
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
                                <td colspan="9" class="text-center">No Teams</td>
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
