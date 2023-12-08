@extends('admin.layouts.app')
@section('page-title','Setting')
@section('Breadcrumb')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Web Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Home</li>
            <li class="breadcrumb-item"><a href="#">Web Setting</a></li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form action="{{route('setting.update',$value->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="tile-title-w-btn">
                        <h4 class="title"><i class="fa fa-plus fa-lg"></i> Update Setting</h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Phone Number: <i class="text-danger">*</i></label>
                                <input type="text" name="phone" class="form-control  @error('phone')is-invalid @enderror" placeholder="phone" value="{{$value->phone}}"  required>
                                @error('phone')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Email: <i class="text-danger">*</i></label>
                                <input type="email" name="email" class="form-control  @error('email')is-invalid @enderror" placeholder="email"  value="{{$value->email}}"  required>
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Address: <i class="text-danger">*</i></label>
                                <input type="text" name="address" class="form-control @error('address')is-invalid @enderror" placeholder="address"  value="{{$value->address}}"  required>
                                @error('address')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Facebook Link: <i class="text-danger">*</i></label>
                                <input type="text" name="facebook_link" class="form-control @error('facebook_link')is-invalid @enderror" placeholder="facebook link"  value="{{$value->facebook_link}}" required>
                                @error('facebook_link')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Twitter Link: <i class="text-danger">*</i></label>
                                <input type="text" name="twitter_link" class="form-control @error('twitter_link')is-invalid @enderror" placeholder="twitter link"  value="{{old('twitter_link',$value->facebook_link)}}" required>
                                @error('twitter_link')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Youtube Link: <i class="text-danger">*</i></label>
                                <input type="text" name="youtube_link" class="form-control @error('youtube_link')is-invalid @enderror" placeholder="youtube link"  value="{{old('youtube_link',$value->youtube_link)}}" required>
                                @error('youtube_link')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="demoSelect">Instagram Link: <i class="text-danger">*</i></label>
                                <input type="text" name="instagram_link" class="form-control @error('instagram_link')is-invalid @enderror" placeholder="instagram link"  value="{{old('instagram_link',$value->instagram_link)}}" required>
                                @error('instagram_link')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



