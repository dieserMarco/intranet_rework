<?php
/**
 * Gemeinsamer Header für Formular- und Verwaltungsseiten.
 * Erwartete Variablen vor include:
 * - $pageTitle (string)
 * - $pageSubtitle (string|null)
 * - $layoutType ('form'|'admin'|'token-generator')
 * - $basePath (string, optional) relativer Pfad zurück zum /public-Verzeichnis
 */
$pageTitle = $pageTitle ?? 'Feuerwehr Intranet';
$pageSubtitle = $pageSubtitle ?? '';
$layoutType = $layoutType ?? 'admin';
$basePath = isset($basePath) && $basePath !== '' ? rtrim($basePath, '/') . '/' : '';
?>
<header class="app-header">
  <div class="header-brand">
    <a class="brand-badge" href="<?php echo $basePath; ?>index.php" aria-label="Zur Startseite">
      <img src="<?php echo $basePath; ?>resources/logo.png" alt="FFWN Logo" onerror="this.style.display='none'">
    </a>
    <div class="brand-text">
      <p class="brand-title">Freiwillige Feuerwehr Wiener Neustadt</p>
      <p class="brand-subtitle"><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
  </div>

  <div class="header-actions">
    <nav class="header-nav" aria-label="Hauptnavigation">
      <a class="nav-link<?php echo $layoutType === 'admin' ? ' is-active' : ''; ?>" href="<?php echo $basePath; ?>admin.php">Verwaltung</a>
      <a class="nav-link<?php echo $layoutType === 'form' ? ' is-active' : ''; ?>" href="<?php echo $basePath; ?>form.php">Formular</a>
      <a class="nav-link<?php echo $layoutType === 'token-generator' ? ' is-active' : ''; ?>" href="<?php echo $basePath; ?>tokengenerator/">Token Generator</a>
    </nav>
    <button id="themeToggle" class="btn btn-ghost btn-small" type="button" aria-label="Theme wechseln">Theme</button>
  </div>
</header>
<?php if (!empty($pageSubtitle)): ?>
  <p class="page-subtitle"><?php echo htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>
