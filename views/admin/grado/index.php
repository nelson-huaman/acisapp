<div class="dashboard__header">
   <h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
   <a href="/admin/clientes/grados/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i> Añadir Grado A.
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($grados)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Grado Académico</th>
               <th scope="col" class="table__th">Descripción</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($grados as $grado) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $grado->gradoAcademico; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $grado->descripcion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($grado->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($grado->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--editar" href="/admin/clientes/grados/editar?id=<?php echo $grado->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/clientes/grados/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $grado->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $grado->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($grado->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($grado->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/clientes/grados/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $grado->id; ?>">
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
      <p class="text-center">No hay Grados Académicos Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>