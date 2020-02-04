@extends('layouts.app')
@section('title')
    Edit Expense
@endsection
@section('header-script')
@endsection
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Expense</h3>
        </div>
        <form class="form-horizontal" action="{{ route('admin.expense.update', $expense->id) }}" method="post">
            @csrf
            {{ method_field('patch') }}
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Expense Head</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="expence_head_id">
                            <option value="">Select Expense Head</option>
                            <option {{ $expense->expence_head_id == 0 ? 'selected' : '' }} value="0">Flash</option>
                            @foreach($heads as $head)
                                <option {{ $head->id == $expense->expence_head_id ? 'selected' : '' }} value="{{ $head->id }}">{{ $head->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" value="{{ $expense->date }}" id="date" placeholder="" name="date">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <textarea name="description" id="description" class="form-control">{{ $expense->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-8">
                        <textarea name="note" id="note" class="form-control">{{ $expense->note }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{ $expense->amount }}" class="form-control" id="amount" placeholder="" name="amount">
                    </div>
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info float-right">Update</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection

@section('footer-script')
    <script>

    </script>
@endsection
