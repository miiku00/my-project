<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('カート') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('cart') && count(session('cart')) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">商品名</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">数量</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">小計</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">削除</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(session('cart') as $productId => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item['name'] }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">

                                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="type" value="minus">
                                                    <button class="px-2 bg-gray-200 rounded">－</button>
                                                </form>

                                                <span>{{ $item['quantity'] }}</span>

                                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="type" value="plus">
                                                    <button class="px-2 bg-gray-200 rounded">＋</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">¥{{ number_format($item['price'] * $item['quantity']) }}</td>
                                            
                                            

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('cart.remove', ['productId' => $item['id']]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>カートは空です。</p>
                    @endif

                    @if (!empty($cart))
                        <form action="{{ route('cart.purchase') }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                購入する
                            </button>
                        </form>
                    @endif

                    <div class="mt-6">
                        <a href="{{ session('cart_return_url', route('shops.index')) }}"
                            class="inline-block bg-gray-500 text-white px-4 py-2 rounded">
                            戻る
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
