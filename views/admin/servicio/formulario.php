<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información del Servicio</legend>
   <div class="formulario__row">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombre"
         value="<?php echo stringHTML($servicio->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__row">
      <label for="codigo" class="formulario__label">Código</label>
      <input
         type="text"
         name="codigo"
         id="codigo"
         placeholder="Código"
         value="<?php echo stringHTML($servicio->codigo ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__row">
      <label for="categoria" class="formulario__label">Elegir una categoría</label>
      <select
         name="idCategoria"
         id="categoria"
         class="formulario__select"
      >
         <option value="">-- Seleccionar --</option>
         <?php foreach($categorias as $categoria) { ?>
            <option <?php echo ($servicio->idCategoria === $categoria->id) ? 'selected' : ''; ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
         <?php } ?>
      </select>
   </div>

</fieldset>
