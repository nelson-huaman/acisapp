<div class="dashboard__header">
   <h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
   <a href="/admin/matriculas" class="dashboard__boton">
      <i class="fa-solid fa-chevron-left"></i> Volver
   </a>
</div>

<div class="dashboard__contenedor dashboard__contenedor--tabla">
   <?php if(!empty($incidencias)) { ?>
      <table class="table">
         <thead class="table__thead">
            <tr>
               <th scope="col" class="table__th">Usuario</th>
               <th scope="col" class="table__th">Cliente</th>
               <th scope="col" class="table__th">Servicio</th>
               <th scope="col" class="table__th">Monto</th>
               <th scope="col" class="table__th">Fecha</th>
               <th scope="col" class="table__th">Observación</th>
               <th scope="col" class="table__th">Condición</th>
               <th scope="col" class="table__th">Estado</th>
               <th scope="col" class="table__th"></th>
            </tr>
         </thead>
         <tbody class="table__tbody">
            <?php foreach($incidencias as $incidencia) { ?>
               <tr class="table__tr">
                  <td class="table__td">
                     <?php echo $incidencia->usuario->nombre . ' ' . $incidencia->usuario->apellidoPaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $incidencia->cliente->nombre . ' ' . $incidencia->cliente->apellidoPaterno; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $incidencia->servicio->codigo; ?>
                  </td>
                  <td class="table__td">
                     <?php if ($incidencia->operaciones):
                        foreach ($incidencia->operaciones as $operacion):
                           echo 'S/. ' . $operacion->monto;
                        endforeach;
                     endif; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $incidencia->fechaControl; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $incidencia->observacion; ?>
                  </td>
                  <td class="table__td">
                     <?php echo $incidencia->condicion; ?>
                  </td>
                  <td class="table__td">
                     <div class="table__estado table__estado--<?php echo ($incidencia->estado === '1') ? 'activo' : 'inactivo'; ?>">
                        <?php echo ($incidencia->estado === '1') ? 'Activo' : 'Inactivo'; ?>
                     </div>
                  </td>
                  <td class="table__td">
                     <div class="table__acciones">
                        <a class="table__accion table__accion--ver" href="/admin/matriculas/detalle?id=<?php echo $incidencia->id; ?>" title="Ver">
                           <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="table__accion table__accion--editar" href="/admin/matriculas/editar?id=<?php echo $incidencia->id; ?>" title="Editar">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/matriculas/estado" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $incidencia->id; ?>">
                           <input type="hidden" name="estado" value="<?php echo $incidencia->estado; ?>">
                           <button class="table__accion table__accion--estado" type="submit" title="<?php echo ($incidencia->estado === '1') ? 'Desactivar' : 'Activar'; ?>">
                              <i class="fa-solid fa-<?php echo ($incidencia->estado === '1') ? 'toggle-on' : 'toggle-off'; ?>"></i>
                           </button>
                        </form>
                        <form action="/admin/matriculas/eliminar" method="POST" class="table__formulario">
                           <input type="hidden" name="id" value="<?php echo $incidencia->id; ?>">
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
      <p class="text-center">No hay Incidencias Áun</p>
   <?php } ?>
</div>

<?php echo $paginacion; ?>