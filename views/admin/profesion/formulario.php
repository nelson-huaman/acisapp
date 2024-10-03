<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información de la Prefesión</legend>
   <div class="formulario__row">
      <label for="profesion" class="formulario__label">Nombres de la profesión</label>
      <input
         type="text"
         name="profesion"
         id="profesion"
         placeholder="Nombres de la profesión"
         value="<?php echo stringHTML($profesion->profesion ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
