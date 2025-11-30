<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('shops.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">
                ショップ作成
            </a>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <p class="text-lg mb-4">
                ショップ件数：{{ $shops->count() }}
            </p>

            <hr class="my-6">

            
            <ul class="text-lg space-y-2">
                @forelse ($shops as $shop)
                    <li>
                        <a href="{{ route('shops.show', $shop->id) }}" class="text-blue-600 underline;">
                            {{ $shop->name }}
                        </a>
                    </li>
                @empty
                    <li class="text-gray-500">登録されたショップはありません</li>
                @endforelse
            </ul>

        </div>
    </div>
</x-app-layout>
