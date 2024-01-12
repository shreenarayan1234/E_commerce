@extends('master')
@section("content")
<div class="user-product">
    <div class="row">
        <div class="col-sm-4">
            <a href="#">filter</a>
        </div>
        <div class="col-sm-4">
            <div class="tranding-wrapper">
                <h4>Result for Watch</h4>
                @foreach ($product as $item)
                <div class="searched-item">
                  <a href="detail/{{$item['id']}}">
                  <img src="{{asset('storage/images/'.$item->gallery)}}" alt="..." class="tranding-image">
                  <div class="">
                    <h2 class="text-center">{{$item->name}}</h2>
                    <h5>{{$item['description']}}</h5>
                  </div>
                  </a>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
