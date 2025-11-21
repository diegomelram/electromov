<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTROMOV</title>
     <link rel="stylesheet" href="/css/layout_users.css">
     <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Montserrat&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
    <header>
        <nav>
        <h1>
            <a href="/"><img src="/img/electromov.jpg" alt="logo"></a>
        </h1>
        <div class="nav_links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/trips/index">Trips</a></li>
                <li><a href="/promotions/index">TRUCKS</a></li>
                <li><a href="//index">BOXES</a></li>
                <li><a href="/freights/index">TRIPS</a></li>
                <li><a href="/clients/index">CLIENTS</a></li>

                <li><?= $this->Html->link('LOGOUT', ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </header>
    
<main>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
</main>

<footer class="site-footer">
  <div class="footer-content">

    <div class="footer-brand">
      <img src="/img/logo.png" alt="Our logo" class="footer-logo">
      <p>&copy; 2025 Transport</p>
    </div>

    <div class="footer-links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#drivers">Drivers</a></li>
        <li><a href="#trucks">trucks</a></li>
        <li><a href="#contact">Contact us</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h4>Contact</h4>
      <p>Email: transport@gmail.com</p>
      <p>WhatsApp: +52 462 123 4567</p>
    </div>

    <div class="footer-social">
      <h4>Follow Us</h4>
      <a href="/"><img src="/img/instagram.png" alt="Instagram"></a>
    </div>

  </div>
</footer>
</div>


<!----------Javascript for toggle menu------->
<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right="0";
    }

    function hideMenu(){
        navLinks.style.right="-200px";
    }
</script>


</body>
</html>