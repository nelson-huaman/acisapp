<div class="dashboard__header">
   <h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
   <a href="/admin/servicios/promociones/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i> Añadir Promoción
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($promociones)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Nombre</th>
               <th scope="col" class="table__th">Descripción</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($promociones as $promocion) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $promocion->nombre; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $promocion->descripcion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($promocion->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($promocion->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--editar" href="/admin/servicios/promociones/editar?id=<?php echo $promocion->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/servicios/promociones/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $promocion->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $promocion->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($promocion->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($promocion->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/servicios/promociones/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $promocion->id; ?>">
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
      <p class="text-center">No hay Promociones Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>