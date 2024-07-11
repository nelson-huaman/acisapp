<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información Personal</legend>
   <div class="formulario__campo">
      <label for="nombre" class="formulario__label">Nombres</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombres"
         value="<?php echo stringHTML($usuario->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="apellidoPaterno" class="formulario__label">Apellido Paterno</label>
      <input
         type="text"
         name="apellidoPaterno"
         id="apellidoPaterno"
         placeholder="Apellido Paterno"
         value="<?php echo stringHTML($usuario->apellidoPaterno ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
      <input
         type="text"
         name="apellidoMaterno"
         id="apellidoMaterno"
         placeholder="Apellido Materno"
         value="<?php echo stringHTML($usuario->apellidoMaterno ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="dni" class="formulario__label">DNI</label>
      <input
         type="text"
         name="dni"
         id="dni"
         placeholder="DNI"
         value="<?php echo stringHTML($usuario->dni ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="email" class="formulario__label">Correo</label>
      <input
         type="email"
         name="email"
         id="email"
         placeholder="Correo"
         value="<?php echo stringHTML($usuario->email ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__campo">
      <label for="rol" class="formulario__label">Asignar un rol</label>
      <select
         name="rolId"
         id="rol"
         class="formulario__select"
      >
         <option value="">-- Seleccionar --</option>
         <?php foreach($roles as $rol) { ?>
            <option <?php echo ($usuario->rolId === $rol->id) ? 'selected' : ''; ?> value="<?php echo $rol->id; ?>"><?php echo $rol->nombre; ?></option>
         <?php } ?>
      </select>
   </div>
   <div class="formulario__campo">
      <label for="sede" class="formulario__label">Sede</label>
      <select
         name="sedeId"
         id="sede"
         class="formulario__select"
      >
         <option value="">-- Seleccionar --</option>
         <?php foreach($sedes as $sede) { ?>
            <option <?php echo ($usuario->sedeId === $sede->id) ? 'selected' : ''; ?> value="<?php echo $sede->id; ?>"><?php echo $sede->nombre; ?></option>
         <?php } ?>
      </select>
   </div>
</fieldset>
