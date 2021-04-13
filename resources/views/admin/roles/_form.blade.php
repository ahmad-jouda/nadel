

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
                        <h4 class="card-title">Role Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name.." id="label-name" name="name" value="{{ old('name', $role->name) }}"/>
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
                        <h4 class="card-title">Permissions</h4>
                    </div>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                        @foreach(config('permissions') as $code => $label)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="permissions[]" value="{{$code}}" @if(in_array($code, $role_permissions)) checked @endif/>
                                <label class="form-check-label" for="inlineCheckbox1">{{$label}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    <!-- END: Content-->