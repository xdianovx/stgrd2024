@props(['list'])

<select {{ $attributes->class(['dropdown']) }} {{ $attributes }}>
    @foreach ($list as $item)
        <option value="">{{ $item['title'] }}</option>
    @endforeach
</select>
