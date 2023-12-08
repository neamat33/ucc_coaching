@extends('admin.layouts.app')
@section('page-title','Slider')
@section('Breadcrumb')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Slider</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Home</li>
            <li class="breadcrumb-item"><a href="#">Slider</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
            @isset($add)
            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile-title-w-btn">
                <h4 class="title"><i class="fa fa-plus fa-lg"></i> Create Slider</h4>
{{--                <p><a class="btn btn-primary btn-sm icon-btn" href="{{route('slider.index')}}"><i class="fa fa-list"></i>See List</a></p>--}}
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-sm" for="demoSelect">Slider Title: <i class="text-danger">*</i></label>
                        <input type="text" name="title" class="form-control" placeholder="title"  value="{{old('title')}}" required>
                        @error('title')
                        <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-sm" for="demoSelect">Image: ( jpeg,png,jpg )<i class="text-danger">*</i></label>
                        <input class="form-control-file" name="image" id="#" type="file" value="{{old('image')}}" required>
                        @error('image')
                        <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
            @endisset
            @isset($edit)
                    <form action="{{route('slider.update',encrypt($slider->id))}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="tile-title-w-btn">
                            <h4 class="title"><i class="fa fa-edit fa-lg"></i> Update Slider</h4>
                            {{--                <p><a class="btn btn-primary btn-sm icon-btn" href="{{route('slider.index')}}"><i class="fa fa-list"></i>See List</a></p>--}}
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm" for="demoSelect">Slider Title: <i class="text-danger">*</i></label>
                                    <input type="text" name="title" class="form-control" placeholder="title"  value="{{old('title',$slider->title)}}" required>
                                    @error('title')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm" for="demoSelect">Image: ( jpeg,png,jpg )<i class="text-danger">*</i></label>
                                    <input class="form-control-file" name="image" id="change-picture" type="file" value="{{old('image')}}" >
                                    @error('image')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="portfolio_status">Image Preview:</label>
                                    <div>
                                        @if($slider->image)
                                            <img src="{{asset(config('imagepath.slider').$slider->image)}}" id="blah" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
                                        @else
                                            <img src="{{asset('images/default.png')}}" id="blah" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            @endisset
       </div>
      </div>
    </div>
    {{--page content start--}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="float-left">
                    <h4><i class="fa fa-list" aria-hidden="true"></i> Slider List</h4>
                </div>
{{--                <div>--}}
{{--                    <a href="{{route('slider.create')}}" class="btn btn-primary btn-sm float-right mb-2"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add New Slide</a>--}}
{{--                </div>--}}
                <div class="tile-body mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Slider Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @isset($sliders)
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <img src="{{asset(config('imagepath.slider').$slider->image)}}" id="blah" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="40" width="40">
                                    </td>
                                    <td>{{$slider->title}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('slider.destroy',encrypt($slider->id)) }}" method="Post">
                                            <a class="btn btn-sm btn-primary" href="{{ route('slider.edit',encrypt($slider->id))}}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        //image preview
        $("#change-picture").change(function () {
            readURL(this);
        });
        //image input
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    </script>
@endpush


