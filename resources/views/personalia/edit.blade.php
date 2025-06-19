<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Persoonlijk item bewerken</h2>
        <form method="POST" action="{{ route('personalia.update',  ['personalium' =>$personalia]) }}">
            @csrf
            @method('PUT')
            @include('personalia._form')
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Bijwerken</button>
        </form>
    </div>
</x-app-layout>
