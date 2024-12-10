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

                <form id="mailing-form" action="{{ route('request_mailing_section') }}" method="post" class="subscribe-form">
                    @csrf
                    <x-ui.input label='Имя' id="name" type="text" name="name" required />
                    <x-ui.input label='Email' id="email" type="text" name="email" required />

                    <div class="subscribe-form__bottom">
                        <p>Оставляя заявку, вы даете согласие на обработку персональных данных.</p>
                      <x-ui.circle-btn type="submit" class="subscribe-form__btn">
                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0.00390625 5.5C0.951275 5.5 10.3986 5.5 15.0039 5.5M15.0039 5.5L10.2671 0.5M15.0039 5.5L10.2671 10.5" stroke="#6F6F6F"/>
                        </svg>
                      </x-ui.circle-btn>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
  document.querySelector('#mailing-form').addEventListener('submit', function (e) {
      e.preventDefault();
      fetch(this.action, {
          method: this.method,
          headers: {
              'X-CSRF-Token': document.querySelector('[name="_token"]').value
          },
          body: new FormData(this)
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              MicroModal.show('modal-success');
          } else {
              MicroModal.show('modal-error');
          }
      })
      .catch(error => console.error(error));
  });
</script>
