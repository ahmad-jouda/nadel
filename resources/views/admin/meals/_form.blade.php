
<!-- BEGIN: Content-->

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Main Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="main_category_id">
                                    @foreach($maincategory as $mcategory)
                                        <option value="{{$mcategory->id}}">{{$mcategory->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sub Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="sub_category_id">
                                    @foreach($subcategory as $scategory)
                                        <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offer</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="offer">
                                        <option value="not_active">Not Active</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Special Meal</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="special_meal">
                                        <option value="Not Active">Not Active</option>
                                        <option value="Active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Meal Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name.." id="label-name" name="name" value="{{ old('name', $meal->name) }}"/>
                                <label for="label-name">Enter name</label>
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="description.." id="label-textarea" name="description">{{ old('description', $meal->description) }}</textarea>
                                    <label for="label-textarea">Enter description</label>
                                    @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Price</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="price.." value="{{ old('price', $meal->price) }}" id="price" name="price">
                                <label for="label-name">Enter Price</label>
                                @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sale Price</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="number" class="form-control @error('sale_price') is-invalid @enderror" placeholder="sale price.." value="{{ old('sale_price', $meal->sale_price) }}" id="sale_price" name="sale_price">
                                <label for="label-name">Enter Sale Price</label>
                                @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Calories</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('calories') is-invalid @enderror" placeholder="calories.." id="label-name" name="calories" value="{{ old('calories', $meal->calories) }}"/>
                                <label for="label-name">Enter name</label>
                                @error('calories')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Image</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ $meal->image_url }}" height="60" alt="" id="output" class="d-block">
                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('image') is-invalid @enderror" id="image" name="image" style="margin-top: 5px;">
                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tags</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" placeholder="tags.." id="label-name" name="tags" value="{{ old('tags', $meal_tags) }}"/>
                                <label for="label-name">Enter tags</label>
                                @error('tags')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    <!-- END: Content-->