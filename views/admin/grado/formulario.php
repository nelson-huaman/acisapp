<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información de Grado Académico</legend>
   <div class="formulario__row">
      <label for="gradoAcademico" class="formulario__label">Nombre grado académico</label>
      <input
         type="text"
         name="gradoAcademico"
         id="gradoAcademico"
         placeholder="Nombre grado académico"
         value="<?php echo stringHTML($grado->gradoAcademico ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__row">
      <label for="descripcion" class="formulario__label">Descripción</label>
      <input
         type="text"
         name="descripcion"
         id="descripcion"
         placeholder="Descripción"
         value="<?php echo stringHTML($grado->descripcion ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
