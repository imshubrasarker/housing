@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Bayna</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row mb-4 ">
                <div class="col-12">
                    <form class="form-inline float-right ml-3" action="{{ route('admin.bayna.index') }}" method="get">
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
            @if(count($baynas))
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#SL</th>
                    <th>Donor Name</th>
                    <th>Land Volume</th>
                    <th>Stain Number</th>
                    <th>Shotok Price</th>
                    <th>Total Price</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($baynas)
                    @foreach($baynas as $bayna)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $bayna->donor_name }}</td>
                            <td>{{ $bayna->land_volume }}</td>
                            <td>{{ $bayna->stain_number }}</td>
                            <td>{{ $bayna->shotok_price }}</td>
                            <td>{{ $bayna->total_price }}</td>
                            <td>{{ $bayna->paid_amount }}</td>
                            <td>{{ $bayna->deu_amount }}</td>
                            <td>
                                <div style="overflow: hidden">
                                    <a href="{{ route('admin.bayna.edit', $bayna->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>
                                    <button class="btn btn-xs float-right btn-danger" data-toggle="modal" data-target="#deleteModal"
                                            onclick="deleteHead('{{ route('admin.bayna.destroy', $bayna->id) }}')">
                                        Delete </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

                <div class="row pagination">
                    {{ $baynas->links() }}
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
    <script>
        function deleteHead(route){
            $('#deleteForm').attr("action", route);
        }
    </script>
@endsection