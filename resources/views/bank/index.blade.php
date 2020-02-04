@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Banks</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#SL</th>
                    <th>Bank Name</th>
                    <th>Account Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($banks)
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
                @endif
                </tbody>
            </table>
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