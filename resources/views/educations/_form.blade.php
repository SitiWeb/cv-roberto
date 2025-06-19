<div class="space-y-4">
    <div>
        <label for="opleiding" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Opleiding</label>
        <input type="text" id="opleiding" name="opleiding" value="{{ old('opleiding', $education->opleiding ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div>
        <label for="instituut" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Instituut</label>
        <input type="text" id="instituut" name="instituut" value="{{ old('instituut', $education->instituut ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="startdatum" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Startdatum</label>
            <input type="date" id="startdatum" name="startdatum" value="{{ old('startdatum', $education->startdatum ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>

        <div>
            <label for="einddatum" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Einddatum</label>
            <input type="date" id="einddatum" name="einddatum" value="{{ old('einddatum', $education->einddatum ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
        </div>
    </div>

    <div>
        <label for="beschrijving" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Beschrijving</label>
        <textarea id="beschrijving" name="beschrijving" rows="4" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">{{ old('beschrijving', $education->beschrijving ?? '') }}</textarea>
    </div>

    <div>
        <label for="afbeelding" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Afbeelding (optioneel)</label>
        <input type="file" id="afbeelding" name="afbeelding" class="mt-1 block w-full text-sm text-gray-500 file:bg-gray-100 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 dark:file:bg-gray-800 dark:file:text-gray-300 dark:file:border-gray-600">
    </div>
</div>
