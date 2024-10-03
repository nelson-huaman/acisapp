(function() {
   
   const usuarioInput = document.querySelector('#usuarios')
   
   if(usuarioInput) {

      const usuarioHidden = document.querySelector('[name="id"]')
      const usuarioDocumento = document.querySelector('.usuario__documento')
      const usuarioNombre = document.querySelector('.usuario__nombre')
      const usuarioApellidos = document.querySelector('.usuario__apellidos')
      const usuarioCorreo = document.querySelector('.usuario__correo')
      const usuarioTelefono = document.querySelector('.usuario__telefono')

      let usuarios = []
      let usuariosFiltrados = []
      let matriculas = []

      const listadoUsuarios = document.querySelector('#listado-usuarios')

      obtenerUsuarios()
      mostrarMatriculas()

      usuarioInput.addEventListener('input', buscarUsuario)
      if(usuarioInput.value) {
         (async () => {
            const usuario = await obtenerUsuario(usuarioHidden.value)

            const usuarioDOM = document.createElement('LI')
            usuarioDOM.classList.add('listado-usuarios__usuario', 'listado-usuarios__usuario--seleccionado')
            usuarioDOM.textContent = `${usuario.nombre} ${usuario.apellido}`
            listadoUsuarios.appendChild(usuarioDOM)
         })();
      }

      async function obtenerUsuarios() {
         const url = `/api/usuarios`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         formatearUsuarios(resultado)
      }

      async function obtenerUsuario(id) {
         
      }

      async function formatearUsuarios(arraryUsuarios = []) {
         usuarios = arraryUsuarios.map(usuario => {
            return {
               id: usuario.id.trim(),
               nombre: `${usuario.nombre.trim()}`,
               documento: `${usuario.numeroDocumento.trim()}`,
               apellidos: `${usuario.apellidoPaterno.trim()} ${usuario.apellidoMaterno.trim()}`,
               correo: `${usuario.email}`,
               telefono: `${usuario.telefono}`
            }
         })
      }

      function buscarUsuario(event) {
         const busqueda = event.target.value
         if(busqueda.length > 3) {
            const expresion = new RegExp(busqueda.normalize('NFD').replace(/[\u0300-\u036f]/g, ""), "i")
            usuariosFiltrados = usuarios.filter(usuario => {
               if(usuario.nombre.toLowerCase().search(expresion) != -1) {
                  return usuario
               }
            })
         } else {
            usuariosFiltrados = []
         }
         mostrarusuarios()
      }

      function mostrarusuarios() {
         while(listadoUsuarios.firstChild) {
            listadoUsuarios.removeChild(listadoUsuarios.firstChild)
         }
         if(usuariosFiltrados.length > 0) {
            usuariosFiltrados.forEach(usuario => {
               const usuarioHTML = document.createElement('LI')
               usuarioHTML.classList.add('listado-usuarios__usuario')
               usuarioHTML.textContent = usuario.documento + ' - ' + usuario.nombre + ' ' + usuario.apellidos
               usuarioHTML.dataset.id = usuario.id
               usuarioHTML.dataset.numero = usuario.documento
               usuarioHTML.dataset.nombre = usuario.nombre
               usuarioHTML.dataset.apellidos = usuario.apellidos
               usuarioHTML.dataset.correo = usuario.correo
               usuarioHTML.dataset.telefono = usuario.telefono
               usuarioHTML.onclick = seleccionarUsuario
               listadoUsuarios.appendChild(usuarioHTML)
            })
         } else {
            const noRgistro = document.createElement('P')
            noRgistro.textContent = 'Registro no encontrado'
            listadoUsuarios.appendChild(noRgistro)
         }
      }

      function seleccionarUsuario(event) {
         const usuario = event.target
         
         const usuarioPrevio = document.querySelector('.listado-usuarios__usuario--seleccionado')
         if(usuarioPrevio) {
            usuarioPrevio.classList.remove('listado-usuarios__usuario--seleccionado')
         }
         
         usuario.classList.add('listado-usuarios__usuario--seleccionado')
         usuarioHidden.value = usuario.dataset.id
         usuarioDocumento.value = usuario.dataset.nombre
         usuarioNombre.value = usuario.dataset.nombre
         usuarioApellidos.value = usuario.dataset.apellidos
         usuarioCorreo.value = usuario.dataset.correo
         usuarioTelefono.value = usuario.dataset.telefono
         
         ListaMatriculas()
      }

      async function mostrarMatriculas() {
         const url = `/api/matriculas`
         const respuesta = await fetch(url)
         const resultado = await respuesta.json()
         formatearMatricula(resultado)
      }

      async function formatearMatricula(arrayMatriculas = []) {
         matriculas = arrayMatriculas.map(matricula => {
            return {
               id: matricula.id,
               programa: `${matricula.servicio.codigo}`,
               beneficio: `${matricula.beneficio.tipoBeneficio}`,
               cliente: matricula.cliente.id,
               asesor: `${matricula.usuario.nombre}`
            }
         })
      }

      function ListaMatriculas() {

         const listadoMatriculas = document.querySelector('.table__tbody')
         while(listadoMatriculas.firstChild) {
            listadoMatriculas.removeChild(listadoMatriculas.firstChild)
         }
         
         const totalMatriculas = matriculas.filter(matricula => matricula.cliente === usuarioHidden.value)

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

      // function realizarPago() {
         
      // }





   }
})();