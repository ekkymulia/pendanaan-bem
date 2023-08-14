@extends('layouts.simple.master')
@section('title', 'User Profile')

@section('css')
    
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Detail Ormawa</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Ormawa</li>
    <li class="breadcrumb-item active">Detail Ormawa</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <div class="info">
                            <div class="row pb-5">
                                <div class="col-12">
                                    <div class="user-designation">
                                        <div class="title">
                                          Ormawa ABC
                                        </div>
                                        <div class="desc">ormawa</div>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="ttl-info text-start">
                                                  <h6><i class="fa fa-envelope"></i>   Email</h6>
                                                  <span>OrmawaABC@apps.ipb.ac.id</span>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="ttl-info text-start">
                                                  <h6><i class="fa fa-calendar"></i>   Created</h6><span>28 August 2023</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="ttl-info text-start">
                                                  <h6><i class="fa fa-phone"></i>   Contact Us</h6>
                                                  <span>+62 123-456-7890</span>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="ttl-info text-start">
                                                  <h6><i class="fa fa-location-arrow"></i>   Location</h6>
                                                  <span>Jl. Kumbang No.14, Kota Bogor</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <hr>

                              <div class="row pt-3 pb-5">
                                <div class="col-12">
                                    <div class="ttl-info mb-0">
                                        <h6>Ketua Ormawa</h6>
                                        <span>Jhon Doe</span>
                                    </div>
                                </div>
                              </div>

                              <div class="row mb-5">
                                  <div class="col-sm-6 col-md-4">
                                      <div class="ttl-info mb-4">
                                          <h6>Wakil Ketua</h6>
                                          <span>Jhon Doe</span>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="ttl-info mb-4">
                                          <h6>Sekretaris</h6>
                                          <span>Jhon Doe</span>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="ttl-info mb-4">
                                        <h6>Bendahara</h6>
                                        <span>Jhon Doe</span>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="ttl-info mb-4">
                                          <h6>Badan Legislatif</h6>
                                          <span>Jhon Doe</span>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="ttl-info mb-4">
                                          <h6>Badan Pengawas</h6>
                                          <span>Jhon Doe</span>
                                      </div>
                                  </div>
                              </div>
                                <div class="social-media">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.linkedin.com/" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                        <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                                                    class="fa fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="https://id.pinterest.com/" target="_blank"><i
                                                    class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <div class="follow">
                                    <div class="row">
                                        <div class="col-6 text-md-end border-right">
                                            <div class="follow-num counter">25</div><span>Departemen</span>
                                        </div>
                                        <div class="col-6 text-md-start">
                                            <div class="follow-num counter">102</div><span>Proker</span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
@endsection
