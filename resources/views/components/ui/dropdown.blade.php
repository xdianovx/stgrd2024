@props(['list', 'label' => '', 'placeholder' => ''])

{{-- <select {{ $attributes->class(['dropdown', 'js-choice']) }} {{ $attributes }}>
    @foreach ($list as $item)
        <option value="">{{ $item['title'] }}</option>
    @endforeach
</select> --}}


<div class="select ">
    <div class="select-title">
        <p>{{ $placeholder }}</p>

        <svg class="select-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none" stroke="#1F1F1F"
            xmlns="http://www.w3.org/2000/svg">
            <line x1="1.11359" y1="0.935151" x2="9.74567" y2="9.27105" />
            <line x1="9.08173" y1="9.27011" x2="17.7138" y2="0.934211" />
        </svg>
    </div>
    <div class="select-list ">
        <div class="select-list__wrap">

            @foreach ($list as $item)
                <div class="select-item">{{ $item['title'] }}</div>
            @endforeach
        </div>
    </div>
</div>
