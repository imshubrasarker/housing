@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Manage Land Purchase</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row mb-4 ">
                <div class="col-12">
                    <form class="form-inline float-right ml-3" action="{{ route('admin.land-purchase.index') }}" method="get">
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
            @if(count($landPurchases))
            <table id="example1" class="table table-bordered mt-4 table-striped">
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
                    @foreach($landPurchases as $purchase)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $purchase->donor_name }}</td>
                            <td>{{ $purchase->land_volume }}</td>
                            <td>{{ $purchase->stain_number }}</td>
                            <td>{{ $purchase->shotok_price }}</td>
                            <td>{{ $purchase->total_price }}</td>
                            <td>{{ $purchase->paid_amount }}</td>
                            <td>{{ $purchase->deu_amount }}</td>
                            <td>
                                <div style="overflow: hidden">
                                    <a href="{{ route('admin.land-purchase.edit', $purchase->id) }}" class="btn btn-primary btn-xs float-left">Edit</a>
                                    <button class="btn btn-xs ml-2 btn-danger" data-toggle="modal" data-target="#deleteModal"
                                            onclick="deleteHead('{{ route('admin.land-purchase.destroy', $purchase->id) }}')">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="row pagination">
                    {{ $landPurchases->links() }}
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