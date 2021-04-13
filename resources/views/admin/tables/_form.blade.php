

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
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="description.." id="label-textarea" name="description">{{ old('description', $table->description) }}</textarea>
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
                        <h4 class="card-title">QR Code</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <input type="text" class="form-control @error('qr_code') is-invalid @enderror" placeholder="QR Code.." id="label-name" name="qr_code" value="{{ old('qr_code', $table->qr_code) }}"/>
                                <label for="label-name">Enter QR Code</label>
                                @error('qr_code')
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
                        <h4 class="card-title">Type Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="table_type">
                                        <option value="small_table">Small Table</option>
                                        <option value="medium_table">Medium Table</option>
                                        <option value="big_table">Big Table</option>
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
                        <h4 class="card-title">Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <select class="select2-size-lg form-control" id="large-select" name="status">
                                        <option value="available">Available</option>
                                        <option value="not_available">Not Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    <!-- END: Content-->