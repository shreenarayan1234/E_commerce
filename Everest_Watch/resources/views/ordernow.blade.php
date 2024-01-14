@extends('master')
@section("content")
<div class="user-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
              <tr>
                <th>Amount</th>
                <td>Rs{{$total}}</td>
              </tr>
              <tr>
                <th>Tax</th>
                <td>Rs 0</td>
              </tr>
              <tr>
                <th>Delivery</th>
                <td>Rs 100</td>
              </tr>
              <tr>
                <th>Total</th>
                <td>Rs{{$total + 100}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderplace" method="POST">
                @csrf
                <div class="mb-3">
                  <textarea name="address" class="form-control" placeholder="enter your address"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Payment Method</label><br><br>
                  <input type="radio" value="cash" name="payment"><span>online payment</span><br><br>
                  <input type="radio" value="cash" name="payment"><span>E-Sewa</span><br><br>
                  <input type="radio" value="cash" name="payment"><span>Payment On Delivery</span><br><br>
                </div>
                <button type="submit" class="btn btn-primary">Order Now</button>
              </form>
          </div>
    </div>
</div>
@endsection