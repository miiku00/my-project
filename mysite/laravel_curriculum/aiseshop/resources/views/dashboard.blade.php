<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>               
            </div>
                <a href="{{ route('shops.my') }}"
                    class="inline-block bg-green-500 text-white px-4 py-2 rounded">
                        マイショップ一覧
                </a>

                <a href="{{ route('shops.index') }}"
                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded">
                        ショップ一覧へ
                </a>
        </div>        
    </div>
</x-app-layout>
