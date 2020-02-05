@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3>Sales Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Member Id</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $sale->member->serial_id }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Name</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $sale->member->name }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Father/Husband</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $sale->member->hus_father }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-mobile"></i> Mobile</strong>
                                <p class="text-muted">{{ $sale->member->mobile }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong><i class="fas fa-mobile"></i> Email</strong>
                                <p class="text-muted">{{ $sale->member->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="far fa-envelope"></i> Plot Size</strong>
                                <p class="text-muted">{{ $sale->plot->plot_size }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="far fa-envelope"></i> Road</strong>
                                <p class="text-muted">{{ $sale->plot->road }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-star-and-crescent"></i> Face</strong>
                                <p class="text-muted text-capitalize">{{ $sale->plot->face }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong><i class="fas fa-user-md"></i> Block</strong>
                                <p class="text-muted text-capitalize">{{ $sale->plot->block }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="far fa-id-card"></i> Due Amount</strong>
                                <p class="text-muted">{{ $sale->due_amount }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-flag"></i> Paid Amount</strong>
                                <p class="text-muted text-capitalize">{{ $sale->paid }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Discount</strong>
                                <p class="text-muted text-capitalize">{{ $sale->discount }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Installment Number</strong>
                                <p class="text-muted text-capitalize">{{ $sale->installment }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Installment Amount</strong>
                                <p class="text-muted text-capitalize">{{ $sale->installment_amount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
