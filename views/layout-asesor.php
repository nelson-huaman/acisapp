<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $titulo; ?> | ACIS</title>
      <link rel="icon" type="image/x-icon" href="/build/img/icono.ico">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
      <link rel="stylesheet" href="/build/css/app.css">
   </head>
   <body class="dashboard">

      <?php include_once __DIR__ .'/templates/admin-sidebar.php'; ?>
      <div class="dashboard__grid">
         <div class="dashboard__header">
            <?php include_once __DIR__ .'/templates/admin-header.php'; ?>
         </div>
         <main class="dashboard__contenido">
            <?php echo $contenido; ?>
         </main>
      </div>

      <script src="/build/js/app.min.js"></script>
      
   </body>
</html>