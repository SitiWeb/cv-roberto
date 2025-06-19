@foreach ($education as $item)
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow space-y-2">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
            {{ $item->opleiding }}
            <span class="teitemxt-gray-500 dark:text-gray-400 font-normal">– {{ $item->instituut }}</span>
        </h3>

        <p class="text-sm text-gray-600 dark:text-gray-300 italic">
            {{ \Carbon\Carbon::parse($item->startdatum)->translatedFormat('Y') }}
            –
            {{ $item->einddatum ? \Carbon\Carbon::parse($item->einddatum)->translatedFormat('Y') : 'heden' }}
        </p>

        <div class="text-gray-800 dark:text-gray-100 prose dark:prose-invert max-w-none">
            {!! nl2br(e($item->beschrijving)) !!}
        </div>
    </div>
@endforeach
