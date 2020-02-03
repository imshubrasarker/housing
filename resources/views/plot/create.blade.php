@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add Plot</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.plot.store') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Plot Size</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="plot_size">
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="irregular">Irregular</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Rate</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Block</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="block">
                            <option value="A">A</option>
                            <option value="A1">A1</option>
                            <option value="B">B</option>
                            <option value="B1">B1</option>
                            <option value="duplex">Duplex</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Road</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="road" placeholder="Road" name="road">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Face</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="face">
                            <option value="east">East</option>
                            <option value="west">West</option>
                            <option value="north">North</option>
                            <option value="south">South</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Create</button>
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
