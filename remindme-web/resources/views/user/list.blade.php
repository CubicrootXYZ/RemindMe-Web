@include('elements.header', ['title' => 'Users'])
@include('elements.menu')

@include('elements.visual.title', ['title' => 'Users', 'icon' => 'fas fa-users'])

<div class="container-fluid mt-4">


    <div class="accordion" id="accordionExample">

        @php $i=0; @endphp
        @foreach ($data as $user)
        @php $i++;@endphp
        @php $isAdmin = false;@endphp
        @foreach ($user['channels'] as $channel)
        @if ($channel['role'] == 'admin')
        @php $isAdmin=true; @endphp
        @break
        @endif
        @endforeach
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $i }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                    <b class="mx-1">{{ $i }} </b> {{ $user['user_id'] }}
                    <span class="badge bg-secondary mx-1 rounded-pill">{{ count($user['channels']) }}</span>
                    @if ($user['blocked'])
                    <span class="badge bg-danger mx-1 rounded-pill"><i class="fas fa-user-slash"></i></span>
                    @endif
                    @if($isAdmin)
                    <span class="badge bg-success mx-1 rounded-pill"><i class="fas fa-shield-alt"></i></span>
                    @endif
                </button>
            </h2>
            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-400 text-gray-500">
                    @if($user['blocked'])
                    <div class="alert alert-danger" role="alert">
                        This user is blocked and will not be able to interact with the bot!
                    </div>
                    <p>
                        <b>Comment: </b> {{ $user['comment'] }}
                    </p>
                    <form method="POST" action="/user/{{ urlencode($user['user_id']) }}">
                        @csrf
                        <input type="hidden" id="blocked" name="blocked" value="false">
                        <button type="submit" class="btn btn-success"><i class="far fa-check-circle"></i> Unblock</button>
                    </form>
                    @else
                    <p>
                        <b>Channels: </b>{{ count($user['channels']) }}
                    </p>
                    <p>
                        <b>Is Admin: </b>@if($isAdmin) <i class="fas fa-check text-green"></i> @else <i class="fas fa-times text-red"></i> @endif
                    </p>
                    <form method="POST" action="/user/{{ urlencode($user['user_id']) }}">
                        @csrf
                        <input type="hidden" id="blocked" name="blocked" value="true">
                        <div class="input-group mb-3">
                            <input type="text" id="block_reason" name="block_reason" class="form-control" placeholder="Block reason">
                            <button class="btn btn-danger" type="submit"><i class="far fa-times-circle"></i> Block</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@include('elements.footer')
