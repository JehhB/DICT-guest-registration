<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->e($title) ?></title>
  <?= $this->section('head') ?>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@5.0.2/dist/signature_pad.umd.min.js" integrity="sha256-qeL5hv3MZ3rdqyLkH6eoAdX7qr6UAoTNTB07xP7bnvI=" crossorigin="anonymous"></script>

  <!-- AlpineJS plugins -->
  <script src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.14.1/dist/cdn.min.js" integrity="sha256-L3ACRR14UR+naq6kU+g7KeM5uTpTPCOP0N5PO+Nnwk8=" crossorigin="anonymous"></script>

  <!-- AlpineJS -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" integrity="sha256-NY2a+7GrW++i9IBhowd25bzXcH9BCmBrqYX5i8OxwDQ=" crossorigin="anonymous"></script>
  <?= $this->section('head') ?>
</head>

<body>
  <?= $this->section('content') ?>
</body>

</html>
