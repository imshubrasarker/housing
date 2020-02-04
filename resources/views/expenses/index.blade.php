@extends('layouts.app')

@section('header-script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add Expense Head</h3>
        </div>
        <form class="form-horizontal" action="{{ route('admin.expense-head.store') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Expense Head Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="expense-head" name="name">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info float-right">Submit</button>
            </div>
        </form>
    </div>

    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Manage Expense Heads</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($heads as $head)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{ $head->name }}</td>
                            <td>{{ Carbon\Carbon::parse($head->created_at)->format('d-M-Y ') }}</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#editModal"
                                        onclick="editHead('{{ $head->name }}','{{ route('admin.expense-head.update', $head->id) }}')">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit
                                </button>
                            </td>

                            <td>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"
                                        onclick="deleteHead('{{ route('admin.expense-head.destroy', $head->id) }}')">
                                    Delete
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    @include('extra.delete-modal')
    @include('expenses.shared.edit-modal')
@endsection

@section('footer-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2();
            });

            function editHead(title, route) {
                $('#editHeadForm').attr("action", route);
                $("#head_title").val(title);
            }

            function deleteHead(route) {
                $('#deleteForm').attr("action", route);
            }
        </script>
@endsection
