<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">

            <h1 class="text-2xl font-bold mb-4">{{ $shop->name }}</h1>

            <p class="mb-4 text-gray-700">{{ $shop->description }}</p>

            @if ($shop->image)
                <img src="{{ Storage::url($shop->image) }}" class="max-w-sm mb-4 rounded shadow">
            @endif

            <a href="{{ route('shops.products.index', $shop->id) }}"
               class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">
                商品一覧を見る
            </a>

            @if(Auth::id() === $shop->user_id)
                <a href="{{ route('shops.edit', $shop->id) }}"
                class="inline-block bg-yellow-500 text-white px-4 py-2 rounded mr-2">
                    編集
                </a>

                <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                        削除
                    </button>
                </form>

                <a href="{{ route('products.csv', ['shop' => $shop->id]) }}"
                    class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded">
                        CSV 出力
                </a>

            @endif

            <a href="{{ route('shops.index') }}"
               class="inline-block bg-gray-500 text-white px-4 py-2 rounded">
                一覧へ戻る
            </a>

        </div>
    </div>
</x-app-layout>
