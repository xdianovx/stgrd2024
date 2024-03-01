@props(['tag'])

@switch($tag)
    @case('h1')
        <h1 {{ $attributes->class(['h1']) }}>{!! $slot !!}</h1>
    @break

    @case('h2')
        <h2 {{ $attributes->class(['h2']) }}>{!! $slot !!}</h2>
    @break

    @default
@endswitch
