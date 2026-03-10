<?php
$pageTitle = 'Mitgliederanmeldung';
$pageSubtitle = 'Bitte alle Felder sorgfältig ausfüllen.';
$layoutType = 'form';
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $pageTitle; ?> · FFWN</title>
  <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body class="theme-dark">
  <div class="app-bg"></div>

  <div class="shell shell-form">
    <?php include __DIR__ . '/../../includes/header.php'; ?>

    <main class="layout-form">
      <section class="card form-card">
        <div class="card-head">
          <h1>Mitgliederanmeldung</h1>
          <p class="text-muted">Pflichtfelder sind mit <span class="text-danger">*</span> markiert.</p>
        </div>

        <form class="form-grid" action="#" method="post">
          <div class="field">
            <label for="vorname">Vorname *</label>
            <input class="input" id="vorname" name="vorname" required>
          </div>
          <div class="field">
            <label for="nachname">Nachname *</label>
            <input class="input" id="nachname" name="nachname" required>
          </div>
          <div class="field field-span-2">
            <label for="adresse">Adresse</label>
            <input class="input" id="adresse" name="adresse">
          </div>
          <div class="field">
            <label for="telefon">Telefon</label>
            <input class="input" id="telefon" name="telefon" type="tel">
          </div>
          <div class="field">
            <label for="mail">E-Mail *</label>
            <input class="input" id="mail" name="mail" type="email" required>
          </div>

          <div class="actions">
            <button class="btn btn-ghost" type="reset">Zurücksetzen</button>
            <button class="btn btn-primary" type="submit">Absenden</button>
          </div>
        </form>

        <p class="notice notice-info">Hinweis: Dieses Formular ist als Startvorlage gedacht und kann direkt mit PHP/MariaDB erweitert werden.</p>
      </section>
    </main>

    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </div>

  <script src="../assets/js/theme.js"></script>
</body>
</html>
