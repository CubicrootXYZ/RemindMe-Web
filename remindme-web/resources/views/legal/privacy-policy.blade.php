@include('elements.header')

@include('elements.visual.title', ['title' => 'Privacy Policy'])

@include('elements.visual.text-centered', [
    'heading' => 'Responsibility',
    'text' => 'Responsible for this page is the contact available in the inprint.'
])

@include('elements.visual.text-centered', [
    'heading' => 'What data we collect',
    'text' => '<p>We collect meta data related to the usage of our page. Access logs contain the request you made with your IP-adress.</p>
    <p>We collect content data required for the features of the page. You do not need to enter any of them but you will lose core functionality without.</p>'
])

@include('elements.visual.text-centered', [
    'heading' => 'Why we collect data',
    'text' => '<p>Meta data collections is required to keep our services running smoothly. Abuse and attacks can be mitigated and prevented by this data. (Art. 6 (1f) DSGVO)</p>
    <p>Additional content data is required to be able to provide some of the features. (Art. 6 (1a/b) DSGVO)</p>'
])

@include('elements.visual.text-centered', [
    'heading' => 'Your rights',
    'text' => 'According to law (DSGVO) you have the right to know what data we store and process. You have the right to request correction and deletion of your personal data. You also have the right to withdra any consents given to us at any time for the future. You further can complain to the regulatory authorities if you want to.'
])

@include('elements.footer')