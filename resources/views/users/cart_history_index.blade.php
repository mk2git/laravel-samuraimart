@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <a href="{{ route('mypage') }}">マイページ</a> > 注文履歴
            </span>

            <div class="container mt-4 w-80">
                <h1 class="mb-4">注文履歴 {{count($billings)}}件</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">注文番号</th>
                            <th scope="col">購入日時</th>
                            <th scope="col">合計金額</th>
                            <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billings as $billing)
                        <tr>
                            <td>{{ $billing['code'] }}</td>
                            <td>{{ $billing['created_at']}}</td>
                            <td>&yen; {{ number_format($billing['total'])}}</td>
                            <td>
                                <a href="{{ route('mypage.cart_history_show', $billing['id']) }}" class="text-success text-decoration-none">
                                    詳細
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $billings->links() }}
        </div>
    </div>
</div>

@endsection
