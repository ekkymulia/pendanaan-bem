@extends('layouts.simple.master')
@section('title', 'User Profile')

@section('css')
    
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Edit Profile Departemen</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Users</li>
    <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
              <div class="col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">My Profile</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="row mb-2">
                        <div class="profile-title">
                          <div class="media">
                            <img class="img-70 rounded-circle" alt="" src="{{ asset('assets/images/user/7.jpg') }}">
                            <div class="media-body">
                              <h5 class="mb-1">DEPARTEMEN ABC</h5>
                              <p>DEPARTEMEN</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <h6 class="form-label">Bio</h6>
                        <textarea class="form-control" rows="5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, mollitia!</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email-Address</label>
                        <input class="form-control" placeholder="your-email@domain.com">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">No.telp</label>
                        <input class="form-control" placeholder="012-345-678">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" value="password">
                      </div>
                      <div class="form-footer">
                        <button class="btn btn-primary btn-block">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-xl-8">
                <form class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Edit Profile</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                            <label class="form-label">Head of Department</label>
                            <input class="form-control" type="text" placeholder="Head of Department">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Vice Head</label>
                            <input class="form-control" type="text" placeholder="Vice Head">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                            <label class="form-label">Secretary</label>
                            <input class="form-control" type="text" placeholder="Secretary">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Treasurer</label>
                                <input class="form-control" type="text" placeholder="Treasurer">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Activity Committees or Divisions</label>
                                <input class="form-control" type="text" placeholder="Activity Committees or Divisions">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input class="form-control" type="text" placeholder="Main Address">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                            <label class="form-label">City</label>
                            <input class="form-control" type="text" placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input class="form-control" type="number" placeholder="ZIP Code">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-control btn-square">
                                <option value="0">--Select--</option>
                                <option value="1">Germany</option>
                                <option value="2">Canada</option>
                                <option value="3">Usa</option>
                                <option value="4">Aus</option>
                            </select>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                  </div>
                </form>
              </div>
              {{-- <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Add Member</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                  </div>
                  <div class="table-responsive add-project">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>NIM</th>
                          <th>Address</th>
                          <th>Prodi</th>
                          <th>Faculty</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td><a class="text-inherit" href="#">John Doe</a></td>
                          <td>J0403221000</td>
                          <td>Cifor, Kab.bogor</td>
                          <td>KMN</td>
                          <td>Vokasi</td>
                          <td class="text-end">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
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
