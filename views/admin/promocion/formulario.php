<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información de la Promoción</legend>
   <div class="formulario__campo">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombre"
         value="<?php echo stringHTML($promocion->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="descripcion" class="formulario__label">Descripción</label>
      <textarea
         name="descripcion"
         id="descripcion"
         rows="2"
         placeholder="Descripción"
         class="formulario__input"
      ><?php echo stringHTML($promocion->descripcion ?? ''); ?></textarea>
   </div>
</fieldset>
