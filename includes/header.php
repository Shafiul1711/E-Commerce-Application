<?php session_start(); $theme = $_SESSION['theme'] ?? 'style.css'; ?>
<link rel='stylesheet' href='/assets/css/<?= htmlspecialchars($theme) ?>'>