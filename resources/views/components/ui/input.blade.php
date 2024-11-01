@props(['label', 'id', 'name'])

<div class="form-input">
    <input {{ $attributes }} id={{ $id }} name="{{ $name }}">
    <label for="{{ $id }}">{{ $label }}</label>
</div>
