# Intranet Grundlage (UI + PHP DB)

## UI wiederverwenden
- Verwende `index.html` als Basistemplate für neue Seiten.
- Behalte `style.css` als zentrale Designsprache bei.
- `resources/intranet-theme.css` enthält globale Intranet-Tokens.

## PHP DB-Strategie
Nicht auf jeder Seite eigene DB-Logik bauen.

- `api/db.php` = **eine zentrale DB-Verbindung** (`getDbConnection()`).
- Pro Funktion eine kleine Endpoint-Datei (z. B. `api/save-member.php`).
- Jede Endpoint-Datei lädt nur `db.php` und enthält nur die jeweilige Aktion.

So bleibt alles wartbar und einheitlich.
