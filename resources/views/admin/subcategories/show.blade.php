@extends('layouts.dashboard')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-12 col-lg-8 col-md-7">
                            <div class="card user-card" style="min-height: 300px; padding:20px;padding-top:50px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                <div class="col-lg-6">
                                                    <img class="img-fluid rounded" style="height: 150px;width: 100%;" src="{{$subcategory->image_url}}" height="104" width="104" alt="User avatar" />
                                                </div>    
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{$subcategory->name}}</h4>
                                                            <span class="card-text">eleanor.aguilar@gmail.com</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <a href="{{route('admin.subcategories.edit',[$subcategory->id])}}" class="btn btn-primary">Edit</a>
                                                            <form action="/admin/subcategories/{{$subcategory->id}}" class="form-inline" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-danger ml-1" onclick="return  confirm('Do you want to delete Y/N')">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info mb-1">
                                                <h4 class="mb-0">Description</h4>
                                                <p class="card-text" style="text-align: justify;">{{$subcategory->description}}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card Ends-->
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    @endsection