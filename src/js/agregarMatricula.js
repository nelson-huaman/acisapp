(function() {
   const registros = document.querySelector('#registros')
   if(registros) {

      const clienteNuevo = document.querySelector('#cliente-nuevo')
      const dashboard = document.querySelector('.dashboard')
      const clienteHidden = document.querySelector('[name="id"]')
      const clienteInput = document.querySelector('#buscar-clientes')
      const listadoClientes = document.querySelector('#listado-clientes')

      // Valiables
      let clientes = []
      let clientesFiltrados = []
      let profesiones = []
      let grados = []
      let matriculas = []
      let matriculasFiltadas = []


      // Iniciar Conexion a los API
      listarClientes()
      listarProfesiones()
      listarGrados()
      listarMatriculas()

      // Lista de Usuarios
      async function listarClientes() {
         const url = `/api/usuarios`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         clientes = resultado.map(cliente => {
            return {
               id: cliente.id.trim(),
               nombre: `${cliente.nombre.trim()}`,
               documento: `${cliente.numeroDocumento.trim()}`,
               apellidos: `${cliente.apellidoPaterno.trim()} ${cliente.apellidoMaterno.trim()}`,
               correo: `${cliente.email.trim()}`,
               telefono: `${cliente.telefono.trim()}`
            }
         })
      }

      // Listar profesiones
      async function listarProfesiones() {
         const url = `/api/profesiones`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         profesiones = resultado.map(profesion => {
            return {
               id: profesion.id,
               nombre: profesion.profesion
            }
         })
      }

      async function listarGrados() {
         const url = `/api/grados`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         grados = resultado.map(grado => {
            return {
               id: grado.id,
               nombre: grado.gradoAcademico
            }
         })
      }

      async function listarMatriculas() {
         const url = `/api/matriculas`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         matriculas = resultado.map(matricula => {
            return {
               id: matricula.id,
               programa: `${matricula.servicio.codigo}`,
               beneficio: `${matricula.beneficio.tipoBeneficio}`,
               cliente: matricula.cliente.id,
               asesor: `${matricula.usuario.nombre}`
            }
         })
      }

      // Crear a un nuevo cliente
      clienteNuevo.addEventListener('click', function() {
         mostrarFormCliente()
      })

      function mostrarFormCliente() {
         const modalCliente = document.createElement('DIV')
         modalCliente.classList.add('modal')
         modalCliente.innerHTML = `
            <form class="formulario usuario-nuevo">
               <fieldset class="formulario__fieldset">
                  <legend>Información Personal</legend>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="tipoDocumento" class="formulario__label">Tipo de Documento</label>
                        <select
                           name="tipoDocumento"
                           id="tipoDocumento"
                           class="formulario__select"
                        >
                           <option value="">-- Seleccionar --</option>
                           <option value="DNI">DNI</option>
                           <option value="CE">Carnet Extranjería</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="numeroDocumento" class="formulario__label">Documento de Identidad</label>
                        <input
                           type="text"
                           name="numeroDocumento"
                           id="numeroDocumento"
                           placeholder="Documento de Identidad"
                           value=""
                           class="formulario__input"
                        >
                     </div>
                  </div>

                  <div class="formulario__row">
                     <label for="email" class="formulario__label">Correo</label>
                     <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Correo"
                        value=""
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__row">
                     <label for="nombre" class="formulario__label">Nombres</label>
                     <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        placeholder="Nombres"
                        value=""
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="apellidoPaterno" class="formulario__label">Apellido Paterno</label>
                        <input
                           type="text"
                           name="apellidoPaterno"
                           id="apellidoPaterno"
                           placeholder="Apellido Paterno"
                           value=""
                           class="formulario__input"
                        >
                     </div>
                     <div class="formulario__row">
                        <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
                        <input
                           type="text"
                           name="apellidoMaterno"
                           id="apellidoMaterno"
                           placeholder="Apellido Materno"
                           value=""
                           class="formulario__input"
                        >
                     </div>
                  </div>
                  <div class="formulario__row">
                     <label for="fechaNacimiento" class="formulario__label">Fecha de Nacimiento</label>
                     <input
                        type="date"
                        name="fechaNacimiento"
                        id="fechaNacimiento"
                        placeholder="Fecha de Nacimiento"
                        value=""
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__row">
                     <label for="telefono" class="formulario__label">Teléfono</label>
                     <input
                        type="text"
                        name="telefono"
                        id="telefono"
                        placeholder="Teléfono"
                        value=""
                        class="formulario__input"
                     >
                  </div>
                  <div class="formulario__colunm">
                     <div class="formulario__row">
                        <label for="profesion" class="formulario__label">Elige una profesión</label>
                        <select
                           name="idProfesion"
                           id="profesion"
                           class="formulario__select"
                        >
                           <option value="1" seleted>-- Seleccionar --</option>
                        </select>
                     </div>
                     <div class="formulario__row">
                        <label for="grado" class="formulario__label">Grado Académico</label>
                        <select
                           name="idGrado"
                           id="grado"
                           class="formulario__select"
                        >
                           <option value="1">-- Seleccionar --</option>
                        </select>
                     </div>
                  </div>
                  
                  <div class="formulario__row">
                     <label for="colegiatura" class="formulario__label">Colegiatura</label>
                     <input
                        type="text"
                        name="colegiatura"
                        id="colegiatura"
                        placeholder="Colegiatura"
                        value=""
                        class="formulario__input"
                     >
                  </div>
                  <div class="opciones">
                     <input type="submit" class="registro-nuevo" value="Registrar"/>
                     <button type="button" class="cerrar-modal">Cancelar</button>
                  </div>
               </fieldset>
            </form>
         `

         setTimeout(() => {
            const formulario = document.querySelector('.formulario')
            formulario.classList.add('animar')
         }, 0);

         modalCliente.addEventListener('click', function(event) {
            event.preventDefault()
            // Cerrar modal
            if(event.target.classList.contains('cerrar-modal')) {
               const formulario = document.querySelector('.formulario')
               formulario.classList.add('cerrar')
               setTimeout(() => {
                  modalCliente.remove()
               }, 200);
            }

            // Crear nuevo registro
            if(event.target.classList.contains('registro-nuevo')) {
               const tipoDocumentoCliente = document.querySelector('#tipoDocumento').value.trim()
               if(tipoDocumentoCliente === '') {
                  mostrarAlerta('Tipo de documento es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }
               const numeroDocumentoCliente = document.querySelector('#numeroDocumento').value.trim()
               if(numeroDocumentoCliente === '') {
                  mostrarAlerta('El número de documento es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }

               const emailCliente = document.querySelector('#email').value.trim()
               if(emailCliente === '') {
                  mostrarAlerta('El correo es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }

               const nombreCliente = document.querySelector('#nombre').value.trim()
               if(nombreCliente === '') {
                  mostrarAlerta('El nombre es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }

               const apellidoPaternoCliente = document.querySelector('#apellidoPaterno').value.trim()
               if(apellidoPaternoCliente === '') {
                  mostrarAlerta('El apellido paterno es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }

               const apellidoMaternoCliente = document.querySelector('#apellidoMaterno').value.trim()
               if(apellidoMaternoCliente === '') {
                  mostrarAlerta('El apellido materno es obligatorio','error', document.querySelector('.formulario legend'))
                  return
               }

               const fechaNacimientoCliente = document.querySelector('#fechaNacimiento').value.trim()
               if(fechaNacimientoCliente === '') {
                  fechaNacimientoCliente = '1991-01-01'
               }
               const telefonoCliente = document.querySelector('#telefono').value.trim()
               const profesionCliente = document.querySelector('#profesion').value.trim()
               const gradoCliente = document.querySelector('#grado').value.trim()
               const colegiaturaCliente = document.querySelector('#colegiatura').value.trim()

               const cliente = {
                  nombre: `${nombreCliente}`,
                  apellidoPaterno: `${apellidoPaternoCliente}`,
                  apellidoMaterno: `${apellidoMaternoCliente}`,
                  fechaNacimiento: `${fechaNacimientoCliente}`,
                  tipoDocumento: `${tipoDocumentoCliente}`,
                  numeroDocumento: `${numeroDocumentoCliente}`,
                  email: `${emailCliente}`,
                  telefono: `${telefonoCliente}`,
                  idProfesion: `${profesionCliente}`,
                  idGrado: `${gradoCliente}`,
                  colegiatura: `${colegiaturaCliente}`
               }

               agregarCliente(cliente)
            }
         })

         dashboard.appendChild(modalCliente)

         // Agañe Lista de Profesiones
         const selectProfesion = document.querySelector('#profesion')
         if(selectProfesion) {
            profesiones.forEach(profesion => {
               const option = document.createElement('OPTION')
               option.value = profesion.id
               option.textContent = profesion.nombre
               selectProfesion.appendChild(option)
            })
         }
         
         // Añade Lista de Grados Académicos
         const selectGrado = document.querySelector('#grado')
         if(selectGrado) {
            grados.forEach(grado => {
               const option = document.createElement('OPTION')
               option.value = grado.id
               option.textContent = grado.nombre
               selectGrado.appendChild(option)
            })
         }

      }

      async function agregarCliente(cliente) {

         const datosCliente = new FormData()
         datosCliente.append('nombre', cliente.nombre)
         datosCliente.append('apellidoPaterno', cliente.apellidoPaterno)
         datosCliente.append('apellidoMaterno', cliente.apellidoMaterno)
         datosCliente.append('fechaNacimiento', cliente.fechaNacimiento)
         datosCliente.append('tipoDocumento', cliente.tipoDocumento)
         datosCliente.append('numeroDocumento', cliente.numeroDocumento)
         datosCliente.append('email', cliente.email)
         datosCliente.append('telefono', cliente.telefono)
         datosCliente.append('idProfesion', cliente.idProfesion)
         datosCliente.append('idGrado', cliente.idGrado)
         datosCliente.append('colegiatura', cliente.colegiatura)

         try {
            const url = `/api/usuarios/crear`
            const respuesta = await fetch(url, {
               method: 'POST',
               body: datosCliente
            })
            const resultado = await respuesta.json()
            if(resultado.tipo === 'exito') {
               const modal = document.querySelector('.modal')
               setTimeout(() => {
                  modal.remove()
               }, 600);
               
               const clienteObj = {
                  id: String(resultado.id),
                  nombre: nombre.value,
                  documento: numeroDocumento.value,
                  apellidos: apellidoPaterno.value + ' ' + apellidoMaterno.value,
                  correo: email.value,
                  telefono: telefono.value
               }

               clientes = [...clientes, clienteObj]
               clienteHidden.value = resultado.id
               mostrarCliente()
               // clienteSeleccionado(resultado.id)
            }

         } catch (error) {
            console.log(error)
         }
      }

      function mostrarCliente() {

         while(listadoClientes.firstChild) {
            listadoClientes.removeChild(listadoClientes.firstChild)
         }

         if(clientesFiltrados.length > 0) {
            clientesFiltrados.forEach(cliente => {
               // console.log(cliente)
               const clienteHTML = document.createElement('LI')
               clienteHTML.classList.add('listado-clientes__cliente')
               clienteHTML.textContent = cliente.documento + ' - ' + cliente.nombre + ' ' + cliente.apellidos
               clienteHTML.dataset.id = cliente.id
               clienteHTML.onclick = clienteSeleccionado
               listadoClientes.appendChild(clienteHTML)
               // clienteSeleccionado(cliente.id)
            })
         } else {
            const noRgistro = document.createElement('P')
            noRgistro.textContent = 'Registro no encontrado'
            listadoClientes.appendChild(noRgistro)
         }
         // clienteHidden.value = resultado.id
      }

      function clienteSeleccionado(event) {

         const cliente = event.target
         const id = cliente.dataset.id
         const usuarioPrevio = document.querySelector('.listado-clientes__cliente--seleccionado')
         if(usuarioPrevio) {
            usuarioPrevio.classList.remove('listado-clientes__cliente--seleccionado')
         }

         cliente.classList.add('listado-clientes__cliente--seleccionado')
         clienteHidden.value = id

         const clienteDOM = document.querySelector('#datos-cliente')
         while(clienteDOM.firstChild) {
            clienteDOM.removeChild(clienteDOM.firstChild)
         }
        
         arrayCliente = clientes.filter(cliente => cliente.id === id)
         arrayCliente.forEach(cliente => {
            const divDocumento = document.createElement('DIV')
            divDocumento.classList.add('datos-cliente__campo')
            divDocumento.innerHTML = `
               <span>Documento</span><p>${cliente.documento}</p>
            `
            const divNombre = document.createElement('DIV')
            divNombre.classList.add('datos-cliente__campo')
            divNombre.innerHTML = `
               <span>Nombres</span><p>${cliente.nombre}</p>
            `
            const divApellidos = document.createElement('DIV')
            divApellidos.classList.add('datos-cliente__campo')
            divApellidos.innerHTML = `
               <span>Apellidos</span><p>${cliente.apellidos}</p>
            `
            const divCorreo = document.createElement('DIV')
            divCorreo.classList.add('datos-cliente__campo')
            divCorreo.innerHTML = `
               <span>Correo</span><p>${cliente.correo}</p>
            `
            const divTelefono = document.createElement('DIV')
            divTelefono.classList.add('datos-cliente__campo')
            divTelefono.innerHTML = `
               <span>Teléfono</span><p>${cliente.telefono}</p>
            `
            clienteDOM.appendChild(divDocumento)
            clienteDOM.appendChild(divNombre)
            clienteDOM.appendChild(divApellidos)
            clienteDOM.appendChild(divCorreo)
            clienteDOM.appendChild(divTelefono)
         })

         mostrarMatriculas()
      }

      function mostrarMatriculas() {

         const listadoMatriculas = document.querySelector('.table__tbody')
         while(listadoMatriculas.firstChild) {
            listadoMatriculas.removeChild(listadoMatriculas.firstChild)
         }
         console.log(matriculas)
         
         const totalMatriculas = matriculas.filter(matricula => matricula.cliente === clienteHidden.value)

         if(totalMatriculas.length !== 0) {
            totalMatriculas.map(matricula => {
               const tableBody = document.querySelector('.table__tbody')
               const tr = document.createElement('TR')
               tr.classList.add('table__tr')
               const tdId = document.createElement('TD')
               tdId.classList.add('table__td')
               tdId.textContent = matricula.id

               const tdServicio = document.createElement('TD')
               tdServicio.classList.add('table__td')
               tdServicio.textContent = matricula.programa

               const tdBeneficio = document.createElement('TD')
               tdBeneficio.classList.add('table__td')
               tdBeneficio.textContent = matricula.beneficio

               const tdUsuario = document.createElement('TD')
               tdUsuario.classList.add('table__td')
               tdUsuario.textContent = matricula.asesor

               const tdAcciones = document.createElement('TD')
               tdAcciones.classList.add('table__td')

               const boton = document.createElement('BUTTON')
               boton.classList.add('table__boton')
               boton.textContent = 'Pagar'
               // boton.onclick = realizarPago

               tdAcciones.appendChild(boton)

               tr.appendChild(tdId)
               tr.appendChild(tdServicio)
               tr.appendChild(tdBeneficio)
               tr.appendChild(tdUsuario)
               tr.appendChild(tdAcciones)
               tr.appendChild(tdAcciones)
               tableBody.appendChild(tr)
            })
         } else {
            const tableBody = document.querySelector('.table__tbody')
            const tr = document.createElement('TR')
            tr.classList.add('table__tr','table__td--noregistro')
            const tdNoRegistro = document.createElement('TD')
            tdNoRegistro.classList.add('table__td')
            tdNoRegistro.setAttribute('colspan', '5')
            tdNoRegistro.textContent = 'No hay Matrículas áun'

            tr.appendChild(tdNoRegistro)
            tableBody.appendChild(tr)
         }
      }

      clienteInput.addEventListener('input', buscarCliente)
      // if(clienteHidden.value) {
      //    (async () => {

      //       // const cliente = await obtenerCliente(clienteHidden.value)
      //       // const clienteDOM = document.createElement('LI')
      //       // clienteDOM.classList.add('lista-clientes__cliente', 'lista-clientes__cliente--seleccionado')
      //       // clienteDOM.textContent = `${cliente.nombre} ${cliente.apellidos}`
      //       // listadoClientes.appendChild(clienteDOM)
      //    })
      // }

      function obtenerCliente() {

      }

      // Buscar CLiente
      function buscarCliente(event) {
         const busqueda = event.target.value
         if(busqueda.length > 3) {
            const expresion = new RegExp(busqueda.normalize('NFD').replace(/[\u0300-\u036f]/g, ""), "i")
            clientesFiltrados = clientes.filter(cliente => {
               if(cliente.documento.toLowerCase().search(expresion) != -1) {
                  return cliente
               }
            })
         } else {
            clientesFiltrados = []
         }
         mostrarCliente()
      }

      // Alterta de Mensajes
      function mostrarAlerta(mensaje, tipo, referencia) {

         const alertaPrevia = document.querySelector('.alerta')
         if(alertaPrevia) {
            alertaPrevia.remove();
         }
   
         const alerta = document.createElement('DIV')
         alerta.classList.add('alerta', `alerta--${tipo}`)
         alerta.textContent = mensaje
   
         referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling)
         setTimeout(() => {
            alerta.remove()
         }, 2000);
      }
   }
})();