<p class="text-center">Elige tus servicios y los datos del cliente</p>

<div class="matricula" id="matricula">
   <nav class="matricula__tabs">
      <button type="button" data-paso="1" class="matricula__boton matricula__actual">Cliente</button>
      <button type="button" data-paso="2" class="matricula__boton">Matrículas</button>
      <button type="button" data-paso="3" class="matricula__boton">Pagos</button>
   </nav>
   <div id="paso-1" class="matricula__seccion">
      <div class="matricula__contenido">
         <div class="matricula__formulario">
            <h3 class="matricula__h3">Buscar Cliente (DNI)</h3>
            <form class="formulario" id="cliente">
               <fieldset class="formulario__fieldset">
                  <div class="formulario__row">
                     <input
                        type="search" name="buscar-dni" id="buscar-dni"
                        placeholder="DNI"
                        value=""
                        class="formulario__input"
                     >
                     <ul class="matricula__ul" id="resultado-busqueda"></ul>
                  </div>
               </fieldset>
               <fieldset class="formulario__fieldset ">
                  <legend class="formulario__legend">Información Cliente</legend>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="tipoDocumento" class="formulario__label">Tipo de Documento</label>
                        <select
                           name="tipoDocumento"
                           id="tipoDocumento"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                           <option value="DNI">DNI</option>
                           <option value="CE">Carnet Extranjería</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="numeroDocumento" class="formulario__label">Documento de Identidad</label>
                        <input
                           type="text" name="numeroDocumento" id="numeroDocumento"
                           value="<?php echo stringHTML($cliente->numeroDocumento ?? ''); ?>"
                           placeholder="Documento de Identidad"
                           class="formulario__input"
                        >
                     </div>
                  </div>

                  <div class="formulario__row">
                     <label for="email" class="formulario__label">Correo</label>
                     <input
                        type="email" name="email" id="email"
                        placeholder="Correo"
                        value="<?php echo stringHTML($cliente->email ?? ''); ?>"
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__row">
                     <label for="nombre" class="formulario__label">Nombres</label>
                     <input
                        type="text" name="nombre" id="nombre"
                        placeholder="Nombres"
                        value="<?php echo stringHTML($cliente->nombre ?? ''); ?>"
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="apellidoPaterno" class="formulario__label">Apellido Paterno</label>
                        <input
                           type="text" name="apellidoPaterno" id="apellidoPaterno"
                           placeholder="Apellido Paterno"
                           value="<?php echo stringHTML($cliente->apellidoPaterno ?? ''); ?>"
                           class="formulario__input"
                        >
                     </div>
                     <div class="formulario__row">
                        <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
                        <input
                           type="text" name="apellidoMaterno" id="apellidoMaterno"
                           placeholder="Apellido Materno"
                           value="<?php echo stringHTML($cliente->apellidoMaterno ?? ''); ?>"
                           class="formulario__input"
                        >
                     </div>
                  </div>
                  <div class="formulario__row">
                     <label for="fechaNacimiento" class="formulario__label">Fecha de Nacimiento</label>
                     <input
                        type="date" name="fechaNacimiento" id="fechaNacimiento"
                        placeholder="Fecha de Nacimiento"
                        value="<?php echo stringHTML($cliente->fechaNacimiento ?? ''); ?>"
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__row">
                     <label for="telefono" class="formulario__label">Teléfono</label>
                     <input
                        type="text" name="telefono" id="telefono"
                        placeholder="Teléfono"
                        value="<?php echo stringHTML($cliente->telefono ?? ''); ?>"
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="profesion" class="formulario__label">Elige una profesión</label>
                        <select
                           name="idProfesion" id="profesion"
                           class="formulario__select"
                        >
                           <option value="1">-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="grado" class="formulario__label">Grado Académico</label>
                        <select
                           name="idGrado" id="grado"
                           class="formulario__select"
                        >
                           <option value="1">-- Seleccionar --</option>
                        </select>
                     </div>
                  </div>
                  
                  <div class="formulario__row">
                     <label for="colegiatura" class="formulario__label">Colegiatura</label>
                     <input
                        type="text" name="colegiatura" id="colegiatura"
                        placeholder="Colegiatura"
                        value=""
                        class="formulario__input"
                     >
                  </div>

                  <div class="formulario__row">
                     <input type="submit" id="input-submit" value="Registrar" class="formulario__submit formulario__submit--disable" >
                  </div>
               </fieldset>
            </form>
         </div>
         <div class="matricula__datos">
            <h3 class="matricula__h3">Servicios Adquiridos</h3>
            <div class="dashboard__contenedor dashboard__contenedor--tabla">
               <table class="tabla">
                  <thead class="tabla__thead">
                     <tr>
                        <th scope="col" class="tabla__th">Asesor</th>
                        <th scope="col" class="tabla__th">Servicio</th>
                        <th scope="col" class="tabla__th">Beneficio</th>
                        <th scope="col" class="tabla__th">Fecha</th>
                        <th scope="col" class="tabla__th">Condición</th>
                     </tr>
                  </thead>
                  <tbody class="tabla__tbody" id="lista-matriculas">
                     <tr class="tabla__tr">
                        <td class="tabla__td tabla__td--noregistro" colspan="4">No hay Matrículas áun</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div id="paso-2" class="matricula__seccion">
   <div class="matricula__contenido">
         <div class="matricula__formulario">
            <h3 class="matricula__h3">Agregar un Servicio</h3>
            <form class="formulario" id="matricula">
               <fieldset class="formulario__fieldset ">
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="categoria" class="formulario__label">Categoría</label>
                        <select
                           name="categoria"
                           id="categoria"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="buscar-servicio" class="formulario__label">Código de Servicio</label>
                        <input
                           type="text" name="buscar-servicio" id="buscar-servicio"
                           value="" placeholder="Fecha de Nacimiento"
                           class="formulario__input"
                        >
                        <input type="hidden" name="servicios" id="servicios-seleccionados">
                     </div>
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="idModalidad" class="formulario__label">Modalidad</label>
                        <select
                           name="idModalidad"
                           id="idModalidad"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="idFuente" class="formulario__label">Fuente</label>
                        <select
                           name="idFuente"
                           id="idFuente"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="idPromocion" class="formulario__label">Promoción</label>
                        <select
                           name="idPromocion"
                           id="idPromocion"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="idBeneficio" class="formulario__label">Beneficio</label>
                        <select
                           name="idBeneficio"
                           id="idBeneficio"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="idAccesorio" class="formulario__label">Accesorio</label>
                        <select
                           name="idAccesorio"
                           id="idAccesorio"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="idBeneficio" class="formulario__label">Beneficio</label>
                        <select
                           name="idBeneficio"
                           id="idBeneficio"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                        </select>
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
         <div class="matricula__datos">
            <h3 class="matricula__h3">Servicios Agregados</h3>
            <div class="dashboard__header">
               <h4 class="dashboard__heading"><?php echo $titulo; ?></h4>
               <button class="dashboard__boton" id="agregar-servicio"><i class="fa-solid fa-circle-plus"></i> Añadir Servicio</button>
               <div class="hidden" id="modal-servicio">
                  <form class="formulario animar" id="servicios">
                     <fieldset class="formulario__fieldset ">
                        <legend class="formulario__legend">Buscar un Servicio</legend>
                        <div class="formulario__colunm">
                           <div class="formulario__row">
                              <label for="categoria" class="formulario__label">Categoría</label>
                              <select
                                 name="categoria"
                                 id="categoria"
                                 class="formulario__select"
                              >
                                 <option value="">-- Seleccionar --</option>
                              </select>
                           </div>
                           <div class="formulario__row">
                              <label for="buscar-servicio" class="formulario__label">Código de Servicio</label>
                              <input
                                 type="text" name="buscar-servicio" id="buscar-servicio"
                                 value="" placeholder="Fecha de Nacimiento"
                                 class="formulario__input"
                              >
                              <input type="hidden" name="servicios" id="servicios-seleccionados">
                           </div>
                        </div>
                        <div class="opciones">
                           <!-- <input type="submit" class="registro-nuevo" value="Registrar"/> -->
                           <button type="button" class="cerrar-modal">Cerrar</button>
                        </div>
                     </fieldset>
                  </form>
                  <div class="matricula__servicios" id="lista-servicios"></div>
               </div>
            </div>
            <div class="dashboard__contenedor dashboard__contenedor--tabla">
               <table class="tabla">
                  <thead class="tabla__thead">
                     <tr>
                        <th scope="col" class="tabla__th">Asesor</th>
                        <th scope="col" class="tabla__th">Servicio</th>
                        <th scope="col" class="tabla__th">Beneficio</th>
                        <th scope="col" class="tabla__th">Fecha</th>
                     </tr>
                  </thead>
                  <tbody class="tabla__tbody" id="lista-matriculas">
                     <tr class="tabla__tr">
                        <td class="tabla__td tabla__td--noregistro" colspan="4">No hay Matrículas áun</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div id="paso-3" class="matricula__seccion">
      <h3 class="matricula__h3">Pagos</h3>
      <p class="text-center">Monto que pago</p>
   </div>
   <div class="matricula__paginacion">
      <button id="anterior" class="matricula__boton--footer">&laquo; Anterior</button>
      <button id="siguiente" class="matricula__boton--footer">Siguiente &raquo;</button>
   </div>
</div>