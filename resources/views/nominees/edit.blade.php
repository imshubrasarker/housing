@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Edit Nominee</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.nominees.update', $nominee) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="name" class="col-sm-10 col-form-label">Nominee Name <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $nominee->name }}" class="form-control" id="name" required name="name" placeholder="Member Name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="hus_father" class="col-sm-12 col-form-label">Father/Husband <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $nominee->hus_father }}" id="hus_father" required name="hus_father" placeholder="Father/Husband">
                                        </div>
                                        @if ($errors->has('hus_father'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('hus_father') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="birthday" class="col-sm-12 col-form-label">Date of Birth <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" value="{{ $nominee->birthday }}" id="birthday" required name="birthday" placeholder="Date of Birth">
                                        </div>
                                        @if ($errors->has('birthday'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('birthday') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="religion" class="col-sm-12 col-form-label">Religion <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="religion" id="religion">
                                                <option value="">Select Religion</option>
                                                <option value="islam">Islam</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddhist">Buddhist</option>
                                                <option value="christian">Christian</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('religion'))
                                            <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('religion') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="nationality" class="col-sm-12 col-form-label">Nationality <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $nominee->nationality }}" required id="nationality" name="nationality" placeholder="Nationality">
                                        </div>
                                        @if ($errors->has('nationality'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('nationality') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="nid" class="col-sm-12 col-form-label">National ID</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" value="{{ $nominee->nid }}" id="nid" name="nid" placeholder="National ID">
                                        </div>
                                        @if ($errors->has('nid'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('nid') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-6">
                                        <label for="address" class="col-sm-12 col-form-label">Address <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="address" required id="address" placeholder="Address">{{ $nominee->address }}</textarea>
                                        </div>
                                        @if ($errors->has('present_address'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="religion" class="col-sm-12 col-form-label">Select The Member The Nominee Belongs To <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" required name="member_id" id="member_id">
                                                @foreach($members as $member)
                                                    <option {{ $member->id == $nominee->member_id ? 'selected' : '' }} value="{{ $member->id }}">{{ $member->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('religion'))
                                            <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('religion') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-5">
                                        <label for="exampleInputFile">Select Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"  class="custom-file-input"  name="picture" id="picture">
                                                <label class="custom-file-label" for="picture">Choose file</label>
                                            </div>
                                            @if ($errors->has('picture'))
                                                <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                             </span>
                                            @endif
                                        </div>
                                    </div>
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
@section('footer-script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection