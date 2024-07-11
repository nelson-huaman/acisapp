<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información de la Categoría</legend>
   <div class="formulario__campo">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombre"
         value="<?php echo stringHTML($categoria->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
