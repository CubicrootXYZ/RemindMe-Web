<div class="{{ $cssClasses }}">
    <div class="card bg-gray-400 m-1">
        @isset($title)
            <h5 class="card-header text-gray-700 {{ $title['class'] }}">{!! $title['text'] !!}</h5>
        @endisset
        <div class="card-body row justify-content-space-between align-items-center">
            @isset($paragraphs)
                @foreach ($paragraphs as $p)
                    <p class="card-text text-gray-600">{!! $p !!}</p>

                @endforeach
            @endisset
            @isset($badge)
                <div class="col-auto text-big">
                    <span class="badge {{ $badge['class'] }}"> {{ $badge['text'] }} </span>
                </div>
            @endisset
            @isset($icon)
                <div class="col-auto">
                    <i class="{{ $icon }} fa-3x"></i>
                </div>
            @endisset
        </div>
    </div>
</div>
