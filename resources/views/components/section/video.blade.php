<section class="section showreel" data-cursor-text="Play!">
    {{-- <img src="{{ asset('img/video/bg.jpg') }}" alt=""> --}}
    <video autoplay loop playsinline muted class="showreel-short">
        <source src="{{ asset('video/1.mp4') }}" type="video/mp4" />
    </video>


</section>
<div class="showreelmodal">
    <video autoplay loop playsinline muted class="showreel-short" data-cursor-text="Close!">
        <source src="{{ asset('video/2.webm') }}" type="video/webm" />
    </video>
</div>
