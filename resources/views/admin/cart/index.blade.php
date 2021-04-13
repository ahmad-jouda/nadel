@extends('layouts.dashboard')
@section('content')
<div class="app-content content ">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0" style="padding-right: 1rem; border-right: 1px solid #D6DCE1;">Cart</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Cart</a>
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
                        <h4 class="card-title">All Carts</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($carts as $cart)
                                <tr>
                                    <td>
                                        <img src="{{$cart->meal->image_url}}" class="mr-75" height="20" width="20" alt="Angular"  style="border-radius: 50%;height: 30px;width: 30px;"/>
                                    </td>
                                    <td class="text-success">{{$cart->meal->name}}</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{$cart->user->name}}">
                                                <img src="/admin/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $cart->meal->price }}</td>
                                    <td>{{ $cart->quantity}}</td>
                                    <td>{{ $total}}</td>
                                    <td>
                                        <div class="dropdown">
                                        @can('carts.delete')
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                        @endcan
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);" >
                                                    @can('carts.delete')
                                                    <form action="#" class="form-inline" method="post">
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
                                <td colspan="9" class="text-center">No Meals In Cart</td>
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
