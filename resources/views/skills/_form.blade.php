<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titel</label>
        <input type="text" id="title" name="title" value="{{ old('title', $skill->title ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beschrijving</label>
        <textarea id="description" name="description" rows="4" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">{{ old('description', $skill->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beoordeling (1–10)</label>
        <input type="number" id="rating" name="rating" min="1" max="10" value="{{ old('rating', $skill->rating ?? 5) }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Afbeelding</label>
        <input type="file" id="image" name="image" class="mt-1 text-gray-800 dark:text-gray-100">
        @if (!empty($skill) && $skill->getFirstMediaUrl('image'))
            <img src="{{ $skill->getFirstMediaUrl('image') }}" class="mt-2 max-w-xs rounded">
        @endif
    </div>
</div>
