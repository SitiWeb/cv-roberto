@if (isset($skills['tag']))
    <div class="flex flex-wrap gap-2">
        @foreach ($skills['tag'] as $skill)
            <span
                class="inline-block hover:scale-105 transition hover:shadow-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 text-sm px-3 py-1 rounded">

                {{ $skill->title }}
            </span>
        @endforeach
    </div>
@endif

@if (isset($skills['rating']))

    @foreach ($skills['rating'] as $skill)
        <hr role="presentation" class="w-full border-t border-zinc-950/10 dark:border-white/10 my-8">
        <div class="space-y-4 flex flex-col gap-4">

            <div class="flex items-center gap-4">
                @if ($skill->image())
                    <img src="{{ $skill->imageUrl() }}" alt="{{ $skill->title }}"
                        class="w-12 h-12 rounded-md shadow-md object-contain bg-white dark:bg-gray-700 p-1 hover:scale-125 transition hover:shadow-lg">
                @endif
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $skill->title }}
                </h3>
            </div>

            {{-- Rating bar --}}
            <div>
                <div class="text-sm text-gray-600 dark:text-gray-300 italic mb-1">
                    Beoordeling: {{ $skill->rating }}/10
                </div>
                <div class="w-full h-3 bg-gray-300 dark:bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full bg-sitiweb-green transition-all duration-300"
                        style="width: {{ $skill->rating * 10 }}%">
                    </div>
                </div>
            </div>

            @if ($skill->description)
                <div class="text-gray-800 dark:text-gray-100 prose dark:prose-invert max-w-prose text-sm">
                    {!! nl2br(e($skill->description)) !!}
                </div>
            @endif

        </div>
    @endforeach

@endif


@if (isset($skills['other']))
    <div class="flex flex-wrap gap-4 mt-8">
        @foreach ($skills['other'] as $skill)
            <div class="flex flex-col items-center w-16">

                @if ($skill->getFirstMediaUrl('image'))
                    <img src="{{ $skill->getFirstMediaUrl('image') }}" alt="{{ $skill->title }}"
                        class="w-10 h-10 object-contain mb-1 hover:scale-125 transition hover:shadow-lg" >
                @endif
                <span class="text-xs text-center text-gray-700 dark:text-gray-300">{{ $skill->title }}</span>
            </div>
        @endforeach
    </div>
@endif
