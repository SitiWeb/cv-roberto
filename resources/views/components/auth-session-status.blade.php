@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-sitiweb-green']) }}>
        {{ $status }}
    </div>
@endif
