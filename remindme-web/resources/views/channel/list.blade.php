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
        @foreach ($data as $channel)
        @php $i++;@endphp
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $i }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                    <b class="mx-1">{{ $i }} </b>
                    <i class="fas mx-1 fa-user"></i> {{ $channel['user_id'] }} <i class="fas mx-1 fa-comments"></i>
                    {{ $channel['channel_id'] }}

                    @if ($channel['role'] == 'admin')
                    <span class="badge bg-success mx-1 rounded-pill"><i class="fas fa-shield-alt"></i></span>
                    @endif
                </button>
            </h2>
            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-400 text-gray-500">
                    <p>
                        <b>Created: </b> {{ $channel['created'] }}
                    </p>
                    <p>
                        <b>Role: </b> {{ $channel['role'] }}
                    </p>
                    <p>
                        <b>Daily Reminder: </b> @if($channel['daily_reminder'] != "") <i class="fas fa-check text-green"></i> @else <i class="fas fa-times text-red"></i> @endif
                    </p>
                    <p>
                        <b>Timezone: </b> {{ $channel['timezone'] }}
                    </p>

                    <form method="POST" action="/calendar/{{ urlencode($channel['id']) }}/patch">
                        @csrf
                        <div class="input-group mb-3">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-sync"></i> (Re)Set calendar token</button>
                        </div>
                    </form>

                    <form method="POST" action="/channel/{{ urlencode($channel['id']) }}/delete">
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

