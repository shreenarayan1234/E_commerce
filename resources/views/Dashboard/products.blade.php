<x-adminheader />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Top Products</p>
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModel">
                Add New
              </button>

              <!-- The Modal -->
              <div class="modal" id="addNewModel">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add New Product</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="{{url('/')}}/productsform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="enter watch name" />
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Price</label>
                          <input type="number" class="form-control" name="price" placeholder="Rs.xxx" />
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Quantity</label>
                          <input type="number" class="form-control" name="quantity" />
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Gallary (Choose Image)</label>
                          <input type="file" class="form-control" name="image" />
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Brand</label>
                          <input type="text" class="form-control" name="brand" />
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Description</label>
                          <textarea class="form-control" name="description" id="" rows="3"></textarea>
                        </div>

                        <button class="btn btn-primary">
                          Save Now
                        </button>

                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Picture</th>
                      <th>Brand</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i =0;
                    @endphp
                    @foreach($products as $item)
                    @php
                    $i++;
                    @endphp
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->price}}</td>
                      <td>{{$item->quantity}}</td>
                      <td><img src="{{asset('storage/images/'.$item->gallery)}}" width="100px" alt=""></td>
                      <td>{{$item->brand}}</td>
                      <td>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                          data-target="#updateModel{{$i}}">
                          Update
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="updateModel{{$i}}">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Update Product</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">

                                <form action="{{url('/')}}/UpdateProduct" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$item->name}}"
                                      placeholder="enter watch name" />
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$item->price}}"
                                      placeholder="Rs.xxx" />
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity"
                                      value="{{$item->quantity}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Gallary (Choose Image)</label>
                                    <input type="file" class="form-control" name="image" />
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand" value="{{$item->brand}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id=""
                                      rows="3">{{ $item->description }}</textarea>
                                  </div>

                                  <input type="hidden" name="id" value="{{$item->id}}">
                                  <input type="submit" name="save" class="btn btn-success" value="Save Changes">

                                </form>
                              </div>

                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="{{URL::to('deleteProduct/'.$item->id)}}" class="btn btn-danger">Delete</a>
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