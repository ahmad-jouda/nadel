@extends('layouts.dashboard')

@section('content')
<div class="app-content content ">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0" style="padding-right: 1rem; border-right: 1px solid #D6DCE1;">Main Category</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Main Category</a>
                            </li>
                            <li class="breadcrumb-item active">Create
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('admin.maincategories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.maincategories._form')
        </form>
</div>
       
@endsection
