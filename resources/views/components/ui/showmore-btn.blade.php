<div {{ $attributes->class(['showmore-btn']) }}>
    <p>
        {{ $slot }}
    </p>

    <div class="showmore-plus">
        <span class="vertical"></span>
        <span class="horizontal"></span>
    </div>
</div>
