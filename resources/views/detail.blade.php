@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <img class="detail-img" src="{{asset('storage/images/'.$product->gallery)}}" alt="">
        </div>
        <div class="col-sm-6">
            <h2>Name: {{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Brand: {{$product['brand']}}</h4>
            <h4>Description: {{$product['description']}}</h4>
            <form action="{{url('/')}}/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <button class="btn btn-primary mt-3">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-secondary">Buy Now</button>
            <br><br>
            <a href="/">Go Back</a>
        </div>
    </div>
</div>
@endsection
