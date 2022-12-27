@include('elements.header', ['title' => 'Users'])
@include('elements.menu')

@include('elements.visual.title', ['title' => 'Channels', 'icon' => 'fas fa-comments'])



<script>
    function setAction() {
        var action_src = "/user/" + document.getElementsByName("user_id")[0].value;
        var your_form = document.getElementById('gen_block');
        your_form.action = action_src;
    }

</script>

<div class="container-fluid mt-4">

    <div class="accordion" id="accordionExample">

        @php $i=0; @endphp
        @foreach ($data['resources']['data'] as $resource)
        @php $i++;@endphp
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $i }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                    <b class="mx-1">{{ $resource['id'] }} </b> 
                    <span class="badge bg-primary mx-1 rounded-pill">{{ $resource['type'] }}</span> 
                    {{ $resource['url'] }}
                </button>
            </h2>
            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-400 text-gray-500">
                    <form method="POST" action="/channel/{{ urlencode($data['channelID']) }}/thirdpartyresources/{{ urlencode($resource['id']) }}/delete">
                        @csrf
                        <div class="input-group mb-3">
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@include('elements.footer')

