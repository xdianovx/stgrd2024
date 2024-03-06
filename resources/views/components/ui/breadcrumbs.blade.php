<section>
    <div class="container">
        <div class="breadcrumbs">
            @unless ($breadcrumbs->isEmpty())
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                        <div class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></div>
                        <div class="breadcrumb-box"></div>
                    @else
                        <div class="breadcrumb-item active">{{ $breadcrumb->title }}</div>
                    @endif
                @endforeach
            @endunless
        </div>
    </div>
</section>
