<body>
	<h2>Ticketanfrage bei Amalive.de</h2>

	<h3>Hallo {{ $name }}</h3>

	<p>vielen Dank für deine Anfrage von {{  $ticketAmount }} Tickets</p>

	@if (isset($message))
	<p>Deine Nachricht an uns:</p>
	<p>"{{ $text }}"</p>

	@endif

	<p>Wir werden uns umgehend mit allen weitern Infos bei dir melden. <br>

	Nach der Bearbeitung deiner Anfrage bekommst du eine E-Mail mit der Reservierungsbestätigung, 

	dem Preis, der Artikelnummer und einer Bankverbindung. Sobald das Geld auf dem angegebenen 

	Konto eingegangen ist, bekommst du deine elektronischen Tickets via E-Mail. Jedes Ticket hat einen 

	einmaligen QR-Code. <br>

	Die Tickets kannst du ausdrucken oder per Smartphone am Eingang vorzeigen.</p>

	<p>Dein Amalive.de Team</p>
	


</body>