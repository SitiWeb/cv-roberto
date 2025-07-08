<div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $skill->title }}</h3>

    @if($skill->type === 'rating')
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Beoordeling: {{ $skill->rating }}/10</p>
    @endif

    @if($skill->description)
        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $skill->description }}</p>
    @endif

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
