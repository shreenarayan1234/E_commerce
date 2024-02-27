@extends('master')
@section("content")
<div class="user-product">
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

    <div class="tranding-wrapper">
      <h2>Our Watch</h2>
      @foreach ($product as $item)
      <div class="trading-item">
        <a href="detail/{{$item['id']}}">
          <div class="position-relative">
            <img src="{{asset('storage/images/'.$item->gallery)}}" alt="..." class="tranding-image d-block w-100" style="width: 700px; height: 300px; padding: 5px;">
          </div>
          <div class="">
            <h4 class="text-center">{{$item->name}}</h4>
            <h5 class="text-center" style = "color : black;">{{$item->description}}</h5>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- Ensure that jQuery is loaded before this script -->
<script>
  // Activate the carousel with a specified interval (e.g., 3000 milliseconds)
  $(document).ready(function() {
    $('#carouselExample').carousel({
      interval: 3000
    });
  });
</script>

@endsection
