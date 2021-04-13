
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Main Category Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name.." id="label-name" name="name" value="{{ old('name', $maincategory->name) }}"/>
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="description.." id="label-textarea" name="description">{{ old('description', $maincategory->description) }}</textarea>
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
                        <h4 class="card-title">Image</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ $maincategory->image_url }}" height="60" alt="" id="output" class="d-block">
                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('image') is-invalid @enderror" id="image" name="image" style="margin-top: 5px;">
                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    <!-- END: Content-->