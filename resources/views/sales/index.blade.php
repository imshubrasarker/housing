@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Sales</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#SL</th>
                    <th>Member Name</th>
                    <th>Plot Size</th>
                    <th>Paid Amount</th>
                    <th>Discount</th>
                    <th>Due Amount</th>
                    <th>installment</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($sales)
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $sale->member->name }}</td>
                            <td>{{ $sale->plot->plot_size }}</td>
                            <td>{{ $sale->paid }}</td>
                            <td>{{ $sale->discount }}</td>
                            <td>{{ $sale->due_amount }}</td>
                            <td>{{ $sale->installment }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('admin.sale.show', $sale->id) }}" class="btn btn-sm btn-info">View</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('admin.sale.edit', $sale->id) }}" class="btn btn-primary btn-sm float-left">Edit</a>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-sm ml-2 btn-danger" data-toggle="modal" data-target="#deleteModal"
                                                onclick="deleteHead('{{ route('admin.sale.destroy', $sale->id) }}')">
                                            Delete
                                        </button>
                                    </div>
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
    <script>
        function deleteHead(route){
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection
