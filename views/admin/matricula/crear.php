<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/matriculas" class="dashboard__boton">
      <i class="fa-solid fa-chevron-left"></i>
      Volver
   </a>
</div>

<div class="registros" id="registros">
   <div class="registros__registro">
      <h3 class="registros__h3">Inscripción</h3>
      <div class="registros__datos">
         <input type="text" placeholder="Buscar Cliente por DNI" id="buscar-clientes" class="registros__buscar">
         <ul id="listado-clientes" class="listado-clientes"></ul>
         <div class="datos-cliente" id="datos-cliente">
               <div class="datos-cliente__campo">
                  <span>Documento</span>
                  <p class="datos-cliente__dato"></p>
               </div><div class="datos-cliente__campo">
                  <span>Nombres</span>
                  <p class="datos-cliente__dato"></p>
               </div><div class="datos-cliente__campo">
                  <span>Apellidos</span>
                  <p class="datos-cliente__dato"></p>
               </div><div class="datos-cliente__campo">
                  <span>Correo</span>
                  <p class="datos-cliente__dato"></p>
               </div><div class="datos-cliente__campo">
                  <span>Teléfono</span>
                  <p class="datos-cliente__dato"></p>
               </div>
         </div>
      </div>
      <div class="registros__botones">
         <button id="cliente-nuevo">Nuevo</button>
         <button id="cliente-editar">Editar</button>
      </div>
   </div>
   <div class="registros__registro">
      <h3 class="registros__h3">Matrículas</h3>

      <button id="agregar-matricula">Matrícular</button>
      <input type="text" name="id" value="">

      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">N°</th>
               <th scope="col" class="table__th">Programa</th>
               <th scope="col" class="table__th">Baneficio</th>
               <th scope="col" class="table__th">Usuario</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
               <tr class="table__tr">
                  <td class="table__td table__td--noregistro" colspan="5">No hay Matrículas áun</td>
               </tr>
         </tbody>
      </table>
   </div>
   <div class="registros__registro">
      <h3 class="registros__h3">Pagos</h3>
   </div>
</div>

<!-- <div id="modal">
   <form class="formulario nueva-tarea">
      <legend>Nueva matrícula</legend>
      <div class="campo">
         <label>Tarea</label>
         <input
            type="text"
            name="matricula"
            id="matricula"
            placeholder="Matricula"
            value=""/>
      </div>
      <div class="opciones">
         <input type="submit" class="submit-nueva-tarea" value="Matrícular"/>
         <button type="button" class="cerrar-modal">Cancelar</button>
      </div>
   </form>
</div> -->

