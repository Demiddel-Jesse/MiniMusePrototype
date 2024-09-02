<x-app-layout>
    {{ $paint->name }}
    {{ $paint->hexcode }}

    <div>
        @foreach ($paint->paints as $comparePaint)
        <div>
            <span>{{ $comparePaint->name }}</span>
            ||
            <span>{{ $comparePaint->paint_brand->name }}</span>
            ||
            @php
            $paintDelta = $comparePaint->pivot->delta;
            $color='#000000'
            @endphp

            @switch(true)
            @case($paintDelta < 2.3) @php $color='#3C78D8' @endphp @break @case($paintDelta> 2.3 && $paintDelta < 4) @php $color='#6AA84F' @endphp @break @case($paintDelta> 4 && $paintDelta < 6) @php $color='#E69138' @endphp @break @case($paintDelta> 6 && $paintDelta < 8) @php $color='#CC0000' @endphp @break @case($paintDelta < 8) @php $color='#000000' @endphp @break @default @php $color='#000000' @endphp @endswitch <span>{{ $comparePaint->pivot->delta }} {{ $color }}</span>
        </div>
        @endforeach
    </div>

</x-app-layout>
