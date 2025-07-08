<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Opleidingen</h2>

        <a href="{{ route('educations.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Nieuwe opleiding</a>

        @foreach ($educations as $education)
            <div class="mb-4 p-4 bg-white dark:bg-gray-800 shadow rounded">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $education->opleiding }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $education->instituut }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $education->startdatum }} – {{ $education->einddatum ?? 'heden' }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $education->beschrijving }}</p>

                @if ($education->image())
                    <img src="{{ $education->imageUrl() }}" class="mt-4 w-32 h-auto rounded" />
                @endif

                <div class="mt-4 space-x-2">
                    <a href="{{ route('educations.edit', $education) }}" class="px-3 py-1 bg-green-400 text-white rounded hover:bg-blue-600">Bewerk</a>

                    <form action="{{ route('educations.destroy', $education) }}" method="POST" class="inline-block" onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Verwijder</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
