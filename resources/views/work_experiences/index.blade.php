{{-- resources/views/work_experiences/index.blade.php --}}
<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Werkervaring</h2>
            <a href="{{ route('work-experiences.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Nieuw</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-700 dark:text-green-400">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @foreach ($experiences as $experience)
                <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $experience->functie }} bij {{ $experience->werkgever }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $experience->startdatum }} – {{ $experience->einddatum ?? 'heden' }}</p>
                            <p class="mt-2 text-gray-700 dark:text-gray-200">{{ $experience->beschrijving }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('work-experiences.edit', $experience) }}" class="text-blue-500 hover:underline">Bewerken</a>
                            <form method="POST" action="{{ route('work-experiences.destroy', $experience) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                    @if ($experience->getFirstMediaUrl('afbeelding'))
                        <img src="{{ $experience->getFirstMediaUrl('afbeelding') }}" class="mt-4 max-w-xs rounded">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
