@props(['title', 'site_url', 'site_title', 'year', 'address', 'phone', 'email', 'text'])

<div class="enterprise-item">
    <div class="container">
        <div class="enterprise-item__wrap">
            <div class="enterprise-item__tab">
                <h3 class="enterprise-item__title">{{ $title }}</h3>
                <div class="enterprise-item__link">
                    @if ($site_url)
                        <x-ui.link href="{{ $site_url }}" target="_blank">{{ $site_url }}</x-ui.link>
                    @else
                        <p>Скоро</p>
                    @endif
                </div>
                <p class="enterprise-item__site-title">{!! $site_title !!}</p>
                <p class="enterprise-item__year">{{ $year }}</p>
            </div>

            <div class="enterprise-item__content">
                <div class="enterprise-item__inner">
                    <div class="enterprise-item__info">
                        <div class="enterprise-item__contact">
                            <h5>Адрес</h5>
                            <p>{!! $address !!}</p>
                        </div>

                        <div class="enterprise-item__contact">
                            <h5>Контакты</h5>

                            <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </div>
                    </div>
                    <div>{!! $text !!}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="hr"></div>
</div>
