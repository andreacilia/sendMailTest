<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>Test App</title>
</head>

<body>

    <main role="main" class="mt-5 container">

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
    <!-- Optional JavaScript -->
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>