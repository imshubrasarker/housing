@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Plot</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.plot.update', $plot->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Plot Size</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="plot_size">
                            <option {{ $plot->plot_size == 3 ? 'selected' : '' }} value="3">3</option>
                            <option {{ $plot->plot_size == 5 ? 'selected' : '' }} value="5">5</option>
                            <option {{ $plot->plot_size == 10 ? 'selected' : '' }} value="10">10</option>
                            <option {{ $plot->plot_size == 20 ? 'selected' : '' }} value="20">20</option>
                            <option {{ $plot->plot_size == 'irregular' ? 'selected' : '' }} value="irregular">Irregular</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Rate</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rate" value="{{ $plot->rate }}" name="rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Block</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="block">
                            <option {{ $plot->block == 'A' ? 'selected' : '' }} value="A">A</option>
                            <option {{ $plot->block == 'A1' ? 'selected' : '' }} value="A1">A1</option>
                            <option {{ $plot->block == 'B' ? 'selected' : '' }} value="B">B</option>
                            <option {{ $plot->block == 'B1' ? 'selected' : '' }} value="B1">B1</option>
                            <option {{ $plot->block == 'duplex' ? 'selected' : '' }} value="duplex">Duplex</option>
                            <option {{ $plot->block == 'vip' ? 'selected' : '' }} value="vip">VIP</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Road</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="road" value="{{ $plot->road }}" name="road">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Face</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="face">
                            <option {{ $plot->face == 'east' ? 'selected' : '' }} value="east">East</option>
                            <option {{ $plot->face == 'west' ? 'selected' : '' }} value="west">West</option>
                            <option {{ $plot->face == 'north' ? 'selected' : '' }} value="north">North</option>
                            <option {{ $plot->face == 'south' ? 'selected' : '' }} value="south">South</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $plot->quantity }}">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
