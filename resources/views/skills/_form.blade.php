<div class="space-y-6">
        <div>
    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Type</label>
    <select id="type" name="type" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        <option value="rating" @selected(old('type', $skill->type ?? 'rating') === 'rating')>Rating</option>
        <option value="tag" @selected(old('type', $skill->type ?? '') === 'tag')>Tag</option>
        <option value="other" @selected(old('type', $skill->type ?? '') === 'other')>Overig</option>
    </select>
</div>
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titel</label>
        <input type="text" id="title" name="title" value="{{ old('title', $skill->title ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div id="description-field">

        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beschrijving</label>
        <textarea id="description" name="description" rows="4" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">{{ old('description', $skill->description ?? '') }}</textarea>
    </div>

    <div id="rating-field">
    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beoordeling (1–10)</label>
    <input type="number" id="rating" name="rating" min="1" max="10" value="{{ old('rating', $skill->rating ?? 5) }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
</div>

<div id="image-field">
    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Afbeelding</label>
    <input type="file" id="image" name="image" class="mt-1 text-gray-800 dark:text-gray-100">
    @if (!empty($skill) && $skill->getFirstMediaUrl('image'))
        <img src="{{ $skill->getFirstMediaUrl('image') }}" class="mt-2 max-w-xs rounded">
    @endif
</div>

</div>
@push('scripts')

<script>
    function toggleFields() {
        const type = document.getElementById('type').value;

        // Rating alleen tonen bij type = rating
        document.getElementById('rating-field').style.display = (type === 'rating') ? 'block' : 'none';

        // Image tonen bij rating en other
        document.getElementById('image-field').style.display = (type === 'rating' || type === 'other') ? 'block' : 'none';

        // Beschrijving alleen tonen bij rating
        document.getElementById('description-field').style.display = (type === 'rating') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('type').addEventListener('change', toggleFields);
        toggleFields(); // initial
    });
</script>

@endpush
