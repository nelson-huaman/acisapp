<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/clientes/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i>
      Añadir Cliente
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($clientes)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Tipo</th>
               <th scope="col" class="table__th">Documento</th>
               <th scope="col" class="table__th">Grado</th>
               <th scope="col" class="table__th">Nombre</th>
               <th scope="col" class="table__th">Apellidos</th>
               <th scope="col" class="table__th">Correo</th>
               <th scope="col" class="table__th">Teléfono</th>
               <th scope="col" class="table__th">Profesión</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($clientes as $usuario) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $usuario->tipoDocumento; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->numeroDocumento; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->grado->gradoAcademico; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->nombre; ?>
                  </td>
                  <td class="table__td">
                  <?php echo $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->email; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->telefono; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->profesion->profesion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($usuario->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($usuario->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--editar" href="/admin/clientes/editar?id=<?php echo $usuario->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/clientes/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $usuario->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($usuario->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($usuario->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/clientes/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                           <button class="table__accion table__accion--eliminar" type="submit" title="Eliminiar Permanente">
                              <i class="fa-solid fa-trash-can"></i>
                           </button>
                        </form>
                     </div>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p class="text-center">No hay Clientes Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>