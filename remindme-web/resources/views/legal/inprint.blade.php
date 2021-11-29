@include('elements.header')

@include('elements.visual.title', ['title' => 'Inprint'])

@include('elements.visual.text-centered', [
    'heading' => 'Legal Disclosure',
    'text' => '<p>Responsible for this page:<p><p>'
        .env('INPRINT_NAME', '')
        .'</p><p>'
        .env('INPRINT_STREET', '')
        .'<br>'
        .env('INPRINT_CITY', '')
        .'</p><p>'
        .env('INPRINT_PHONE', '')
        .'<br>'
        .env('INPRINT_MAIL', '')
        .'</p><p>This page is made very carefuly. At the point of creating the page we were not aware of any unwanted or unallowed content or links to such content. In any case of bugs or legal issues, please reach out to us.</p>'
])

@include('elements.visual.text-centered', [
    'heading' => 'Attribution <i class="fas fa-heart" style="color: red;"></i>',
    'text' => '<p>This page would not be possible to provide without the help of other projects and other peoples time and efforts. We would like to thank everyone and especially those projects:<p>
        <ul>
            <li><a href="https://fontawesome.com">Fontawesome</a></li>
            <li><a href="https://laravel.com/">Laravel</a></li>
            <li><a href="https://getbootstrap.com">Bootstrap</a></li>
            <li><a href="https://normalize.css">Normalize.css</a></li>
        </ul>'
])

@include('elements.footer')