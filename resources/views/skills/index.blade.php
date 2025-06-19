<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Vaardigheden</h2>
        <a href="{{ route('skills.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nieuwe vaardigheid</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($skills as $skill)
                <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $skill->title }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Beoordeling: {{ $skill->rating }}/10</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $skill->description }}</p>
                    @if ($skill->getFirstMediaUrl('image'))
                        <img src="{{ $skill->getFirstMediaUrl('image') }}" alt="{{ $skill->title }}" class="mt-2 max-w-full h-32 object-contain rounded">
                    @endif
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('skills.edit', $skill) }}" class="text-blue-600 hover:underline">Bewerken</a>
                        <form action="{{ route('skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?')">
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
