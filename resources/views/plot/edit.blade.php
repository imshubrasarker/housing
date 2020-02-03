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
                            <option selected ="@if ($plot->plot_size === 3) 'selected' @else '' @endif" value="3">3</option>
                            <option selected ="@if ($plot->plot_size === 5) 'selected' @else '' @endif" value="5">5</option>
                            <option selected ="@if ($plot->plot_size === 10) 'selected' @else '' @endif" value="10">10</option>
                            <option selected ="@if ($plot->plot_size === 20) 'selected' @else '' @endif" value="20">20</option>
                            <option selected ="@if ($plot->plot_size == 'irregular') 'selected' @else '' @endif" value="irregular">Irregular</option>
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
                            <option selected ="@if ($plot->block == 'A') {'selected'} @else {''} @endif" value="A">A</option>
                            <option selected ="@if ($plot->block == 'A1') {'selected'} @else {''} @endif" value="A1">A1</option>
                            <option selected ="@if ($plot->block == 'B') {'selected'} @else {''} @endif" value="B">B</option>
                            <option selected ="@if ($plot->block == 'B1') {'selected'} @else {''} @endif" value="B1">B1</option>
                            <option selected ="@if ($plot->block == 'duplex') {'selected'} @else {''} @endif" value="duplex">Duplex</option>
                            <option selected ="@if ($plot->block == 'vip') {'selected'} @else {''} @endif" value="vip">VIP</option>
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
                            <option selected ="@if ($plot->face == 'east') {'selected'} @else {''} @endif" value="east">East</option>
                            <option selected ="@if ($plot->block == 'west') {'selected'} @else {''} @endif" value="west">West</option>
                            <option selected ="@if ($plot->block == 'north') {'selected'} @else {''} @endif" value="north">North</option>
                            <option selected ="@if ($plot->block == 'south') {'selected'} @else {''} @endif" value="south">South</option>
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
