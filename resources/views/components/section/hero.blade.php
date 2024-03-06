@props(['data'])

<section class="section hero">
  <div class="container">
    <div class="hero__top">
      <p>{{$data['text_left']}}</p>
      <p>Группа компаний «Стройград» начала свою историю в 2006 году со строительства многоквартирного жилого дома
        в г. Ставрополь. </p>
    </div>

    <div>
      <x-ui.title tag='h1' class="uppercase title-animation">
        <span>с</span>
        <span>т</span>
        <span>р</span>
        <span>о</span>
        <span>й</span>
        <span>г</span>
        <span>р</span>
        <span>а</span>
        <span>д</span>
      </x-ui.title>
    </div>
  </div>
</section>
