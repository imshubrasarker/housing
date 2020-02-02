@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title"><strong>Member Details: </strong> {{ $member->name }}</h3>
                            </div>

                        </div>
                    </div>
                     <div class="card-body">
                         <div class="row mb-4">
                             <div class="text-center">
                                 @if($member->picture)
                                 <img style="width: 200px" class="profile-user-img img-fluid img-circle"
                                      src="{{ asset('/storage/'.$member->picture) }}"
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
                                        {{ $member->name }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-signature"></i> Father/Husband</strong>
                                    <p class="text-muted text-capitalize">
                                        {{ $member->hus_father }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-signature"></i> Mothers Name</strong>
                                    <p class="text-muted text-capitalize">
                                        {{ $member->mother }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="far fa-calendar-alt"></i> Birthday</strong>
                                    <p class="text-muted">{{ $member->birthday }}</p>
                                </div>
                            </div>
                            <hr>
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong><i class="fas fa-mobile"></i> Mobile</strong>
                                      <p class="text-muted">{{ $member->mobile }}</p>
                                  </div>
                                  <div class="col-md-6">
                                      <strong><i class="far fa-envelope"></i> Email</strong>
                                      <p class="text-muted">{{ $member->email }}</p>
                                  </div>
                              </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fas fa-star-and-crescent"></i> Religion</strong>
                                    <p class="text-muted text-capitalize">{{ $member->religion }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-user-md"></i> Profession</strong>
                                    <p class="text-muted text-capitalize">{{ $member->profession }}</p>
                                </div>
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="far fa-id-card"></i> NID</strong>
                                    <p class="text-muted">{{ $member->nid }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-flag"></i> Nationality</strong>
                                    <p class="text-muted text-capitalize">{{ $member->nationality }}</p>
                                </div>
                            </div>
                         <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Present Address</strong>
                                    <p class="text-muted text-capitalize">{{ $member->present_address }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Permanent Address</strong>
                                    <p class="text-muted text-capitalize">{{ $member->permanent_address }}</p>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection