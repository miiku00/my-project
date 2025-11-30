<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $shop->name }} の商品一覧
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (Auth::id() === $shop->user_id)
                <a href="{{ route('shops.products.create', $shop->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">
                    商品登録
                </a>
                @endif

                <a href="{{ route('shops.show', $shop->id) }}"
                    class="inline-block bg-gray-500 text-white px-4 py-2 rounded mb-4">
                    ショップに戻る
                </a>

                @if ($products->isEmpty())
                    <p class="mt-4">商品が登録されていません。</p>
                @else
                    <table class="min-w-full bg-white border mt-4">
                        <thead>
                            <tr>
                                @if(Auth::id() === $shop->user_id)
                                <th class="py-2 px-4 border-b">ID</th>
                                @endif
                                <th class="py-2 px-4 border-b">商品名</th>
                                <th class="py-2 px-4 border-b">価格</th>
                                <th class="py-2 px-4 border-b">在庫</th>
                                <th class="py-2 px-4 border-b">説明</th>
                                <th class="py-2 px-4 border-b">画像</th>
                                <th colspan="3">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    @if(Auth::id() === $shop->user_id)
                                    <td class="py-2 px-4 border-b">{{ $product->id }}</td>
                                    @endif
                                    <td class="py-2 px-4 border-b max-w-xs truncate">{{ $product->name }}</td>
                                    <td class="py-2 px-4 border-b">¥{{ number_format($product->price) }}</td>
                                    <td class="py-2 px-4 border-b">{{ $product->stock }}</td>
                                    <td class="py-2 px-4 border-b max-w-xs">
                                        <div class="line-clamp-2">
                                            {{ $product->description }}
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-16">
                                        @else
                                            画像なし
                                        @endif
                                    </td>

                                    <td class="border p-2">
                                        <a href="{{ route('shops.products.show', [$shop->id, $product->id]) }}"
                                           class="text-blue-500 underline">表示</a>
                                    </td>

                                    @if(Auth::id() === $shop->user_id)
                                        <td class="border p-2">
                                            <a href="{{ route('shops.products.edit', [$shop->id, $product->id]) }}"
                                            class="text-yellow-500 underline">編集</a>
                                        </td>
                                        <td class="border p-2">
                                            <form action="{{ route('shops.products.destroy', [$shop->id, $product->id]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 underline">削除</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
