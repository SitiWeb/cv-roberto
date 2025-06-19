{{-- resources/views/work_experiences/edit.blade.php --}}
<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Werkervaring Bewerken</h2>
        <form method="POST" action="{{ route('work-experiences.update', $workExperience) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('work_experiences._form')
            <x-primary-button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Bijwerken</x-primary-button>
        </form>
    </div>
</x-app-layout>
