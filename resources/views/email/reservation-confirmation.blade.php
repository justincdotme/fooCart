<h1>Reservation Confirmation</h1>
<h2>Thank you for your reservation, {{ $user->first_name }}.</h2>
<h3>Details</h3>
Check In: {{ $reservation->formatted_date_start }} <br>
Check Out: {{ $reservation->formatted_date_end }} <br>
Length of Stay: {{ $reservation->getLengthOfStay() }} days. <br>
Reservation Number: {{ $reservation->id }}. <br>
<h3>Property</h3>
Name: {{ $property->name }}
Address: {!!  nl2br($property->formatted_address) !!}