@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title"><strong>Reference Details: </strong> {{ $reference->name }}</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="text-center">
                                @if($reference->image)
                                    <img style="width: 200px" class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('/storage/'.$reference->image) }}"
                                         alt="User profile picture">
                                @else
                                    <img style="width: 200px" class="profile-user-img img-fluid img-circle"
                                         src="/images/placeholder.png"
                                         alt="User profile picture">
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Name</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $reference->name }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Father/Husband</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $reference->father_name }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-signature"></i> Mother Name</strong>
                                <p class="text-muted text-capitalize">
                                    {{ $reference->mother_name }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="far fa-calendar-alt"></i> Birthday</strong>
                                <p class="text-muted">{{ $reference->dob }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="far fa-id-card"></i> NID</strong>
                                <p class="text-muted">{{ $reference->nid }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-envelope"></i> Email</strong>
                                <p class="text-muted text-capitalize">{{ $reference->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fas fa-star-and-crescent"></i> <strong> Religion</strong>
                                <p class="text-muted text-capitalize">{{ $reference->religion }}</p>
                            </div>
                            <div class="col-md-6">
                                <i class="fas fa-mobile"></i> <strong> Mobile</strong>
                                <p class="text-muted text-capitalize">{{ $reference->mobile }}</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Present Address</strong>
                                <p class="text-muted text-capitalize">{{ $reference->present_address }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Permanent Address</strong>
                                <p class="text-muted text-capitalize">{{ $reference->permanent_address }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection