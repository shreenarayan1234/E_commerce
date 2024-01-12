@extends('master')
@section("content")
<div class="user-product">
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($product as $key => $item)
       <a href="detail/{{$item['id']}}">
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
          <img src="{{asset('storage/images/'.$item->gallery)}}" class="d-block w-100" alt="..." style="height: 400px;">
          <div class="carousel-caption slider-text">
            <h3>{{$item->name}}</h3>
            <p>{{$item->description}}</p>
          </div>
      </a>
        </div>
      @endforeach
    </div>
    <div class="tranding-wrapper">
      <h2>Trending Watch</h2>
      @foreach ($product as $item)
      <div class="trading-item">
        <a href="detail/{{$item['id']}}">
        <img src="{{asset('storage/images/'.$item->gallery)}}" alt="..." class="tranding-image">
        <div class="">
          <h3 class="text-center">{{$item->name}}</h3>
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

<script>
  // Activate the carousel with a specified interval (e.g., 3000 milliseconds)
  $(document).ready(function() {
    $('#carouselExample').carousel({
      interval: 3000
    });
  });
</script>

@endsection
