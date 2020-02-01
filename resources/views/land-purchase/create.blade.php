@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Land Purchase Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.members.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Donor Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="donor_name" placeholder="Donor Name" name="donor_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Land volume</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="land_volume" placeholder="Land Volume" name="land_volume">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">RS stain number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="stain_number" name="stain_number" placeholder="RS stain number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Ledger</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ledger" placeholder="Ledger" name="ledger">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Shotok Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="shotok_price" placeholder="Shotok Price" name="shotok_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Total Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="total_price" readonly name="total_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Paid</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="paid_amount" placeholder="Paid Amount" name="paid_amount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Due</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="deu_amount" name="due_amount" readonly>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="button" class="btn btn-default float-right">Cancel</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
