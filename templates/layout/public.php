<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromov</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilazo.css">
</head>

	<nav class="top-nav">
        <img src="/img/electromov.png" alt="Logo Electromov" class="nav-logo">
        <a href="/users/login">Login</a>
    </nav>

<main>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
</main>


</html> 