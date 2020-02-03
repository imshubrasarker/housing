@extends('layouts.app')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Deposit</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.deposit.update', $deposit->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Slip No</label>
                    <div class="col-sm-8">
                        <input type="text" name="slip_no" id="slip_no" class="form-control" value="{{ $deposit->slip_no }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Bank</label>
                    <div class="col-sm-8">
                        <select name="bank_id" id="bank_id" class="form-control">
                            <option value="">Select Bank</option>
                            @foreach ($banks as $bank)
                                @if ($bank->id === $deposit->bank_id)
                                    <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @else
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Account Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ac_number" value="{{ $deposit->bank->ac_number }}" name="ac_number" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="amount" value="{{ $deposit->amount }}" name="amount">
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
        let banks = {!! json_encode($banks) !!}
        $('#bank_id').on('change', function () {
            var selectedVal = $("#bank_id option:selected").val();
            let acc = banks.find(x => x.id == selectedVal).ac_number;
            $('#ac_number').val(acc);
        })
    </script>
@endsection
