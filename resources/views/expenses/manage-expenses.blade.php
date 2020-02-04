@extends('layouts.app')
@section('title')
    Manage Expenses
@endsection
@section('header-script')
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header" style="overflow:hidden;">
                <h3 class="card-title">Expenses</h3>
            </div>
            <form action="#" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-3">
                        <div class="input-group date" data-date-format="yyyy.mm.dd">
                            <div class="input-group-addon mt-4 mr-3">
                                <span class="glyphicon glyphicon-th">  From</span>
                            </div>
                            <input value="{{ date("Y-m-d") }}" id="StartDate" type="text" name="from"
                                   class="form-control mt-3">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group date" data-date-format="yyyy.mm.dd">
                            <div class="input-group-addon mt-4 mr-3 ml-4">
                                <span class="glyphicon glyphicon-th">  To</span>
                            </div>
                            <input value="{{date("Y-m-d")}}" id="EndDate" type="text" name="to"
                                   class="form-control mt-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                <span class="input-group-append mt-3">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                    </div>
                </div>
            </form>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Expense Head</th>
                        <th>Description</th>
                        <th>Note</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{ $expense->expenseHead->name }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->note }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>
                                <a href="{{ route('admin.expense.edit', $expense->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.expense.destroy', $expense->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete<i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>

@endsection

@section('footer-script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>

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
    </script>

    <script>

        function deleteHead(route) {
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection
