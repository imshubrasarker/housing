@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add Sales Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.sale.store') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Member</label>
                    <div class="col-sm-8">
                        <select name="member_id" id="member_id" class="form-control select2" style="width: 100%;">
                            <option value="Select Member">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->serial_id }}) </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Plot</label>
                    <div class="col-sm-8">
                        <select name="plot_id" id="plot_id" class="form-control select2">
                            <option value="">Select Plot</option>
                            @foreach ($plots as $plot)
                                <option value="{{ $plot->id }}">{{ $plot->plot_size }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Rate</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Face</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="face" name="face" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Block</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="block" name="block" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Road</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="road" name="road" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Discount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount">
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

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Number of Installment</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="installment_number" name="installment_number">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Installment Amount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="installment_amount" name="installment_amount" readonly>
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

@section('footer-script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#plot_id').change(function () {
                let plots = {!! json_encode($plots) !!};
                var selectedVal = $("#plot_id option:selected").val();
                let plot = plots.find(x => x.id == selectedVal);
                $('#rate').val(plot.rate);
                $('#face').val(plot.face);
                $('#block').val(plot.block);
                $('#road').val(plot.road);
                calculate_price()
            });

            function calculate_price() {
                let price = 0;
                let rate = $('#rate').val() ? $('#rate').val() : 0;
                let discount = $('#discount').val() ? $('#discount').val() : 0;
                let paid = $('#paid_amount').val() ? $('#paid_amount').val() : 0;
                let due_amount = parseFloat(rate) -parseFloat(discount) - parseFloat(paid);
                $('#deu_amount').val(due_amount);
                calculate_installment()
            }
            $('#discount').on('keyup', function () {
                calculate_price();
            })

            $('#paid_amount').on('keyup', function () {
                calculate_price();
            })

            function calculate_installment() {
                let due = $('#deu_amount').val();
                let istallment_number = $('#installment_number').val() ? $('#installment_number').val() : 0;
                let installment_amount = parseFloat(due) / parseFloat(istallment_number);
                $('#installment_amount').val(installment_amount.toFixed(2));
            }

            $('#installment_number').on('keyup', function () {
                calculate_installment();
            })
        });
    </script>
@endsection
