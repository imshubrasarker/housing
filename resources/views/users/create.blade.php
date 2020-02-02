@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title">Add New User</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.users.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="name" class="col-sm-10 col-form-label">User Name <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('name') }}" class="form-control" id="name" required name="name" placeholder="User Name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="col-sm-12 col-form-label">Email <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value="{{ old('email') }}" id="email" required name="email" placeholder="johon@doe.com">
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
                                        <label for="password" class="col-sm-12 col-form-label">Password<label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" value="{{ old('password') }}" id="password" required name="password" placeholder="Password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block ml-2 text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="role" class="col-sm-12 col-form-label">Select Role <label class="text-danger">*</label></label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="role" id="role">
                                                <option value="">Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                                <option value="accountant">Accountant</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('role'))
                                            <span class="help-block ml-2 text-danger">
                                            <strong>{{ $errors->first('role') }}</strong>
                                         </span>
                                        @endif
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