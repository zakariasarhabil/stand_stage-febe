@component('mail::message')
# Introduction

Envoyée par : {{$mailrequest["fullname"]}}

message : {{$mailrequest["message"]}}

L'email de l'expéditeur  : {{$mailrequest["email"]}}



@component('mail::button', ['url' => 'http://localhost:4200/'])
Visiter le site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
