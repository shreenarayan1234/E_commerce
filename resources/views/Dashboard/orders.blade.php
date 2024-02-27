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
                      <th>#.</th>
                      <th>Customer</th>
                      <th>Email</th>
                      <th>Phone#</th>
                      <th>Address</th>
                      <th>Order Status</th>
                      <th>Order Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i =0;
                    @endphp
                    @foreach($orders as $item)
                    @php
                    $i++;
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