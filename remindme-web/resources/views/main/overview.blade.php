@include('elements.header')

<div class="container-fluid bg-blue text-lightblue text-center sm:rounded-lg">
    <div class="row justify-content-md-center align-items-center">
        <div class="col-md-3 p-4">
            <img class="center-item round border-white half-page" src="/android-chrome-512x512.png">
        </div>
        <div class="col-md-9">
            <h1 class="pt-4 bold">RemindMe</h1>
            <i class="pb-4">Your reminder and calendar bot!</i>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row m-3">
        @include('elements.visual.card', [
        'cssClasses' => 'col-md-3',
        'title' => [
        'text' => 'Total Users',
        'class' => 'uppercase',
        ],
        'badge' => [
        'class' => 'bg-primary',
        'text' => $usersTotal,
        ],
        ])
        @include('elements.visual.card', [
        'cssClasses' => 'col-md-3',
        'title' => [
        'text' => 'Admin Users',
        'class' => 'uppercase',
        ],
        'badge' => [
        'class' => 'bg-primary',
        'text' => $usersAdmin,
        ],
        ])
        @include('elements.visual.card', [
        'cssClasses' => 'col-md-3',
        'title' => [
        'text' => 'Total Channels',
        'class' => 'uppercase',
        ],
        'badge' => [
        'class' => 'bg-primary',
        'text' => $channelsTotal,
        ],
        ])
    </div>
</div>

@include('elements.footer')
