@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
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
                                    <a href="{{ route('bank.edit', $bank->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>
                                    <form action="{{ route('bank.destroy', $bank->id) }}" method="post">
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
