<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información de la Modalidad</legend>
   <div class="formulario__row">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombre"
         value="<?php echo stringHTML($modalidad->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
