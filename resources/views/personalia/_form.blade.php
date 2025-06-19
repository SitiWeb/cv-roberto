<div class="space-y-6">
    <div>
        <label for="key" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Label (bv. Geboortedatum)</label>
        <input type="text" id="key" name="key" value="{{ old('key', $personalia->key ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div>
        <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Waarde (bv. 12 maart 1988)</label>
        <input type="text" id="value" name="value" value="{{ old('value', $personalia->value ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div>
        <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Font Awesome Icon (optioneel)</label>
        <input type="text" id="icon" name="icon" value="{{ old('icon', $personalia->icon ?? '') }}" class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded" placeholder="fa-solid fa-user">
        <p class="text-xs text-gray-500 mt-1">Gebruik een Font Awesome class zoals <code>fa-solid fa-user</code>.</p>
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" id="hidden" name="hidden" value="1" {{ old('hidden', $personalia->hidden ?? false) ? 'checked' : '' }} class="form-checkbox text-blue-600">
        <label for="hidden" class="text-gray-700 dark:text-gray-200">Verbergen voor publiek</label>
    </div>
</div>
