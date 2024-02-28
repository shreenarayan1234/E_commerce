<x-adminheader />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0"> Our Orders</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Customer</th>
                      <th>Email</th>
                      <th>Phone#</th>
                      <th>Address</th>
                      <th>Order Status</th>
                      <th>Order Date</th>
                      <th>Products</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $previous_created_at = null;
                    @endphp
                    @foreach($orders as $item)
                    @if($previous_created_at != $item->created_at)
                    @php
                    $previous_created_at = $item->created_at;
                    @endphp
                    <tr>
                      <!--  id,user_name, email is a field/column name in Database -->
                      <td>{{$item->id}}</td>
                      <td>{{$item->user_name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->phone_no}}</td>
                      <td>{{$item->address}}</td>
                      <td>{{$item->payment_status}}</td>
                      <td>{{$item->created_at}}</td>
                      <td class="font-weight-medium">
                        <!--Button to open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModel{{$item->id}}">
                        Products
                      </button>
                      <!-- The Modal -->
                      <div class="modal" id="updateModel{{$item->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Order Products</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <table class="table table-responsive">
                                <thead>
                                  <tr>
                                    <th>Product</th>
                                    <th>Picture</th>
                                    <th>Price/Item</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($orderItems as $oItem)
                                  @if($oItem->order_id == $item->id)
                                  <tr>
                                    <td>{{$oItem->name}}</td>
                                    <td><img src="{{asset('storage/images/'.$oItem->gallery)}}" width="100px" alt=""></td>
                                    <td>Rs.{{$oItem->price}}</td>
                                    <td>{{$oItem->quantity}}</td>
                                    <td>Rs.{{$oItem->quantity*$oItem->price}}</td>
                                  </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      </td>
                      <td>
                        @if($item->payment_status == 'Paid')
                        <a href="{{URL::to('changeOrderStatus/Accepted/'.$item->id)}}" class="btn btn-success">Accept</a>
                        <a href="{{URL::to('changeOrderStatus/Rejected/'.$item->id)}}" class="btn btn-danger">Reject</a>
                        @elseif($item->payment_status == 'Accepted')
                        <a href="{{URL::to('changeOrderStatus/Delivered/'.$item->id)}}" class="btn btn-success">Completed</a>
                        @elseif($item->payment_status=='Delivered')
                        Already Completed
                        @else
                        <a href="{{URL::to('changeOrderStatus/Accepted/'.$item->id)}}" class="btn btn-danger">Accepted</a>
                        @endif
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <x-adminfooter />
