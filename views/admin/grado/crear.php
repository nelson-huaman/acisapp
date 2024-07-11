<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/clientes/grados" class="dashboard__boton">
      <i class="fa-solid fa-chevron-left"></i>
      Volver
   </a>
</div>

<div class="dashboard__formulario">
   <?php include_once __DIR__ . './../../templates/alertas.php'; ?>
   <form action="/admin/clientes/grados/crear" method="post" class="formulario">
      <?php include_once __DIR__ . '/formulario.php'; ?>
      <input type="submit" value="Registrar Asesor" class="formulario__submit formulario__submit--registrar">
   </form>
</div>