@extends('master')
@section("content")
<div class="user-product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trending-wrapper">
                    <h4>My ORDERS</h4>
                    @foreach ($orders as $item)
                    <div class="row searched-item cart-list-devider">
                        <div class="col-md-3">
                            <a href="detail/{{$item->id}}">
                                <img src="{{asset('storage/images/'.$item->gallery)}}" alt="..." class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="detail/{{$item->id}}">
                                <div>
                                    <h4>Name : {{$item->name}}</h4>
                                    <h6>Delivery Status : {{$item->status}}</h6>
                                    <h6>Address : {{$item->address}}</h6>
                                    <h6>Payment Status : {{$item->payment_status}}</h6>
                                    <h6>Payment Method : {{$item->payment_method}}</h6>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
