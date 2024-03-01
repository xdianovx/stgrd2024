@props(['label', 'id'])

<div class="form-input">
    <input {{ $attributes }} id={{ $id }}>
    <label for="{{ $id }}">{{ $label }}</label>
</div>
