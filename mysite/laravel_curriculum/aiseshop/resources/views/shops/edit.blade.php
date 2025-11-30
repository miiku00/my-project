<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
         
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('shops.update', $shop->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">ショップ名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $shop->name) }}" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">説明</label>
                    <textarea name="description" id="description" class="w-full border border-gray-300 p-2 rounded" required>{{ old('description', $shop->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">画像</label>
                    <input type="file" name="image" id="image" class="w-full" accept="image/*">
                    @if ($shop->image)
                        <img src="{{ Storage::url($shop->image) }}" class="w-32 mt-4 rounded shadow">
                    @endif
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">更新</button>
                    <a href="{{ route('shops.show', $shop->id) }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded">キャンセル</a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
