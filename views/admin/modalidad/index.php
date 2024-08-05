<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
   <a href="/admin/servicios/modalidades/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i>
      Añadir Modalidad
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($modalidades)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Nombre</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($modalidades as $modalidad) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $modalidad->nombre; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($modalidad->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($modalidad->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--editar" href="/admin/servicios/modalidades/editar?id=<?php echo $modalidad->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/servicios/modalidades/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $modalidad->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $modalidad->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($modalidad->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($modalidad->estado === '1') ? 'eye' : 'eye-slash'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/servicios/modalidades/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $modalidad->id; ?>">
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
      <p class="text-center">No hay Modalidades Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>