<x-app-layout>
    <div class="p-6 space-y-10">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Vaardigheden</h2>

        <a href="{{ route('skills.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Nieuwe vaardigheid
        </a>

        @php
            $groupedSkills = $skills->groupBy('type');
        @endphp

        {{-- Rating --}}
        @if($groupedSkills->has('rating'))
            <div>
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200 mb-4">Ratings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($groupedSkills['rating'] as $skill)
                        @include('frontend._card', ['skill' => $skill])
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Tags --}}
        @if($groupedSkills->has('tag'))
            <div>
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200 mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($groupedSkills['tag'] as $skill)
                        <span class="inline-block bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-100 text-sm px-3 py-1 rounded">
                            {{ $skill->title }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Overig --}}
        @if($groupedSkills->has('other'))
            <div>
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200 mb-4">Overige vaardigheden</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($groupedSkills['other'] as $skill)
                        @include('frontend._card', ['skill' => $skill])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
