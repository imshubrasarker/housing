@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Plot Purchase</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline float-right ml-3" action="{{ route('admin.plot.index') }}" method="get">
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
            @if(count($plots))
            <table id="example1" class="table mt-4 table-bordered table-striped">
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
                </tbody>
            </table>
                <div class="row pagination">
                    {{ $plots->links() }}
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
@endsection
