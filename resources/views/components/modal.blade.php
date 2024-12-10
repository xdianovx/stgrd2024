<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">
            <div class="modal__top">
                <p class="modal__title">
                    Оставьте заявку
                </P>
                <button class="modal__close" data-micromodal-close>
                    <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24"
                        fill="none">
                        <script xmlns=""
                            src="chrome-extension://hoklmmgfnpapgjgcpechhaamimifchmp/frame_ant/frame_ant.js" />
                        <script xmlns="" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                            fill="#0F1729" />
                        <script xmlns="" />
                    </svg></button>
            </div>


            <main class="modal__content" id="modal-1-content">
                <form id="consultation-form" action="{{ route('request_consultation_section') }}" method="post" class="modal__form">
                    @csrf
                    <div class="form-input">
                        <input required="required" name="name" type="text" id="name">
                        <label for="name">Имя</label>
                    </div>

                    <div class="form-input">
                        <input required="required" name="phone" type="tel" id="phone">
                        <label for="phone">Телефон</label>
                    </div>
                    <button class="modal__btn" type="submit">Отправить</button>
                </form>
            </main>
            <script>
              document.querySelector('#consultation-form').addEventListener('submit', function (e) {
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
                          MicroModal.close('modal-1');
                          MicroModal.show('modal-success');
                      } else {
                        MicroModal.close('modal-1');
                        MicroModal.show('modal-error');
                      }
                  })
                  .catch(error => console.error(error));
              });
            </script>
        </div>
    </div>
</div>


<div class="modal micromodal-slide" id="modal-success" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-success-title">
          <header class="modal__header">
              <h2 class="modal__title" id="modal-success-title">Успешно отправлено</h2>
              <button class="modal__close" data-micromodal-close>
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24"
                    fill="none">
                    <script xmlns=""
                        src="chrome-extension://hoklmmgfnpapgjgcpechhaamimifchmp/frame_ant/frame_ant.js" />
                    <script xmlns="" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                        fill="#0F1729" />
                    <script xmlns="" />
                </svg></button>          </header>
          <main class="modal__content" id="modal-success-content">
              <p>Ваша заявка успешно отправлена. Мы с вами свяжемся в ближайшее время.</p>
          </main>
      </div>
  </div>
</div>
<div class="modal micromodal-slide" id="modal-error" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-error-title">
          <header class="modal__header">
              <h2 class="modal__title" id="modal-error-title">Ошибка отправки</h2>
              <button class="modal__close" data-micromodal-close>
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24"
                    fill="none">
                    <script xmlns=""
                        src="chrome-extension://hoklmmgfnpapgjgcpechhaamimifchmp/frame_ant/frame_ant.js" />
                    <script xmlns="" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                        fill="#0F1729" />
                    <script xmlns="" />
                </svg></button>          </header>
          <main class="modal__content" id="modal-error-content">
              <p>Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.</p>
          </main>
      </div>
  </div>
</div>
