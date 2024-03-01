@props(['size'])

@switch($size)
    @case('md')
        <p {{ $attributes->class(['text md']) }}>{!! $slot !!}</p>
    @break

    @case(2)
    @break

    @default
@endswitch
