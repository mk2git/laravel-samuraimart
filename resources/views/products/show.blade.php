@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-center">
    <div class="row w-75">
        <p>
            <a href="{{route('top')}}">トップ</a> > <a href="{{route('products.index')}}">{{$product->category->name}}</a> > {{$product->name}}
        </p>
      <div class="col-5 offset-1">
          @if ($product->image !== "")
            <img src="{{asset($product->image)}}" class="w-100 img-fluid">
          @else
            <img src="{{asset('img/dummy.png')}}" class="w-100 img-fluid">
          @endif
      </div>
      <div class="col">
        <div class="d-flex flex-column">
          <h1>{{$product->name}}</h1>
          {{-- star score --}}
          @if ($star_score > 0)
          <div class="star">
            <span class="samuraimart-star-rating" data-rate="{{$star_score}}"></span>
            <span>{{$score}}</span>
          </div>
          @else
            <p class="samuraimart-star-rating" data-rate="0"></p>
          @endif
          <p>{{$product->description}}</p>
          <hr>
          <p class="d-flex align-items-end">&yen; {{number_format($product->price)}}(税込)</p>
          <hr>
        </div>
        @auth
        <form action="{{route('carts.store')}}" method="post" class="m-3 align-items-end">
          @csrf
          <input type="hidden" name="id" value="{{$product->id}}">
          <input type="hidden" name="name" value="{{$product->name}}">
          <input type="hidden" name="price" value="{{$product->price}}">
          <input type="hidden" name="image" value="{{$product->image}}">
          <input type="hidden" name="carriage" value="{{$product->carriage_flag}}">
          <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">数量</label>
            <div class="col-sm-10">
              <input type="number" id="quantity" name="qty" min="1" value="1" class="form-control w-25">
            </div>
          </div>
          <input type="hidden" name="weight" value="0">
          <div class="row mt-4">
            <div class="col-6">
              <button type="submit" class="btn samuraimart-submit-button w-100">
                <i class="fas fa-shopping-cart"></i> カートに追加
              </button>
            </div>
            <div class="col-6">
              @if(Auth::user()->favorite_products()->where('product_id', $product->id)->exists())
                <a href="{{route('favorites.destroy', $product->id)}}" class="btn samuraimart-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                  <i class="fa fa-heart"></i>
                  お気に入り解除
                </a>
              @else
                <a href="{{route('favorites.store', $product->id)}}" class="btn samuraimart-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                  <i class="fa fa-heart"></i>
                  お気に入り
                </a>
              @endif
            </div>
          </div>
        </form>

        <form id="favorites-destroy-form" action="{{route('favorites.destroy', $product->id)}}" method="post" class="d-none">
          @csrf
          @method('delete')
        </form>
        <form id="favorites-store-form" action="{{route('favorites.store', $product->id)}}" method="post" class="d-none">
          @csrf
        </form>
        @endauth
      </div>
      <div class="offset-1 col-11">
        <hr class="w-100">
        <h3 class="float-left">カスタマーレビュー</h3>
        <div class="row mb-5">
            <div class="col-md-4">
                <small>{{$reviews_count}}件のレビュー</small>
                 {{-- star score --}}
                @if ($star_score > 0)
                <div class="star mt-2">
                    <span class="samuraimart-star-rating-index h5" data-rate="{{$star_score}}"> {{$score}}</span>
                </div>

                @else
                    <h4 class="samuraimart-star-rating" data-rate="0"></h4>
                @endif
                <hr>

                @auth
                <form action="{{route('reviews.store')}}" method="post">
                    @csrf
                    <h5 class="mt-3">評価</h5>
                    <select name="score" id="" class="form-control m-2 review-score-color">
                    <option value="5" class="review-score-color">★★★★★</option>
                    <option value="4" class="review-score-color">★★★★</option>
                    <option value="3" class="review-score-color">★★★</option>
                    <option value="2" class="review-score-color">★★</option>
                    <option value="1" class="review-score-color">★</option>
                    </select>
                    <h5 class="mt-3">タイトル</h5>
                    <input type="text" name="title" class="form-control">
                    <h5 class="mt-3">レビュー内容</h5>
                    @error('content')
                    <strong>レビュー内容を入力してください</strong>
                    @enderror
                    <textarea name="content" class="form-control m-2"></textarea>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn samuraimart-submit-button ml-2 mt-3 w-100">レビューを追加</button>
                </form>
                @endauth
            </div>

            <div class="col-md-8">
                @foreach($reviews as $review)
                  <div class="offset-md-2 col-md-5 mb-5">
                    <p class="h5">{{$review->title}}</p>
                    {{-- <h3 class="review-score-color">{{str_repeat('★', $review->score)}}</h3> --}}
                    <h3 class="samuraimart-star-rating" data-rate="{{$review->score}}"> </h3>
                    <p class="text-muted">{{$review->content}}</p>
                    <label>{{$review->user->name}} <small class="text-muted">{{$review->created_at}}</small></label>
                  </div>
                @endforeach
                {{$reviews->links()}}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
