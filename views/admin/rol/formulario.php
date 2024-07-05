<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información del Rol</legend>
   <div class="formulario__campo">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombre"
         value="<?php echo stringHTML($rol->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
