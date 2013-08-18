<!DOCTYPE html>
<html lang="de-DE">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Passwort vergessen!</h2>
		<p>Hallo,</p>

		<p>du hast dein Passwort bei Amalive.de vergessen?<br><br>

		Kein Problem klick unten auf den Link und gib dein neues Passwort ein.</p>
		<div>
			Hier der Link um dein Passwort zurückzusetzen: {{ URL::to('password/reset', array($token)) }}.
		</div>
		<p>Dein Amalive.de Team</p>
	</body>
</html>