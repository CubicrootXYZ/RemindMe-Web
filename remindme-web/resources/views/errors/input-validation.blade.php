@include('elements.header')


<div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
            <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                Input validation failed
            </div>

            <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                For field "{{ $field }}" @if($message != "") with <i>{{ $message }}</i>@endif
            </div>
        </div>
    </div>
</div>

@include('elements.footer')
