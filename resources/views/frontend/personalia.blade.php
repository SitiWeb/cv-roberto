<ul class="space-y-4">
    @foreach($personalia as $item)
        <li class="flex items-start gap-4">
            <i class="fa fa-{{ $item->icon }} text-blue-600 text-xl mt-1"></i>

            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ ucfirst($item->key) }}</p>

                @if($item->hidden)
                    @php
    // 1. Vervang <br>-tags door spaties
    $cleanValue = str_ireplace(['<br>', '<br/>', '<br />'], ' ', $item->value);

    // 2. Verwijder alle andere HTML-tags
    $cleanValue = strip_tags($cleanValue);

    // 3. Maskeren vanaf derde teken, spaties zichtbaar houden
    $masked = '';
    $chars = mb_str_split($cleanValue); // Split veilig per karakter

    foreach ($chars as $i => $char) {
        if ($i < 2) {
            $masked .= $char;
        } elseif ($char === ' ') {
            $masked .= ' ';
        } else {
            $masked .= '*';
        }
    }
@endphp

<button
    class="text-gray-500 text-left dark:text-gray-400 hover:text-gray-800 dark:hover:text-white font-mono"
    onclick="revealValue({{ $item->id }}, this)"
    data-placeholder="{{ $masked }}"
>
    {{ $masked }}
</button>



                @else
                    <p class="text-gray-800 dark:text-white">{{ $item->value }}</p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
<script>
function revealValue(id, el) {
    fetch(`/getPersonalia/${id}`)
        .then(res => res.json())
        .then(data => {
            el.innerHTML = data.value; // Gebruik innerHTML om HTML-opmaak te ondersteunen
            el.classList.remove('hover:text-gray-800', 'dark:hover:text-white');
            el.classList.add('text-gray-800', 'dark:text-white');
            el.removeAttribute('onclick');
        })
        .catch(() => {
            el.textContent = '[mislukt ophalen]';
        });
}
</script>
