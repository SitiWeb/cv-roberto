<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Personalia</h2>
        <a href="{{ route('personalia.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nieuw item toevoegen</a>

        <div class="space-y-4">
            @foreach ($personalia as $item)
                <div class="p-4 bg-white dark:bg-gray-800 rounded shadow flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        @if ($item->icon)
                            <i class="{{ $item->icon }} text-gray-600 dark:text-gray-300"></i>
                        @endif
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">{{ $item->key }}</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $item->value }}</p>
                            @if ($item->hidden)
                                <p class="text-xs text-yellow-500">Verborgen</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('personalia.edit', $item) }}" class="text-blue-600 hover:underline">Bewerken</a>
                        <form action="{{ route('personalia.destroy', $item) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Verwijderen</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
