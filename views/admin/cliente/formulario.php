<fieldset class="formulario__fieldset">
   <legend class="formulario__legend">Información Personal</legend>
   <div class="formulario__colunm">
      <div class="formulario__row">
         <label for="tipoDocumento" class="formulario__label">Tipo de Documento</label>
         <select
            name="tipoDocumento"
            id="tipoDocumento"
            class="formulario__select"
         >
            <option value="">-- Seleccionar --</option>
            <option value="DNI" <?php echo ($cliente->tipoDocumento && $cliente->tipoDocumento == 'DNI') ? 'selected' : ''; ?>>DNI</option>
            <option value="CE" <?php echo ($cliente->tipoDocumento && $cliente->tipoDocumento == 'CE') ? 'selected' : ''; ?>>Carnet Extranjería</option>
         </select>
      </div>
      <div class="formulario__row">
         <label for="numeroDocumento" class="formulario__label">Documento de Identidad</label>
         <input
            type="text"
            name="numeroDocumento"
            id="numeroDocumento"
            placeholder="Documento de Identidad"
            value="<?php echo stringHTML($cliente->numeroDocumento ?? ''); ?>"
            class="formulario__input"
         >
      </div>
   </div>

   <div class="formulario__row">
      <label for="email" class="formulario__label">Correo</label>
      <input
         type="email"
         name="email"
         id="email"
         placeholder="Correo"
         value="<?php echo stringHTML($cliente->email ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__row">
      <label for="nombre" class="formulario__label">Nombres</label>
      <input
         type="text"
         name="nombre"
         id="nombre"
         placeholder="Nombres"
         value="<?php echo stringHTML($cliente->nombre ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__colunm">
      <div class="formulario__row">
         <label for="apellidoPaterno" class="formulario__label">Apellido Paterno</label>
         <input
            type="text"
            name="apellidoPaterno"
            id="apellidoPaterno"
            placeholder="Apellido Paterno"
            value="<?php echo stringHTML($cliente->apellidoPaterno ?? ''); ?>"
            class="formulario__input"
         >
      </div>
      <div class="formulario__row">
         <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
         <input
            type="text"
            name="apellidoMaterno"
            id="apellidoMaterno"
            placeholder="Apellido Materno"
            value="<?php echo stringHTML($cliente->apellidoMaterno ?? ''); ?>"
            class="formulario__input"
         >
      </div>
   </div>
   <div class="formulario__row">
      <label for="fechaNacimiento" class="formulario__label">Fecha de Nacimiento</label>
      <input
         type="date"
         name="fechaNacimiento"
         id="fechaNacimiento"
         placeholder="Fecha de Nacimiento"
         value="<?php echo stringHTML($cliente->fechaNacimiento ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__row">
      <label for="telefono" class="formulario__label">Teléfono</label>
      <input
         type="text"
         name="telefono"
         id="telefono"
         placeholder="Teléfono"
         value="<?php echo stringHTML($cliente->telefono ?? ''); ?>"
         class="formulario__input"
      >
   </div>
   <div class="formulario__colunm">
      <div class="formulario__row">
         <label for="profesion" class="formulario__label">Elige una profesión</label>
         <select
            name="idProfesion"
            id="profesion"
            class="formulario__select"
         >
            <option value="">-- Seleccionar --</option>
            <?php foreach($profesiones as $profesion) { ?>
               <option <?php echo ($cliente->idProfesion === $profesion->id) ? 'selected' : ''; ?> value="<?php echo $profesion->id; ?>"><?php echo $profesion->profesion; ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="formulario__row">
         <label for="grado" class="formulario__label">Grado Académico</label>
         <select
            name="idGrado"
            id="grado"
            class="formulario__select"
         >
            <option value="">-- Seleccionar --</option>
            <?php foreach($grados as $grado) { ?>
               <option <?php echo ($cliente->idGrado === $grado->id) ? 'selected' : ''; ?> value="<?php echo $grado->id; ?>"><?php echo $grado->gradoAcademico; ?></option>
            <?php } ?>
         </select>
      </div>
   </div>
   
   <div class="formulario__row">
      <label for="colegiatura" class="formulario__label">Colegiatura</label>
      <input
         type="text"
         name="colegiatura"
         id="colegiatura"
         placeholder="Colegiatura"
         value="<?php echo stringHTML($cliente->colegiatura ?? ''); ?>"
         class="formulario__input"
      >
   </div>
</fieldset>
