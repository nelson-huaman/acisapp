<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/asesores/roles/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i>
      Añadir Rol
   </a>
</div>

<div class="dashboard__contenedor">
   <?php if(!empty($roles)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Nombres</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($roles as $rol) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $rol->nombre; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($rol->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($rol->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td--acciones">
                     <a class="table__accion table__accion--editar" href="/admin/asesores/roles/editar?id=<?php echo $rol->id; ?>" title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                     <form action="/admin/asesores/roles/estado" method="POST" class="table__formulario">
                        <input type="hidden" name="id" value="<?php echo $rol->id; ?>">
                        <input type="hidden" name="estado" value="<?php echo $rol->estado; ?>">
                        <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($rol->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                           <i class="fa-solid fa-<?php echo ($rol->estado === '1') ? 'eye' : 'eye-slash'; ?>"></i>
                        </button>
                     </form>
                     <form action="/admin/asesores/roles/eliminar" method="POST" class="table__formulario">
                        <input type="hidden" name="id" value="<?php echo $rol->id; ?>">
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
      <p class="text-center">No hay Roles Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>