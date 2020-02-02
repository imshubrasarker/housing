@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Add new Reference</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('reference.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 form-label">Name <label class="text-danger">*</label></label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('name') }}" class="form-control" id="name" required name="name" placeholder="Member Name">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Father Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('father_name') }}" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
                                    </div>
                                    @if ($errors->has('father_name'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('father_name') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Mother Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('mother_name') }}" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name">
                                    </div>
                                    @if ($errors->has('mother_name'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('mother_name') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Date of Birth</label>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            <input type="date" class="form-control pull-right" id="datepicker" name="dob">
                                        </div>
                                    </div>
                                    @if ($errors->has('dob'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">National ID Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('nid') }}" class="form-control" name="nid" id="nid" placeholder="National ID Number">
                                    </div>
                                    @if ($errors->has('nid'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('nid') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Profession</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('profession') }}" class="form-control" name="profession" id="profession" placeholder="Profession">
                                    </div>
                                    @if ($errors->has('profession'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('profession') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Religion</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="religion" name="religion">
                                            <option value="muslim">Muslim</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddho">Buddho</option>
                                            <option value="kristan">Kristan</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('religion'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('religion') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Present Address</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" value="{{ old('present_address') }}" class="form-control" name="present_address" id="present_address" placeholder="Present Address"> </textarea>
                                    </div>
                                    @if ($errors->has('present_address'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('present_address') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Permanent Address</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" value="{{ old('permanent_address') }}" class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address"> </textarea>
                                    </div>
                                    @if ($errors->has('permanent_address'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('permanent_address') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('mobile') }}" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 form-label">Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="inputFile" class="form-control" name="image">
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
                                         </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Submit</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
