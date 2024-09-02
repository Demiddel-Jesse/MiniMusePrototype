<div class="c-paint-block">
    <p class="c-paint-block__name">
        {{ $paintBlock->name }}
    </p>

    @foreach ($paintBlock->paint_block_lines as $paintBlockLine)

    @php
    $paintCount = count($paintBlockLine->paints)
    @endphp

    <div class="c-paint-block__line">
        <div class="c-paint-block__lineName">
            {{ $paintBlockLine->layer_name }}
        </div>
        <div class="c-paint-block__colors">
            @for($i = 0; $i < $paintCount; $i++) <span class="c-paint-block__color" style="background-color: {{ $paintBlockLine->paints[$i]->hexcode }}"></span>
                @endfor
        </div>
        <span class="c-paint-block__separator">|</span>
        @for($i = 0; $i < $paintCount; $i++) <a class="c-paint-block__paintName" href="/paints/{{ $paintBlockLine->paints[$i]->name  }}">{{ $paintBlockLine->paints[$i]->name }}</a>
            @if($i != $paintCount-1)
            <span>:</span>
            @endif @endfor
            <span class="c-paint-block__separator">|</span>
            <p class="c-paint-block__paintAmounts">
                @for($i = 0; $i < $paintCount; $i++) {{ $paintBlockLine->paints[$i]->pivot->amount }} @if($i !=$paintCount-1) : @endif @endfor </p>
    </div>

    @endforeach
</div>
