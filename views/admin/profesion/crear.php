<div class="dashboard__header">
   <h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
   <a href="/admin/clientes/profesiones" class="dashboard__boton">
      <i class="fa-solid fa-chevron-left"></i> Volver
   </a>
</div>

<div class="dashboard__formulario">
   <?php include_once __DIR__ . './../../templates/alertas.php'; ?>
   <form action="/admin/clientes/profesiones/crear" method="post" class="formulario">
      <?php include_once __DIR__ . '/formulario.php'; ?>
      <input type="submit" value="Registrar" class="formulario__submit formulario__submit--registrar">
   </form>
</div>