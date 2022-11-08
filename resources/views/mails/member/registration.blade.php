@component('mail::message')
<h1>Anmeldung Mitgliedschaft</h1>
<div>
Vorname: {{$member['firstname']}}<br>
Name: {{$member['name']}}<br>
Adresse: {{$member['address']}}<br>
PLZ / Ort: {{$member['zip']}} {{$member['city']}}<br>
E-Mail: {{$member['email']}}<br>
Telefon: {{$member['phone']}}<br>
Typ: {{ucfirst($member['type'])}}<br>
</div>
@endcomponent