@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Add new member</h3>
                            </div>
                        </div>
                    </div>
                    @php
                        $record = \App\Member::latest()->count();
                        if ($record == 0) {
                            $record = 0;
                        }
                        $nextMemberId = $record + 1;
                        $member_id = str_pad($nextMemberId, 6, "0", STR_PAD_LEFT)
                    @endphp
                    <div class="card-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.members.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-8 offset-3">
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="member_id" class="col-form-label">Member ID:</label>
                                            </div>
                                            <div class="col-8">
                                               <input type="text" readonly value="{{ $member_id }}" class="form-control" id="member_id" required name="member_id" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="name" class="col-sm-10 col-form-label">Member Name <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('name') }}" class="form-control" id="name" required name="name" placeholder="Member Name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="col-sm-12 col-form-label">Email Address</label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email Address">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="hus_father" class="col-sm-12 col-form-label">Father/Husband <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('hus_father') }}" id="hus_father" required name="hus_father" placeholder="Father/Husband">
                                        </div>
                                        @if ($errors->has('hus_father'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('hus_father') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="mother" class="col-sm-12 col-form-label">Mothers Name <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('mother') }}" id="mother" required name="mother" placeholder="Mothers Name">
                                        </div>
                                        @if ($errors->has('mother'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('mother') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="birthday" class="col-sm-12 col-form-label">Date of Birth <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" value="{{ old('birthday') }}" id="birthday" required name="birthday" placeholder="Date of Birth">
                                        </div>
                                        @if ($errors->has('birthday'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('birthday') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="nid" class="col-sm-12 col-form-label">National ID</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" value="{{ old('nid') }}" id="nid" name="nid" placeholder="National ID">
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
                                        <label for="nationality" class="col-sm-12 col-form-label">Nationality <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('nationality') }}" required id="nationality" name="nationality" placeholder="Nationality">
                                        </div>
                                        @if ($errors->has('nationality'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('nationality') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="profession" class="col-sm-12 col-form-label">Profession</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('profession') }}" id="profession" name="profession" placeholder="Profession">
                                        </div>
                                        @if ($errors->has('profession'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                    <div class="col-6">
                                        <label for="mobile" class="col-sm-12 col-form-label">Phone Number <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('mobile') }}" required id="mobile" name="mobile" placeholder="Phone number">
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="present_address" class="col-sm-12 col-form-label">Present Address <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="present_address" required id="present_address" placeholder="Present Address">{{ old('present_address') }}</textarea>
                                        </div>
                                        @if ($errors->has('present_address'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('present_address') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">Mark permanent address same as present address?</label>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="permanent_address" class="col-sm-12 col-form-label">Permanent address</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent address">{{ old('permanent_address') }}</textarea>
                                        </div>
                                        @if ($errors->has('permanent_address'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('permanent_address') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="exampleInputFile">Select Image <label class="text-danger">*</label></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" required class="custom-file-input"  name="picture" id="picture">
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
        $(document).ready(function(){
            $('input[type="checkbox"]').click(function(){
                if($(this).prop("checked") == true){
                    var comment = $.trim($("#present_address").val());
                    if(comment != ""){
                        $('#permanent_address').val(comment);
                    }
                }
            });
        });
    </script>
    @endsection