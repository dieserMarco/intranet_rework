# Feuerwehr Intranet – Startprojekt

Ein bewusst einfaches PHP-Grundgerüst auf Basis der bisherigen Formular- und Verwaltungsvorlagen.

## Ordnerstruktur

- `public/` – Webroot mit Einstiegspunkten (`admin.php`, `form.php`)
- `views/` – Seiteninhalte je Layout-Typ
- `includes/` – wiederverwendbare Bausteine (`header.php`, `footer.php`, `sidebar.php`)
- `assets/css/` – gemeinsam strukturierte Styles
- `assets/js/` – kleines Theme-Script
- `config/` – DB-Konfiguration als Vorbereitung für MariaDB

## Vereinheitlichung

- Ein gemeinsamer Header (`includes/header.php`) wird von Admin- und Formularseite genutzt.
- Farben, Typografie, Buttons, Formulare und Tabellen kommen aus einem zentralen CSS-System (`assets/css/app.css`).
- Unterschiede liegen nur noch in den Layouts:
  - **Admin**: breiter Inhalt mit optionaler Sidebar.
  - **Formular**: schmaler und zentrierter Content.

## Starten

```bash
php -S 0.0.0.0:8000 -t public
```

Danach:
- `http://localhost:8000/admin.php`
- `http://localhost:8000/form.php`
