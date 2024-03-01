@props(['type', 'city', 'phones', 'address'])

<div class="contacts-item">
    <div class="container">
        <div class="contacts-item__top">
            <p class="contacts-item__type">{{ $type }}</p>

            <div class="contacts-item__title_wrap">
                <h3 class="contacts-item__title">{{ $city }}</h3>
                <div>pin</div>
            </div>
        </div>
    </div>

    <div class="hr"></div>

    <div class="contacts-item__info">
        <div class="container">
            <div class="contacts-item__contacts">
                <h4 class="contacts-item__contacts_title">Представительство <br> и отдел продаж</h4>

                <div class="contacts-item__contacts_info">
                    <div class="contacts-item__contacts_label">Адрес:</div>
                    <div class="contacts-item__contacts_col">
                        <p>{{ $address }}</p>
                    </div>
                </div>

                <div class="contacts-item__contacts_info">
                    <div class="contacts-item__contacts_label">Телефон:</div>
                    <div class="contacts-item__contacts_col">
                        <a href="tel:{{ $phones[0] }}">{{ $phones[0] }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hr"></div>
</div>
