@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <img class="detail-img" src="{{ asset('storage/images/'.$product->gallery) }}" alt="">
        </div>
        <div class="col-sm-6">
            <h2>Name: {{$product->name}}</h2>
            <h3>Price: Rs.<span id="product-price">{{$product->price}}</span></h3>
            <h4>Brand: {{$product->brand}}</h4>
            <h4>Description: {{$product->description}}</h4>
            <form action="{{ url('/') }}/add_to_cart" method="POST" id="add-to-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" style="width:70px;">
                </div>
                <!-- Hidden input field to store total price -->
                <input type="hidden" name="total_price" id="total-price-input">
                <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
            </form>
            <br><br>
            <div id="total-price-section">
                <h3>Total Price: Rs.<span id="total-price">{{$product->price}}</span></h3>
            </div>
            <br><br>
            <a href="/">Go Back</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('quantity').addEventListener('change', function() {
        var quantity = this.value;
        var price = parseFloat(document.getElementById('product-price').innerText);
        var totalPrice = quantity * price;
        document.getElementById('total-price').innerText = totalPrice.toFixed(2);
        
        // Set the total price in the hidden input field
        document.getElementById('total-price-input').value = totalPrice.toFixed(2);
    });
</script>
@endsection
