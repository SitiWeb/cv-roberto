@foreach ($education as $item)
    <hr role="presentation" class="w-full border-t border-zinc-950/10 dark:border-white/10 my-8">
    <div class="space-y-2">
        <div class="flex items-center gap-4">
            @if ($item->image())
                <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}"
                    class="w-12 h-12 rounded-md shadow-md object-contain bg-white dark:bg-gray-700 p-1">
            @endif
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">


                {{ $item->opleiding }}
                <span class="teitemxt-gray-500 dark:text-gray-400 font-normal">– {{ $item->instituut }}</span>

            </h3>
        </div>

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
