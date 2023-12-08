@extends('admin.layouts.app')
@section('page-title','Room Booking Request')
@section('Breadcrumb')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Room Booking Request</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>  Home</li>
            <li class="breadcrumb-item"><a href="#"> Room Booking Request List</a></li>
        </ul>
    </div>
@endsection
@section('content')
    {{--page content start--}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="float-left">
                    <h4><i class="fa fa-list" aria-hidden="true"></i> Room Booking Request List</h4>
                </div>
                <div class="tile-body mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Room Title</th>
                                <th>Price</th>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Adults</th>
                                <th>child</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><a href="{{route('booking.page',encrypt($value->room->id))}}" target="_blank"> {{$value->room->title}} </a></td>
                                    <td>{{$value->room->price}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->email ?? 'none'}}</td>
                                    <td>{{$value->adults}}</td>
                                    <td>{{$value->children}}</td>
                                    <td style="text-align: center!important;"> <span class="btn-sm badge-primary">{{ \Carbon\Carbon::parse($value->fromDate)->format('d M Y')}} </span> <br> <span >to</span> <br> <span class="btn-sm badge-primary">{{ \Carbon\Carbon::parse($value->toDate)->format('d M Y')}} </span></td>
                                    <td class="text-center">
                                        <form action="{{ route('request.destroy',encrypt($value->id)) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--page content end--}}
@endsection


