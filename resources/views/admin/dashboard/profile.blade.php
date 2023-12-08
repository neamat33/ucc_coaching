@extends('admin.layouts.app')
@section('page-title', 'profile')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Admin Profile</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3">
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card profile-card flex-column mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Profile</h6>
                        </div>
                        <div class="card-body d-flex profile-fulldeatil flex-column">
                            <div class="profile-block  w220">
                                <a href="#">
                                    <img src="{{ asset(config('imagepath.profile').$user->image) }}" alt=""
                                        class="avatar xl rounded img-thumbnail shadow-sm">
                                </a>
                                <button class="btn btn-primary" style="position: absolute;top:15px;right: 15px;"
                                    data-bs-toggle="modal" data-bs-target="#editprofile"><i
                                        class="icofont-edit"></i></button>
                                <div class="about-info d-flex align-items-center mt-3">
                                    <span class="text-muted small">Admin ID : {{ $user->id }}</span>
                                </div>
                            </div>
                            <div class="profile-info w-100">
                                <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ $user->name }}</h6>
                                <div class="row g-2 pt-2">
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-ui-touch-phone"></i>
                                            <span class="ms-2">{{ $user->phone_number }} </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-email"></i>
                                            <span class="ms-2">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Profile Settings</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">User Name</label>
                                        <input name='name' class="form-control" type="text" placeholder=" "
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input name='password' class="form-control" type="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input name="phone_number" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input name="email" type="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="button" class="btn btn-primary text-uppercase px-5">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Custom Settings-->
    <div class="modal fade right" id="Settingmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Custom Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom_setting">
                    <!-- Settings: Color -->
                    <div class="setting-theme pb-3">
                        <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i
                                class="icofont-color-bucket fs-4 me-2 text-primary"></i>Template Color Settings</h6>
                        <ul class="list-unstyled row row-cols-3 g-2 choose-skin mb-2 mt-2">
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                            </li>
                            <li data-theme="tradewind">
                                <div class="tradewind"></div>
                            </li>
                            <li data-theme="monalisa">
                                <div class="monalisa"></div>
                            </li>
                            <li data-theme="blue" class="active">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                            <li data-theme="red">
                                <div class="red"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-gradient py-3">
                        <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i
                                class="icofont-paint fs-4 me-2 text-primary"></i>Sidebar Gradient</h6>
                        <div class="form-check form-switch gradient-switch pt-2 mb-2">
                            <input class="form-check-input" type="checkbox" id="CheckGradient">
                            <label class="form-check-label" for="CheckGradient">Enable Gradient! ( Sidebar )</label>
                        </div>
                    </div>
                    <!-- Settings: Template dynamics -->
                    <div class="dynamic-block py-3">
                        <ul class="list-unstyled choose-skin mb-2 mt-1">
                            <li data-theme="dynamic">
                                <div class="dynamic"><i class="icofont-paint me-2"></i> Click to Dyanmic Setting</div>
                            </li>
                        </ul>
                        <div class="dt-setting">
                            <ul class="list-group list-unstyled mt-1">
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label>Primary Color</label>
                                    <button id="primaryColorPicker"
                                        class="btn bg-primary avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label>Secondary Color</label>
                                    <button id="secondaryColorPicker"
                                        class="btn bg-secondary avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label class="text-muted">Chart Color 1</label>
                                    <button id="chartColorPicker1"
                                        class="btn chart-color1 avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label class="text-muted">Chart Color 2</label>
                                    <button id="chartColorPicker2"
                                        class="btn chart-color2 avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label class="text-muted">Chart Color 3</label>
                                    <button id="chartColorPicker3"
                                        class="btn chart-color3 avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label class="text-muted">Chart Color 4</label>
                                    <button id="chartColorPicker4"
                                        class="btn chart-color4 avatar xs border-0 rounded-0"></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                    <label class="text-muted">Chart Color 5</label>
                                    <button id="chartColorPicker5"
                                        class="btn chart-color5 avatar xs border-0 rounded-0"></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Settings: Font -->
                    <div class="setting-font py-3">
                        <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i
                                class="icofont-font fs-4 me-2 text-primary"></i> Font Settings</h6>
                        <ul class="list-group font_setting mt-1">
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-poppins"
                                        value="font-poppins">
                                    <label class="form-check-label" for="font-poppins">
                                        Poppins Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-opensans"
                                        value="font-opensans" checked="">
                                    <label class="form-check-label" for="font-opensans">
                                        Open Sans Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-montserrat"
                                        value="font-montserrat">
                                    <label class="form-check-label" for="font-montserrat">
                                        Montserrat Google Font
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item py-1 px-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="font" id="font-mukta"
                                        value="font-mukta">
                                    <label class="form-check-label" for="font-mukta">
                                        Mukta Google Font
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Settings: Light/dark -->
                    <div class="setting-mode py-3">
                        <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i
                                class="icofont-layout fs-4 me-2 text-primary"></i>Contrast Layout</h6>
                        <ul class="list-group list-unstyled mb-0 mt-1">
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-switch">
                                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-high-contrast mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                    <label class="form-check-label" for="theme-high-contrast">Enable High Contrast</label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-1 px-2">
                                <div class="form-check form-switch theme-rtl mb-0">
                                    <input class="form-check-input" type="checkbox" id="theme-rtl">
                                    <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-white border lift" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary lift">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Password-->
    <div class="modal fade" id="authchange" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Authentication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="deadline-form">
                        <form>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label for="item1" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="item1" value="Adrian007">
                                </div>
                                <div class="col-sm-6">
                                    <label for="taxtno111" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="taxtno111" value="abcxyzabc">
                                </div>
                                <div class="col-sm-12">
                                    <label for="taxtno11" class="form-label">Conform Password</label>
                                    <input type="text" class="form-control" id="taxtno11">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit profile-->
    <div class="modal fade" id="editprofile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="expeditLabel1111"> Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="deadline-form">
                        <form action="{{ route('update_general', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3 mb-3">
                                <div class="col-sm-12">
                                    <label for="item100" class="form-label">Name</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="taxtno200" class="form-label">Profile</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label for="mailid" class="form-label">Mail</label>
                                    <input type="text" name="email" class="form-control" id="mailid"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="phoneid" class="form-label">Phone</label>
                                    <input type="text" name='phone_number' class="form-control" id="phoneid"
                                        value="{{ $user->phone_number }}">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
