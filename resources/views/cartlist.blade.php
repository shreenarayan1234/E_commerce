@extends('master')
@section("content")
<div class="user-product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trending-wrapper">
                    <h2>Your Selected Watches</h2>
                    <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
                         <form action="/checkout" method="post">
                            @csrf
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit">Order Now</button><br><br>
                    </form> 
                    @foreach ($cartItems as $item)
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
                                    <p>Quantity: {{$item->quantity}}</p>
                                    <p>Total Price: {{$item->total_price}}</p>
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
