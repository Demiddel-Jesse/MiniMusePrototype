<x-app-layout>
    {{ $paint->name }}

    <div>
        @foreach ($paint->paints as $comparePaint)
        <div>
            <a href="/paints/{{ $comparePaint->name }}">{{ $comparePaint->name }}</a>
            ||
            <span>{{ $comparePaint->paint_brand->name }}</span>
            ||
            @php
            $paintDelta = $comparePaint->pivot->delta;
            $color='#000000'
            @endphp

            @switch(true)
            @case($paintDelta < 2.3) @php $color='#3C78D8' @endphp @break @case($paintDelta> 2.3 && $paintDelta < 4) @php $color='#6AA84F' @endphp @break @case($paintDelta> 4 && $paintDelta < 6) @php $color='#E69138' @endphp @break @case($paintDelta> 6 && $paintDelta < 8) @php $color='#CC0000' @endphp @break @case($paintDelta < 8) @php $color='#000000' @endphp @break @default @php $color='#000000' @endphp @endswitch <span style="color: {{ $color }}; background-color: #ffffff; padding:0.2rem;">{{ $comparePaint->pivot->delta }}</span>
        </div>
        @endforeach
    </div>

</x-app-layout>
