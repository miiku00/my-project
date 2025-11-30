<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }} の商品詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">{{ $product->name }}</h3>
                <p class="mb-2"><strong>価格:</strong> ¥{{ number_format($product->price) }}</p>
                <p class="mb-2"><strong>在庫:</strong> {{ $product->stock }}</p>
                <p class="mb-4"><strong>説明:</strong> {{ $product->description }}</p>
                
                <div class="mb-4">
                    <strong>画像:</strong><br>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }} — {{ $product->description }} Price ¥{{ number_format($product->price) }}, stock {{ $product->stock }}. Product centered on a neutral background. Tone neutral and informative."
                         class="h-48">            
                @else
                    <p>画像なし</p>
                @endif
                </div>

                @if(Auth::id() === $product->shop->user_id) 
                    <a href="{{ route('shops.products.edit', [$product->shop_id, $product->id]) }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded">
                        商品編集
                    </a>
                @endif
                    
                    
                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" 
                                    class="bg-green-500 text-white px-4 py-2 rounded">
                                カートに追加
                            </button>
                        </form>
                    @else
                        <span class="text-red-500 font-bold">SOLD OUT</span>
                    @endif
                
               

            <div class="mt-6">
                <a href="{{ route('shops.products.index', $product->shop_id) }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                    商品一覧に戻る
                </a>
            </div>

        </div>
    </div>
</x-app-layout>