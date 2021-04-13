

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
                        <h4 class="card-title">Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name.." id="label-name" name="name" value="{{ old('name', $team->name) }}"/>
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
                        <h4 class="card-title">Instagram link</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" placeholder="instagram.." id="label-name" name="instagram" value="{{ old('instagram', $team->instagram) }}"/>
                                <label for="label-name">Enter link</label>
                                @error('instagram')
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
                        <h4 class="card-title">Facebook link</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" placeholder="facebook.." id="label-name" name="facebook" value="{{ old('facebook', $team->facebook) }}"/>
                                <label for="label-name">Enter link</label>
                                @error('facebook')
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
                        <h4 class="card-title">Twitter link</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('twitter') is-invalid @enderror" placeholder="twitter.." id="label-name" name="twitter" value="{{ old('twitter', $team->twitter) }}"/>
                                <label for="label-name">Enter link</label>
                                @error('twitter')
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
                        <h4 class="card-title">Phone</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="phone.." id="label-name" name="phone" value="{{ old('phone', $team->phone) }}"/>
                                <label for="label-name">Enter Phone</label>
                                @error('phone')
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
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="job_title_id">
                                        @foreach($jobtitle as $job)
                                            <option value="{{$job->id}}">{{$job->job_title}}</option>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Image</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ $team->image_url }}" height="60" alt="" id="output" class="d-block">
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