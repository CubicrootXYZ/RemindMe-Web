<div class="card m-1 bg-gray-400 {{ $cssClasses }}">
    @isset($title)
        <h5 class="card-header text-gray-700 {{ $title['class'] }}">{!! $title['text'] !!}</h5>
    @endisset
    <div class="card-body">
        @isset($paragraphs)
            @foreach ($paragraphs as $p)
                <p class="card-text text-gray-600">{!! $p !!}</p>

            @endforeach
        @endisset
        @isset($badge)
            <span class="badge {{ $badge['class'] }}"> {{ $badge['text'] }} </span>
        @endisset
    </div>
</div>
