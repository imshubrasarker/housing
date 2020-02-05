@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Plot Purchase Manage</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#SL</th>
                    <th>Plot Size</th>
                    <th>Rate</th>
                    <th>Block</th>
                    <th>Road</th>
                    <th>Face</th>
                    <th>Quantity</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($plots)
                    @foreach($plots as $plot)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $plot->plot_size }}</td>
                            <td>{{ $plot->rate }}</td>
                            <td>{{ $plot->block }}</td>
                            <td>{{ $plot->road }}</td>
                            <td>{{ $plot->face }}</td>
                            <td>{{ $plot->quantity }}</td>
                            <td>
                                <div style="overflow: hidden">
                                    <a href="{{ route('admin.plot.edit', $plot->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>
                                    <form action="{{ route('admin.plot.destroy', $plot->id) }}" method="post">
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
