@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Land Purchase Edit</h3>
        </div>
        <form class="form-horizontal" action="{{ route('admin.land-purchase.update', $landPurchase->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Donor Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="donor_name" name="donor_name" value="{{ $landPurchase->donor_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Land volume</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="land_volume" value="{{ $landPurchase->land_volume }}" name="land_volume">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">RS stain number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="stain_number" name="stain_number" value="{{ $landPurchase->stain_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Ledger</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ledger" name="ledger" value="{{ $landPurchase->ledger }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Shotok Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="shotok_price" value="{{ $landPurchase->shotok_price }}" name="shotok_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Total Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="total_price" value="{{ $landPurchase->total_price }}" readonly name="total_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Paid</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="paid_amount" value="{{ $landPurchase->paid_amount }}" name="paid_amount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Due</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="deu_amount" name="due_amount" value="{{ $landPurchase->deu_amount }}" readonly>
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

@section('footer-script')
    <script>
        $(document).ready(function() {
            function calculate_price() {
                let price = 0;
                let land_valume = $('#land_volume').val() ? $('#land_volume').val() : 0;
                let shotok_price = $('#shotok_price').val() ? $('#shotok_price').val() : 0;
                let total_price = parseFloat(land_valume) * parseFloat(shotok_price) ;
                let paid = $('#paid_amount').val() ? $('#paid_amount').val() : 0;
                let due_amount = total_price - parseFloat(paid);

                $('#deu_amount').val(due_amount);
                $('#total_price').val(total_price);
            }
            $('#land_volume').on('keyup', function () {
                calculate_price();
            })

            $('#paid_amount').on('keyup', function () {
                calculate_price();
            })

            $('#shotok_price').on('keyup', function () {
                calculate_price();
            })

        });
    </script>
@endsection
