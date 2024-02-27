<x-adminheader />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0"> Our Customers</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>#.</th>
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Created_at</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i =0;
                    @endphp
                    @foreach($customers as $item)
                    @php
                    $i++;
                    @endphp
                    <tr>
                      <!--  id,user_name, email is a field/column name in Database -->
                      <td>{{$item->id}}</td>
                      <td>{{$item->user_name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->password}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>
                        <a href="{{URL::to('deleteUser/'.$item->id)}}" class="btn btn-danger">Delete</a>
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