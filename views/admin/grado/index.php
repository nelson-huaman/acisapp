<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/clientes/grados/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i>
      Añadir Grado A.
   </a>
</div>

<div class="dashboard__contenedor">
   <?php if(!empty($usuarios)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Nombres</th>
               <th scope="col" class="table__th">DNI</th>
               <th scope="col" class="table__th">Correo</th>
               <th scope="col" class="table__th">Rol</th>
               <th scope="col" class="table__th">Sede</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($usuarios as $usuario) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $usuario->nombre . ' ' . $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->dni; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->email; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->rol->nombre; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $usuario->sede->nombre; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($usuario->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($usuario->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td--acciones">
                     <a class="table__accion table__accion--editar" href="/admin/clientes/grados/editar?id=<?php echo $usuario->id; ?>" title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                     <form action="/admin/clientes/grados/estado" method="POST" class="table__formulario">
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                        <input type="hidden" name="estado" value="<?php echo $usuario->estado; ?>">
                        <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($usuario->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                           <i class="fa-solid fa-<?php echo ($usuario->estado === '1') ? 'eye' : 'eye-slash'; ?>"></i>
                        </button>
                     </form>
                     <form action="/admin/clientes/grados/eliminar" method="POST" class="table__formulario">
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                        <button class="table__accion table__accion--eliminar" type="submit" title="Eliminiar Permanente">
                           <i class="fa-solid fa-trash-can"></i>
                        </button>
                     </form>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p class="text-center">No hay Grados Académicos Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>