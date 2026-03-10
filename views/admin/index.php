<?php
$pageTitle = 'Mitgliederverwaltung';
$pageSubtitle = 'Suche, bearbeite Stammdaten und prüfe Kurse.';
$layoutType = 'admin';
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

  <div class="shell shell-admin">
    <?php include __DIR__ . '/../../includes/header.php'; ?>

    <main class="layout-admin">
      <?php include __DIR__ . '/../../includes/sidebar.php'; ?>

      <section class="content-area">
        <article class="card">
          <div class="card-head">
            <h1>Mitgliederliste</h1>
            <div class="inline-actions">
              <input class="input" type="search" placeholder="Mitglied suchen...">
              <button class="btn btn-primary" type="button">Suchen</button>
            </div>
          </div>

          <div class="table-wrap">
            <table class="table">
              <thead>
                <tr>
                  <th>Nr.</th>
                  <th>Name</th>
                  <th>Dienstgrad</th>
                  <th>Status</th>
                  <th>Aktion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1001</td>
                  <td>Max Mustermann</td>
                  <td>LM</td>
                  <td><span class="badge badge-ok">Aktiv</span></td>
                  <td><button class="btn btn-ghost btn-small">Details</button></td>
                </tr>
                <tr>
                  <td>1002</td>
                  <td>Erika Beispiel</td>
                  <td>OFM</td>
                  <td><span class="badge badge-warning">Inaktiv</span></td>
                  <td><button class="btn btn-ghost btn-small">Details</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </article>
      </section>
    </main>

    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </div>

  <script src="../assets/js/theme.js"></script>
</body>
</html>
