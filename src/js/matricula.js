(function() {

   const matricula = document.querySelector('#matricula');
   if(matricula) {

      // Valiables
      let paso = 1;
      let editar = false;
      const pasoInicial = 1;
      const pasoFinal = 3;

      const clienteOBJ = {
         id: '',
         nombre: '',
         apellidoPaterno: '',
         apellidoMaterno: '',
         fechaNacimiento: '1991-01-01',
         tipoDocumento: '',
         numeroDocumento: '',
         email: '',
         telefono: '',
         idProfesion: 1,
         idGrado: 1,
         colegiatura: ''
      }

      const matriculaOBJ = {
         idUsuario: '',
         idCliente: '',
         idModalidad: '',
         idFuente: '',
         idPromocion: '',
         idBeneficio: '',
         idAccesorio: '',
         servicios: []
      }

      let clientes = [];
      let profesiones = [];
      let grados = [];
      let servicios = [];
      let beneficios = [];
      let clientesFiltrados = [];
      let clienteSeleccionado = [];
      let matriculados = [];


      // variables
      const dashboard = document.querySelector('.dashboard');
      const formularioCliente = document.querySelector('#cliente');
      const buscarInput = document.querySelector('#buscar-dni');

      const tipoDocumentoInput = document.querySelector('#tipoDocumento');
      const documentoInput = document.querySelector('#numeroDocumento');
      const emailImput = document.querySelector('#email');
      const nombreInput = document.querySelector('#nombre');
      const apellidoPaternoInput = document.querySelector('#apellidoPaterno');
      const apellidoMaternoInput = document.querySelector('#apellidoMaterno');
      const fechaNacimientoInput = document.querySelector('#fechaNacimiento');
      const telefonoInput = document.querySelector('#telefono');
      const profesionInput = document.querySelector('#profesion');
      const gradoInput = document.querySelector('#grado');
      const colegiaturaInput = document.querySelector('#colegiatura');

      const listaCliente = document.querySelector('#resultado-busqueda');
      const listaMatriculas = document.querySelector('#lista-matriculas');

      const inputSubmit = document.querySelector('#input-submit');
      const btnModal = document.querySelector('#agregar-servicio');


      // AddEventListener
      buscarInput.addEventListener('input', buscarCliente);
      
      tipoDocumentoInput.addEventListener('change', validarCliente);
      documentoInput.addEventListener('input', validarCliente);
      emailImput.addEventListener('change', validarCliente);
      nombreInput.addEventListener('input', validarCliente);
      apellidoPaternoInput.addEventListener('input', validarCliente);
      apellidoMaternoInput.addEventListener('input', validarCliente);
      fechaNacimientoInput.addEventListener('input', validarCliente);
      telefonoInput.addEventListener('input', validarCliente);
      profesionInput.addEventListener('input', validarCliente);
      gradoInput.addEventListener('input', validarCliente);
      colegiaturaInput.addEventListener('input', validarCliente);

      formularioCliente.addEventListener('submit', guardarCliente);
      btnModal.addEventListener('click', mostrarModal);
      
      
      // Navegacion 
      mostrarSecion();
      tabs();
      botonesPaginador();
      paginaSiguiente();
      paginaAnterior();
      

      // ObtnerProfesion
      obtenerProfesiones();
      obtenerGrados();
      obtenerClientes();
      listarServicios();
      listaBeneficios();
      
      // funciones  Asyns Awit
      async function obtenerProfesiones() {
         const url = '/api/profesiones';
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            profesiones = resultado.map( profesion => profesion );
            mostrarProfesion();
         } catch (error) {
            console.log(error);
         }
      }

      async function obtenerGrados() {
         const url = '/api/grados';
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            grados = resultado.map( grado => grado );
            mostrarGrado();
         } catch (error) {
            console.log(error);
         }
      }

      async function obtenerClientes() {
         const url = '/api/clientes';
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            clientes = resultado.map( cliente => cliente);
         } catch (error) {
            console.log(error);
         }
      }

      async function listarServicios() {
         const url = '/api/servicios';
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            servicios = resultado.map( servicio => servicio );
         } catch (error) {
            console.log(error)
         }
      }

      async function listaBeneficios() {
         const url = '/api/beneficios';
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            beneficios = resultado.map( beneficio => beneficio );
         } catch (error) {
            console.log(error);
         }
      }

      // Cliente
      function validarCliente(e) {
         if(e.target.value.trim() === '' && e.target.id !== 'apellidoMaterno' && e.target.id !== 'fechaNacimiento' && e.target.id !== 'profesion' && e.target.id !== 'grado' && e.target.id !== 'colegiatura') {
            mostrarAlerta(`El ${e.target.previousElementSibling.textContent} es obligatorio`, e.target.parentElement);
            e.target.classList.add('formulario__input--error');
            clienteOBJ[e.target.name] = '';
            comprobarDatos();
            return;
         }

         if(e.target.id === 'email' && !validarEmail(e.target.value)) {
            mostrarAlerta(`El ${e.target.previousElementSibling.textContent} no es válido`, e.target.parentElement);
            e.target.classList.add('formulario__input--error');
            clienteOBJ[e.target.name] = '';
            comprobarDatos();
            return;
         }

         limpiarAlerta(e.target.parentElement);
         clienteOBJ[e.target.name] = e.target.value.trim().toUpperCase();
         comprobarDatos();
      }

      function comprobarDatos() {

         const cliente = {
            nombre: nombreInput.value,
            apellidoPaterno: apellidoPaternoInput.value,
            tipoDocumento: tipoDocumentoInput.value,
            numeroDocumento: documentoInput.value,
            telefono: telefonoInput.value
         }

         if(validarDatos(cliente)) {
            inputSubmit.classList.add('formulario__submit--disable');
            inputSubmit.disabled = true;
            return;
         }

         inputSubmit.classList.remove('formulario__submit--disable');
         inputSubmit.disabled = false;
      }

      function validarEmail( email ) {
         const regex =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/
         const resultado = regex.test(email)
         return resultado;
      }

      function limpiarAlerta( referencia ) {
         const alerta = referencia.querySelector('.formulario__error');
         if(alerta) {
            alerta.previousElementSibling.classList.remove('formulario__input--error')
            alerta.remove();
         }
      }

      function mostrarAlerta( mensaje, referencia ) {
         const error = document.createElement('SPAN');
         error.textContent = mensaje;
         error.classList.add('formulario__error');
         referencia.appendChild(error);
      }

      function guardarCliente(e) {
         e.preventDefault();
         if(editar) {
            actualizarCliente();
         } else {
            crearCliente();
         }
      }

      async function actualizarCliente() {
         const url = '/api/cliente';
         const datos = new FormData();
         Object.entries(clienteOBJ).forEach(([key, value]) => {
            datos.append(key, value);
         });
         
         try {
            const respuesta = await fetch(url, {
               method: 'POST',
               body: datos
            });
            const resultado = await respuesta.json();
            if(resultado.tipo === 'exito') {
               Swal.fire({
                  icon: 'success',
                  title: 'Cliente Actualizado',
                  showConfirmButton: false,
                  timer: 3000
               });
            }

         } catch (error) {
            Swal.fire({
               icon:  error,
               title: 'Hubo un error al actualizar el cliente',
               showConfirmButton: false,
               timer: 3000
            });
         }
      }

      async function crearCliente() {
         const url = '/api/cliente';

         const datos = new FormData();
         const camposCliente = ['nombre', 'apellidoPaterno', 'apellidoMaterno', 'fechaNacimiento', 'tipoDocumento', 'numeroDocumento', 'email', 'telefono', 'idProfesion', 'idGrado', 'colegiatura'];
         camposCliente.forEach( item => {
            datos.append(item, clienteOBJ[item]);
         });

         try {
            const respuesta = await fetch(url, {
               method: 'POST',
               body: datos
            });
            const resultado = await respuesta.json();
            if(resultado.tipo === 'exito') {
               clienteOBJ.id = `${resultado.id}`
               clientes = [...clientes, clienteOBJ];
               mostrarMatriculas(`${resultado.id}`);
               
               Swal.fire({
                  icon: 'success',
                  title: 'Cliente Creado',
                  showConfirmButton: false,
                  timer: 3000
               });
            }
            
         } catch (error) {
            Swal.fire({
               icon: error,
               title: 'Hubo un error al crear el cliente',
               showConfirmButton: false,
               timer: 3000
            });
         }
         
      }

      function buscarCliente(e) {
         const documento = e.target.value;
         if(clientes.some( cliente => cliente.numeroDocumento === documento)) {
            clientesFiltrados = clientes.filter( cliente => cliente.numeroDocumento === documento);
            editar = true;
         } else {
            clientesFiltrados = [];
            editar = false;
         }

         limpiarHTML(listaCliente);
         limpiarHTML(listaMatriculas);

         if(clientesFiltrados.length) {
            mostrarCliente();
            mostrarMatriculados();
         } else {
            matriculados = [];
            mensajeVacio('Cliente no encontrado');
            clienteVacio();
            mensajeVacioMatriculas('El Cliente no se a matrpiculado a ningun Servicio aún');
         }
      }

      function mostrarCliente() {

         clientesFiltrados.forEach( cliente => {
            const { id, nombre, apellidoPaterno, numeroDocumento } = cliente;

            const clienteLI = document.createElement('LI');
            clienteLI.classList.add('matricula__li')
            clienteLI.textContent = `${numeroDocumento} - `;
            clienteLI.onclick = () => {
               const clientePrecio = document.querySelector('.matricula__selecionado')
               if(clientePrecio) {
                  clientePrecio.classList.remove('matricula__selecionado')
               }
               clienteLI.classList.add('matricula__selecionado')
               obtenerCliente(id);
               mostrarMatriculas(id);
            }

            const clienteValor = document.createElement('SPAN');
            clienteValor.textContent = `${nombre} ${apellidoPaterno}`;

            clienteLI.appendChild(clienteValor);
            listaCliente.appendChild(clienteLI);
            
         });
      }

      function obtenerCliente( id ) {
         clienteSeleccionado = clientesFiltrados.filter( cliente => cliente.id === id);
         clienteSeleccionado.forEach( cliente => {
            const { nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, tipoDocumento, numeroDocumento, email, telefono, idProfesion, idGrado, colegiatura } = cliente;
            nombreInput.value = nombre;
            apellidoPaternoInput.value = apellidoPaterno;
            apellidoMaternoInput.value = apellidoMaterno;
            fechaNacimientoInput.value = fechaNacimiento;
            tipoDocumentoInput.value = tipoDocumento;
            documentoInput.value = numeroDocumento;
            emailImput.value = email;
            telefonoInput.value = telefono;
            profesionInput.value = idProfesion;
            gradoInput.value = idGrado;
            colegiaturaInput.value = colegiatura;
            inputSubmit.value = 'Actualizar';

            // Asigna los valores al Objeto
            Object.assign(clienteOBJ, cliente);
            comprobarDatos();
         });
      }

      function clienteVacio() {
         nombreInput.value = '';
         apellidoPaternoInput.value = '';
         apellidoMaternoInput.value = '';
         fechaNacimientoInput.value = '';
         tipoDocumentoInput.value = '';
         documentoInput.value = '';
         emailImput.value = '';
         telefonoInput.value = '';
         profesionInput.value = 1;
         gradoInput.value = 1;
         colegiaturaInput.value = '';
         inputSubmit.value = 'Guardar';
      }

      // Matriculas
      async function mostrarMatriculas( id ) {
         const url = `/api/matricula?token=${id}`;
         try {
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            matriculados = resultado.map( matricula => matricula );
            mostrarMatriculados();
         } catch (error) {
            console.log(error);
         }
      }

      function mostrarMatriculados() {

         limpiarHTML(listaMatriculas);
         
         matriculados.forEach( matricula => {
            const tr = document.createElement('TR');
            tr.classList.add('tabla__tr');

            const tdUsuario = document.createElement('TD');
            tdUsuario.classList.add('tabla__td');
            tdUsuario.textContent = usuarioID(matricula.idUsuario);

            const tdServicio = document.createElement('TD');
            tdServicio.classList.add('tabla__td');
            tdServicio.textContent = servicioID(matricula.idServicio);

            const tdBeneficio = document.createElement('TD');
            tdBeneficio.classList.add('tabla__td');
            tdBeneficio.textContent = baneficioID(matricula.idBeneficio);

            const tdFechaMatricula = document.createElement('TD');
            tdFechaMatricula.classList.add('tabla__td');
            tdFechaMatricula.textContent = matricula.fechaMatricula

            const tdCondicion = document.createElement('TD');
            tdCondicion.classList.add('tabla__td');
            tdCondicion.textContent = matricula.condicion

            tr.appendChild(tdUsuario);
            tr.appendChild(tdServicio);
            tr.appendChild(tdBeneficio);
            tr.appendChild(tdFechaMatricula);
            tr.appendChild(tdCondicion);
            listaMatriculas.appendChild(tr);

         });
      }

      function usuarioID( id ) {
         const usuarioItem = clientes.filter( cliente => cliente.id === id);
         return usuarioItem[0].nombre
      }

      function servicioID( id ) {
         const servicioItem = servicios.filter( servico => servico.id === id);
         return servicioItem[0].codigo;
      }

      function baneficioID( id ) {
         const baneficioItem = beneficios.filter( servico => servico.id === id);
         return baneficioItem[0].tipoBeneficio;
      }

      function mostrarProfesion() {
         profesiones.forEach( datos => {
            const { id, profesion } = datos;
            const option = document.createElement('OPTION');
            option.value = id;
            option.textContent = profesion;
            profesionInput.appendChild(option);
         });
         
      }

      function mostrarGrado() {
         grados.forEach( datos => {
            const { id, gradoAcademico } = datos;
            const option = document.createElement('OPTION');
            option.value = id;
            option.textContent = gradoAcademico;
            gradoInput.appendChild(option);
         });
      }


      // Matricula
      function mostrarModal() {
         const modal = document.querySelector('#modal-servicio');
         modal.classList.add('modal')

         const btnCerrar = document.querySelector('.cerrar-modal');
         btnCerrar.addEventListener('click', () => {
            modal.classList.remove('modal')
         })
      }






      // Navegaciones 
      function mostrarSecion() {

         // Ocultar la seccion anterior
         const seccionAnterior = document.querySelector('.matricula__mostrar');
         if(seccionAnterior) {
            seccionAnterior.classList.remove('matricula__mostrar');
         }

         // Seleccionar la session del Paso
         const pasoSelector = `#paso-${paso}`;
         const seccion = document.querySelector(pasoSelector);
         seccion.classList.add('matricula__mostrar');

         // Quitar la Clase anterior
         const tabAnterior = document.querySelector('.matricula__actual')
         if(tabAnterior) {
            tabAnterior.classList.remove('matricula__actual')
         }

         // Restaltar el tab Actual
         const tab = document.querySelector(`[data-paso="${paso}"]`)
         tab.classList.add('matricula__actual')
      }

      function tabs() {
         const botones = document.querySelectorAll('.matricula__tabs button');
         botones.forEach( boton => {
            boton.addEventListener('click', e => {
               paso = parseInt( e.target.dataset.paso );
               mostrarSecion();
               botonesPaginador();
            })
         })
      }

      function botonesPaginador() {
         const paginaAnterior = document.querySelector('#anterior');
         const paginaSiguiente = document.querySelector('#siguiente');

         if(paso === 1) {
            paginaAnterior.classList.add('matricula__ocultar');
            paginaSiguiente.classList.remove('matricula__ocultar');
         } else if(paso === 3) {
            paginaAnterior.classList.remove('matricula__ocultar');
            paginaSiguiente.classList.add('matricula__ocultar');
            // mostrarResumen();
         } else {
            paginaAnterior.classList.remove('matricula__ocultar');
            paginaSiguiente.classList.remove('matricula__ocultar');
         }

         mostrarSecion();
      }

      function paginaSiguiente() {
         const paginaSiguiente = document.querySelector('#siguiente')
         paginaSiguiente.addEventListener('click', () => {
            if(paso >= pasoFinal) return;
            paso++;
            botonesPaginador();
         });
      }

      function paginaAnterior() {
         const paginaAnterior = document.querySelector('#anterior')
         paginaAnterior.addEventListener('click', () => {
            if(paso <= pasoInicial) return;
            paso--;
            botonesPaginador();
         });
      }

      function limpiarHTML( elemento ) {
         while(elemento.firstChild) {
            elemento.removeChild(elemento.firstChild);
         }
      }

      function mensajeVacio( mensaje ) {
         const mensajeParrafo = document.createElement('P');
         mensajeParrafo.classList.add('matricula__aviso');
         mensajeParrafo.textContent = mensaje;
         listaCliente.appendChild(mensajeParrafo);
      }

      function mensajeVacioMatriculas( mensaje ) {
         const tr = document.createElement('TR');
         tr.classList.add('tabla__tr');

         const td = document.createElement('TD');
         td.classList.add('tabla__td', 'tabla__td--noregistro');
         td.colSpan = '4';
         td.textContent = mensaje;
         tr.appendChild(td);
         listaMatriculas.appendChild(tr);
      }
      
      function validarDatos( obj ) {
         return !Object.values(obj).every( input => input !== '');
      }
   }
   
})();