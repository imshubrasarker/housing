@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Banks</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline float-right ml-3" action="{{ route('admin.bank.index') }}" method="get">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn border-secondary btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(count($banks))
                <table id="example1" class="table mt-4 table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $bank->name }}</td>
                            <td>{{ $bank->ac_number }}</td>
                            <td>
                                <div style="overflow: hidden">
                                    <a href="{{ route('admin.bank.edit', $bank->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>

                                    <button class="btn btn-sm float-right btn-danger" data-toggle="modal" data-target="#deleteModal"
                                            onclick="deleteHead('{{ route('admin.bank.destroy', $bank->id) }}')">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row pagination">
                    {{ $banks->links() }}
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="alert text-center alert-default-secondary">
                            No Data Found!
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    @include('extra.delete-modal')
@endsection
@section('footer-script')
    <script type="text/javascript">
        $("#EndDate").change(function () {
            var startDate = document.getElementById("StartDate").value;
            var endDate = document.getElementById("EndDate").value;

            if ((Date.parse(startDate) >= Date.parse(endDate))) {
                alert("End date should be greater than Start date");
                document.getElementById("EndDate").value = "";
            }
        });

        $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
        $('#customer_id').select2();
        $('#customer_mobile').select2();
        function deleteHead(route) {
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection