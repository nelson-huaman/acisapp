<div class="dashboard__header">
   <h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
   <a href="/admin/matriculas/crear" class="dashboard__boton">
      <i class="fa-solid fa-circle-plus"></i> Añadir Matrícula
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($matriculas)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Asesor</th>
               <th scope="col" class="table__th">Cliente</th>
               <th scope="col" class="table__th">Servicio</th>
               <th scope="col" class="table__th">Fecha</th>
               <th scope="col" class="table__th">Condición</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($matriculas as $matricula) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $matricula->asesor->nombre . ' ' . $matricula->asesor->apellidoPaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $matricula->cliente->nombre . ' ' . $matricula->cliente->apellidoPaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $matricula->servicio->codigo; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $matricula->fechaMatricula; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $matricula->condicion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($matricula->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($matricula->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--ver" href="/admin/matriculas/detalle?id=<?php echo $matricula->id; ?>" title="Ver">
                           <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="table__accion table__accion--editar" href="/admin/matriculas/editar?id=<?php echo $matricula->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/matriculas/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $matricula->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $matricula->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($matricula->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($matricula->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/matriculas/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $matricula->id; ?>">
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
      <p class="text-center">No hay Matrículas Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>