<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">購入履歴</h2>
    </x-slot>

    <div class="p-6">
        @forelse($orders as $order)
            <div class="mb-6 p-4 border rounded">
                <p>注文日：{{ $order->created_at }}</p>
                <p>合計：¥{{ number_format($order->total_price) }}</p>

                <ul class="mt-2">
                    @foreach($order->items as $item)
                        <li>
                            {{ $item->product->name }} × {{ $item->quantity }}
                            （¥{{ number_format($item->price) }}）
                        </li>
                    @endforeach
                </ul>
            </div>
        @empty
            <p>購入履歴はありません。</p>
        @endforelse
    </div>
</x-app-layout>
