@extends('master')
@section("content")
<div class="user-product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trending-wrapper">
                    <h2>Your Selected Watches</h2>
                    @foreach ($products as $item)
                    <div class="row searched-item cart-list-devider">
                        <div class="col-md-3">
                            <a href="detail/{{$item->id}}">
                                <img src="{{asset('storage/images/'.$item->gallery)}}" alt="..." class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="detail/{{$item->id}}">
                                <div>
                                    <h2>{{$item->name}}</h2>
                                    <h5>{{$item->description}}</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
