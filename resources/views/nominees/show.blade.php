@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title"><strong>Nominee Details: </strong> {{ $nominee->name }}</h3>
                            </div>

                        </div>
                    </div>
                     <div class="card-body">
                         <div class="row mb-4">
                             <div class="text-center">
                                 @if($nominee->picture)
                                 <img style="width: 200px" class="profile-user-img img-fluid img-circle"
                                      src="{{ asset('/storage/'.$nominee->picture) }}"
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
                                        {{ $nominee->name }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-signature"></i> Father/Husband</strong>
                                    <p class="text-muted text-capitalize">
                                        {{ $nominee->hus_father }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-signature"></i> Member Name</strong>
                                    <p class="text-muted text-capitalize">
                                        {{ $nominee->member['name'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="far fa-calendar-alt"></i> Birthday</strong>
                                    <p class="text-muted">{{ $nominee->birthday }}</p>
                                </div>
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="far fa-id-card"></i> NID</strong>
                                    <p class="text-muted">{{ $nominee->nid }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-flag"></i> Nationality</strong>
                                    <p class="text-muted text-capitalize">{{ $nominee->nationality }}</p>
                                </div>
                            </div>
                         <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fas fa-star-and-crescent"></i> <strong>Religion</strong>
                                    <p class="text-muted text-capitalize">{{ $nominee->religion }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                                    <p class="text-muted text-capitalize">{{ $nominee->address }}</p>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection