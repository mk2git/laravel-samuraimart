@extends('layouts.app')

@section('content')
  <div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
      <h1>お気に入り</h1>
      <hr>

      <div class="row">
        @foreach($favorite_products as $favorite_product)
          <div class="col-md-7 mt-2">
            <div class="d-inline-flex">
              <a href="{{route('products.show', $favorite_product->id)}}">
                @if ($favorite_product->image !== "")
                    <img src="{{asset($favorite_product->image)}}" class="w-100 img-fluid" style="height: 150px; width:400px;">
                @else
                    <img src="{{asset('img/dummy.png')}}" class="w-100 img-fluid" style="height: 150px; width:300px;">
                @endif
              </a>
              <div class="container mt-3">
                <h5 class="w-100 samuraimart-favorite-item-text">{{$favorite_product->name}}</h5>
                <h6 class="w-100 samuraimart-favorite-item-text">&yen;{{number_format($favorite_product->price)}}</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{route('favorites.destroy', $favorite_product->id)}}" class="samuraimart-favorite-item-delete text-decoration-none text-dark" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">削除</a>
            @dump($favorite_product->id)
            <form id="favorites-destroy-form" action="{{route('favorites.destroy', $favorite_product->id)}}" method="post" class="d-none">
              @csrf
              @method('delete')
            </form>
          </div>
          <div class="col-md-3 d-flex align-items-center justify-content-end">
            <form action="{{route('carts.store')}}" method="post" class="m-3 align-items-end">
              @csrf
              <input type="hidden" name="id" value="{{$favorite_product->id}}">
              <input type="hidden" name="name" value="{{$favorite_product->name}}">
              <input type="hidden" name="price" value="{{$favorite_product->price}}">
              <input type="hidden" name="image" value="{{$favorite_product->image}}">
              <input type="hidden" name="carriage" value="{{$favorite_product->carriage_flag}}">
              <input type="hidden" name="qty" value="1">
              <input type="hidden" name="weight" value="0">
              <button type="submit" class="btn samuraimart-favorite-add-cart"><i class="fas fa-shopping-cart"></i> カートに入れる</button>
            </form>
          </div>
        @endforeach

      </div>
      <hr>
      {{$favorite_products->links()}}
    </div>
  </div>
@endsection
