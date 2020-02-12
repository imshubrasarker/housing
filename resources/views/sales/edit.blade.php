@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Sales Form</h3>
        </div>

        <form class="form-horizontal" action="{{ route('admin.sale.update', $sale->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Member</label>
                    <div class="col-sm-8">
                        <select name="member_id" id="member_id" class="form-control select2" style="width: 100%;" readonly>
                            <option value="Select Member">Select Member</option>
                            @foreach ($members as $member)
                                @if($sale->member_id === $member->id)
                                    <option value="{{ $member->id }}" selected>{{ $member->name }} ({{ $member->serial_id }}) </option>
                                    @continue;
                                @endif
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->serial_id }}) </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date" name="date" value="{{ $sale->date }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Plot</label>
                    <div class="col-sm-8">
                        <select name="plot_id" id="plot_id" class="form-control select2">
                            <option value="">Select Plot</option>
                            @foreach ($plots as $plot)
                                @if($sale->plot->id === $plot->id)
                                    <option value="{{ $plot->id }}" selected>{{ $plot->plot_size }}</option>
                                    @continue;
                                @endif
                                <option value="{{ $plot->id }}">{{ $plot->plot_size }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Rate</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $sale->plot->rate }}" id="rate" placeholder="Rate" name="rate" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Face</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="face" value="{{ $sale->plot->face }}" name="face" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Block</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="block" name="block" readonly value="{{ $sale->plot->block }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Road</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="road" name="road" readonly value="{{ $sale->plot->road }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Discount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="discount" name="discount" value="{{ $sale->discount }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Paid</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="paid_amount" value="{{ $sale->paid }}" name="paid_amount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Due</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $sale->due_amount }}" id="deu_amount" name="due_amount" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Number of Installment</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="installment_number" name="installment_number" value="{{ $sale->installment }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Installment Amount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="installment_amount" value="{{ $sale->installment_amount }}" name="installment_amount" readonly>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
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
                $('#road').val(plot.road)
                calculate_price();
                calculate_installment();
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
