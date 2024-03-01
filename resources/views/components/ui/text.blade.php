@props(['size'])

@switch($size)
    @case('md')
        <p {{ $attributes->class(['text md']) }}>{!! $slot !!}</p>
    @break

    @case('sm')
        <p {{ $attributes->class(['text sm']) }}>{!! $slot !!}</p>
    @break

    @default
@endswitch
