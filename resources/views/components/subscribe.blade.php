<section class="subscribe-section">
    <div class="container">
        <div class="subscribe-section__wrap">
            <div>
                <x-ui.suptitle>Подписка</x-ui.suptitle>
            </div>
            <div>
                <h2 class="subscribe-section__title">
                    Подпишитесь на рассылку, что-бы получать на почту актуальные новости и акции от компании!
                </h2>

                <form action="" class="subscribe-form">
                    <x-ui.input label='Имя' id="name" type="text" required />
                    <x-ui.input label='Email' id="email" type="text" required />

                    <div class="subscribe-form__bottom">
                        <p>Оставляя заявку, вы даете согласие на обработку персональных данных.</p>
                        <button type="submit" class="subscribe-form__btn"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
