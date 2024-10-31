<section class="life">
    <div class="container">
        <div class="life__wrap">
            <h2 class="life__wrap_title">{{ $item->title_left }}</h2>
        </div>

        <div class="life__wrap-cards">
            @foreach ($item->life_stroygrad_cards->sortBy('id') as $life_stroygrad_card)
                <div class="life-card" data-scroll data-speed='1.2'>
                    <div class="life-card__image">
                        <img src="{{ Storage::url($life_stroygrad_card->image) }}" alt="">
                    </div>

                    <p class="life-card__text">{{ $life_stroygrad_card->description }}</p>
                </div>
            @endforeach
        </div>
        <div class="life__wrap-cards-stop"></div>
    </div>
</section>
