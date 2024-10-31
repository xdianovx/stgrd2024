@props(['size'])

@switch($size)
    @case('md')
        <div {{ $attributes->class(['text md']) }}>{!! $slot !!}</div>
    @break

    @case('sm')
        <div {{ $attributes->class(['text sm']) }}>{!! $slot !!}</div>
    @break

    @default
@endswitch
