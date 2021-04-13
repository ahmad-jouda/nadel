@extends('layouts.dashboard')
@section('content')
<div class="app-content content ">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0" style="padding-right: 1rem; border-right: 1px solid #D6DCE1;">Meal</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Meal</a>
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
                        <h4 class="card-title">All Meals</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Price</th>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Special Meal</th>
                                    <th>Offer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($meals as $meal)
                                <tr>
                                    <td>
                                        <img src="{{$meal->image_url}}" class="mr-75" height="20" width="20" alt="Angular"  style="border-radius: 50%;height: 30px;width: 30px;"/>
                                    </td>
                                    <td class="text-success"><a href="{{ route('admin.meals.show', $meal->id) }}">{{$meal->name}}</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{$meal->user->name}}">
                                                <img src="/admin/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $meal->price }}</td>
                                    <td><a href="{{ route('admin.maincategories.show', $meal->main_category_id) }}">{{$meal->maincategory->name}}</td>
                                    <td><a href="{{ route('admin.subcategories.show', $meal->sub_category_id) }}">{{$meal->subcategory->name}}</td>
                                    <td><span class="badge badge-pill badge-light-primary mr-1">{{ $meal->offer }}</span></td>
                                    <td><span class="badge badge-pill badge-light-primary mr-1">{{ $meal->special_meal }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                        @can(['meals.edit', 'jobs.delete'])
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                        @endcan
                                            <div class="dropdown-menu">
                                                @can('meals.edit')
                                                <a class="dropdown-item" href="{{route('admin.meals.edit',[$meal->id])}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                @endcan
                                                <a class="dropdown-item" href="javascript:void(0);" >
                                                    @can('meals.delete')
                                                    <form action="/admin/meals/{{$meal->id}}" class="form-inline" method="post">
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
                                <td colspan="9" class="text-center">No Categories</td>
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
