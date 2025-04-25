@component('mail::message')
# Consultation Terminée

<p>Bonjour,</p>

<p>Nous vous informons que la consultation suivante a été terminée :</p>

<p><strong>Nom :</strong> {{ $consultation->name }}</p>
<p><strong>Email :</strong> {{ $consultation->email }}</p>
<p><strong>Téléphone :</strong> {{ $consultation->telephone }}</p>
<p>Merci pour votre confiance. Nous vous souhaitons une excellente journée ! 😄</p>

<p>Bon courage, et excellente journée à vous ! 😄</p>
@endcomponent
 
