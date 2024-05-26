@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Photo</td>
                            <td>Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        @foreach($categories as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{asset('uploads/category/'.$item->photo)}}" alt="" width="80"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->status}}</td>
                            <td><a href="">Edit</a> | <a href="">Delete</a> </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
