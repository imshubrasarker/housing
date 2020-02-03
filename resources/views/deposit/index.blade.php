@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Deposites</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#SL</th>
                    <th>Slip No</th>
                    <th>Bank Name</th>
                    <th>Account No</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($deposits)
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $deposit->slip_no }}</td>
                            <td>{{ $deposit->bank->name }}</td>
                            <td>{{ $deposit->bank->ac_number }}</td>
                            <td>{{ $deposit->amount }}</td>
                            <td>
                                <div style="overflow: hidden">
                                    <a href="{{ route('admin.deposit.edit', $deposit->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>
                                    <form action="{{ route('admin.deposit.destroy', $deposit->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger float-right">Delete</button>
                                    </form>
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
@endsection
