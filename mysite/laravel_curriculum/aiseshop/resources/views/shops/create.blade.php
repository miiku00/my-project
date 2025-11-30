<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">ショップ名:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="border rounded p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="description">説明:</label>
                        <textarea id="description" name="description" class="border rounded p-2 w-full" required>{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="image">画像:</label>
                        <input type="file" id="image" name="image" class="mt-1" accept="image/*">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        作成
                    </button>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
