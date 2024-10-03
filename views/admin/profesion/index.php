<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/clientes/profesiones/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i>
      Añadir Prodesión
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($profesiones)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Nombres</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($profesiones as $profesion) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $profesion->profesion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($profesion->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($profesion->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--editar" href="/admin/clientes/profesiones/editar?id=<?php echo $profesion->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/clientes/profesiones/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $profesion->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $profesion->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($profesion->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($profesion->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/clientes/profesiones/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $profesion->id; ?>">
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
      <p class="text-center">No hay Prefesión Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>