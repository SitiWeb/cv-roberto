<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="werkgever" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Werkgever</label>
            <input type="text" id="werkgever" name="werkgever" value="{{ old('werkgever', $workExperience->werkgever ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>

        <div>
            <label for="functie" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Functie</label>
            <input type="text" id="functie" name="functie" value="{{ old('functie', $workExperience->functie ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="startdatum" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Startdatum</label>
            <input type="date" id="startdatum" name="startdatum" value="{{ old('startdatum', $workExperience->startdatum ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>

        <div id="einddatum-container">
            <label for="einddatum" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Einddatum</label>
            <input type="date" id="einddatum" name="einddatum" value="{{ old('einddatum', $workExperience->einddatum ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>
    </div>

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="huidige" id="huidige" value="1" class="form-checkbox text-blue-600"
                onchange="toggleEinddatum()" {{ old('huidige', empty($workExperience->einddatum)) ? 'checked' : '' }}>
            <span class="ml-2 text-gray-700 dark:text-gray-300">Huidige werkgever</span>
        </label>
    </div>

    <div>
        <label for="beschrijving" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beschrijving</label>
        <textarea id="beschrijving" name="beschrijving" rows="4" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">{{ old('beschrijving', $workExperience->beschrijving ?? '') }}</textarea>
    </div>

    <div>
        <label for="afbeelding" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Afbeelding</label>
        <input type="file" id="afbeelding" name="afbeelding" class="mt-1 text-gray-800 dark:text-gray-100">
        @if (!empty($workExperience) && $workExperience->getFirstMediaUrl('afbeelding'))
            <img src="{{ $workExperience->getFirstMediaUrl('afbeelding') }}" class="mt-2 max-w-xs rounded">
        @endif
    </div>
</div>

<script>
    function toggleEinddatum() {
        const checkbox = document.getElementById('huidige');
        const einddatumContainer = document.getElementById('einddatum-container');
        if (checkbox.checked) {
            einddatumContainer.style.display = 'none';
        } else {
            einddatumContainer.style.display = 'block';
        }
    }

    // Init bij load
    document.addEventListener('DOMContentLoaded', function () {
        toggleEinddatum();
    });
</script>
