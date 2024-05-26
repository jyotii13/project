@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Category_id</td>
                            <td>Name</td>
                            <td>Photo</td>
                            <td>quantity</td>
                            <td>cost</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{asset('uploads/product/'.$item->photo)}}" alt="" width="80"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category_id}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->cost}}</td>
                            <td>{{$item->status}}</td>
                            <td><a href="{{route('getEditProduct', $item->id)}}">Edit</a> | <a href="{{route('getDeleteProduct', $item->id)}}">Delete</a> </td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
