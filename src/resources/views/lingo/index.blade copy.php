<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lingo | Unai Garcia</title>
    <link rel="stylesheet" href="{{ asset('css/reto_lingo.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div id="modal-bienvenida" class="modal">
        <div class="modal-contenido">
            <h2>¡Bienvenido a LINGO! 🟢🟡🔴</h2>
            <p><strong>El objetivo es adivinar la palabra de 5 letras en 5 intentos.</strong></p>
            
            <p>Después de cada intento, el color de las celdas te indicará qué tan cerca estás:</p>
            <ul>
                <li><strong><span class="estado-V-ejemplo">VERDE</span>:</strong> La letra es <strong>correcta</strong> y está en la <strong>posición correcta</strong>.</li>
                <li><strong><span class="estado-A-ejemplo">AMARILLO</span>:</strong> La letra es <strong>correcta</strong>, pero está en la <strong>posición incorrecta</strong>.</li>
                <li><strong><span class="estado-R-ejemplo">ROJO</span>:</strong> La letra <strong>no está</strong> en la palabra objetivo.</li>
            </ul>
            <p><strong>NOTA:</strong> Tienes **20 segundos** para completar cada palabra. Si se acaba el tiempo, ¡pierdes el intento!</p>
            <button id="boton-iniciar-juego">¡Empezar a Jugar!</button>
        </div>
    </div>
    <header>
        <img class="logo" src="{{ asset('images/mi-logo.png') }}" alt="Logo Lingo">


        <h1>LINGO</h1>

    <!-- ----------------------------------------------------------- -->

        <div class="imagenes">
            <a href="{{ route('ranking.index') }}" title="Estadísticas">
                <i class="fas fa-chart-pie"></i>
            </a>


            <a href="#" title="Cuenta">
                <i class="fas fa-user-circle" aria-hidden="true"></i>
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>


            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <!-- 🔑 CLAVE: Usamos asset() para garantizar la ruta absoluta desde el directorio public -->
               <i class="fas fa-sign-out-alt"></i>
                
            </a>
        </div>


    <!-- ----------------------------------------------------------- -->


    </header>

    <main>
        <span id="estado-carga">Cargando juego...</span>
        <span id="tiempo-global">Tiempo: 00:00</span> 
        
        <div id="contenedor-juego">
            <div id="contenedor-superior">
                <div id="tablero">
                    <div class="fila">
                        <div id="Celda00" class="celda"><span id="Letra00" class="letra-display"></span></div>
                        <div id="Celda01" class="celda"><span id="Letra01" class="letra-display"></span></div>
                        <div id="Celda02" class="celda"><span id="Letra02" class="letra-display"></span></div>
                        <div id="Celda03" class="celda"><span id="Letra03" class="letra-display"></span></div>
                        <div id="Celda04" class="celda"><span id="Letra04" class="letra-display"></span></div>
                    </div>
                    <div class="fila">
                        <div id="Celda10" class="celda"><span id="Letra10" class="letra-display"></span></div>
                        <div id="Celda11" class="celda"><span id="Letra11" class="letra-display"></span></div>
                        <div id="Celda12" class="celda"><span id="Letra12" class="letra-display"></span></div>
                        <div id="Celda13" class="celda"><span id="Letra13" class="letra-display"></span></div>
                        <div id="Celda14" class="celda"><span id="Letra14" class="letra-display"></span></div>
                    </div>
                    <div class="fila">
                        <div id="Celda20" class="celda"><span id="Letra20" class="letra-display"></span></div>
                        <div id="Celda21" class="celda"><span id="Letra21" class="letra-display"></span></div>
                        <div id="Celda22" class="celda"><span id="Letra22" class="letra-display"></span></div>
                        <div id="Celda23" class="celda"><span id="Letra23" class="letra-display"></span></div>
                        <div id="Celda24" class="celda"><span id="Letra24" class="letra-display"></span></div>
                    </div>
                    <div class="fila">
                        <div id="Celda30" class="celda"><span id="Letra30" class="letra-display"></span></div>
                        <div id="Celda31" class="celda"><span id="Letra31" class="letra-display"></span></div>
                        <div id="Celda32" class="celda"><span id="Letra32" class="letra-display"></span></div>
                        <div id="Celda33" class="celda"><span id="Letra33" class="letra-display"></span></div>
                        <div id="Celda34" class="celda"><span id="Letra34" class="letra-display"></span></div>
                    </div>
                    <div class="fila">
                        <div id="Celda40" class="celda"><span id="Letra40" class="letra-display"></span></div>
                        <div id="Celda41" class="celda"><span id="Letra41" class="letra-display"></span></div>
                        <div id="Celda42" class="celda"><span id="Letra42" class="letra-display"></span></div>
                        <div id="Celda43" class="celda"><span id="Letra43" class="letra-display"></span></div>
                        <div id="Celda44" class="celda"><span id="Letra44" class="letra-display"></span></div>
                    </div>
                </div>
            </div>
            
            <div id="barra-tiempo-container">
                <div id="barra-tiempo"></div>
            </div>
        </div>

        <div id="contenedor-teclado">
            <div id="teclado-grid">
                <div class="fila-teclado">
                    <button id="Tecla_Q" class="tecla letra-key" data-key="Q">Q</button>
                    <button id="Tecla_W" class="tecla letra-key" data-key="W">W</button>
                    <button id="Tecla_E" class="tecla letra-key" data-key="E">E</button>
                    <button id="Tecla_R" class="tecla letra-key" data-key="R">R</button>
                    <button id="Tecla_T" class="tecla letra-key" data-key="T">T</button>
                    <button id="Tecla_Y" class="tecla letra-key" data-key="Y">Y</button>
                    <button id="Tecla_U" class="tecla letra-key" data-key="U">U</button>
                    <button id="Tecla_I" class="tecla letra-key" data-key="I">I</button>
                    <button id="Tecla_O" class="tecla letra-key" data-key="O">O</button>
                    <button id="Tecla_P" class="tecla letra-key" data-key="P">P</button>
                </div>
                <div class="fila-teclado">
                    <button id="Tecla_A" class="tecla letra-key" data-key="A">A</button>
                    <button id="Tecla_S" class="tecla letra-key" data-key="S">S</button>
                    <button id="Tecla_D" class="tecla letra-key" data-key="D">D</button>
                    <button id="Tecla_F" class="tecla letra-key" data-key="F">F</button>
                    <button id="Tecla_G" class="tecla letra-key" data-key="G">G</button>
                    <button id="Tecla_H" class="tecla letra-key" data-key="H">H</button>
                    <button id="Tecla_J" class="tecla letra-key" data-key="J">J</button>
                    <button id="Tecla_K" class="tecla letra-key" data-key="K">K</button>
                    <button id="Tecla_L" class="tecla letra-key" data-key="L">L</button>
                    <button id="Tecla_Ñ" class="tecla letra-key" data-key="Ñ">Ñ</button>
                </div>
                <div class="fila-teclado">
                    <button id="Tecla_Backspace" class="tecla especial backspace-key" data-key="Backspace">
                        <img src="Imagenes/2main/teclaBorrar.png" alt="Borrar">
                    </button>
                    <button id="Tecla_Z" class="tecla letra-key" data-key="Z">Z</button>
                    <button id="Tecla_X" class="tecla letra-key" data-key="X">X</button>
                    <button id="Tecla_C" class="tecla letra-key" data-key="C">C</button>
                    <button id="Tecla_V" class="tecla letra-key" data-key="V">V</button>
                    <button id="Tecla_B" class="tecla letra-key" data-key="B">B</button>
                    <button id="Tecla_N" class="tecla letra-key" data-key="N">N</button>
                    <button id="Tecla_M" class="tecla letra-key" data-key="M">M</button>
                    <button id="Tecla_Enter" class="tecla especial enter-key" data-key="Enter">ENTER</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="redes-izq">
            <i class="fab fa-youtube" title="YouTube"></i>

            <!-- Opción 1: icono de Google -->
            <i class="fab fa-google" title="Gmail"></i>
        </div>

        <div class="info-derechos">
            <p>© 2025 | Derechos reservados.</p>
            <i class="fab fa-creative-commons" title="Creative Commons"></i>
        </div>

        <div class="redes-der">
            <i class="fab fa-instagram" title="Instagram"></i>
            <i class="fab fa-x" title="X/Twitter"></i>
            <i class="fab fa-tiktok" title="TikTok"></i>
        </div>
    </footer>

    <script>
        const N = 5;
        const ENDPOINT = "http://185.60.43.155:3000/api/word/1";
        const ENDPOINT_CHECK = "http://185.60.43.155:3000/api/check/";
        const TIEMPO_MAXIMO_INTENTO = 20; // Segundos

        const posiciones = {};
        for (let i = 0; i < N; i++) {
            for (let j = 0; j < N; j++) {
                posiciones[`${i},${j}`] = document.getElementById(`Letra${i}${j}`);
                posiciones[`Celda${i}${j}`] = document.getElementById(`Celda${i}${j}`);
            }
        }

        const teclas = {};
        document.querySelectorAll('.letra-key').forEach(tecla => {
            teclas[tecla.dataset.key] = tecla;
        });

        const estadoSpan = document.getElementById('estado-carga');
        const tiempoGlobalSpan = document.getElementById('tiempo-global');
        const barraTiempo = document.getElementById('barra-tiempo'); 
        
        // ELEMENTOS DEL MODAL
        const modalBienvenida = document.getElementById('modal-bienvenida');
        const botonIniciarJuego = document.getElementById('boton-iniciar-juego');


        let filaActual = 0;
        let columnaActual = 0;
        let palabraAdivinar = "LAPIZ"; 
        let juegoActivo = false; 
        
        let tiempoGlobal = 0; 
        let intervaloGlobal = null; 
        
        let tiempoIntentoActual = TIEMPO_MAXIMO_INTENTO;
        let intervaloIntento = null; 


        // Función para formatear el tiempo
        function formatearTiempo(totalSegundos) {
            const minutos = String(Math.floor(totalSegundos / 60)).padStart(2, '0');
            const segundos = String(totalSegundos % 60).padStart(2, '0');
            return `${minutos}:${segundos}`;
        }

        // Función para actualizar la barra de tiempo
        function actualizarBarraTiempo() {
            const porcentaje = (tiempoIntentoActual / TIEMPO_MAXIMO_INTENTO) * 100;
            barraTiempo.style.width = `${porcentaje}%`;

            // Cambiar color de la barra
            barraTiempo.classList.remove('barra-verde', 'barra-amarilla', 'barra-roja');
            if (porcentaje > 50) {
                barraTiempo.classList.add('barra-verde');
            } else if (porcentaje > 20) {
                barraTiempo.classList.add('barra-amarilla');
            } else {
                barraTiempo.classList.add('barra-roja');
            }
        }

        // Función para detener los contadores al finalizar el juego
        function finalizarJuego() {
            juegoActivo = false;
            clearInterval(intervaloGlobal);
            clearInterval(intervaloIntento); 
            barraTiempo.style.width = '0%';
            barraTiempo.className = '';
        }

        // Contador de tiempo global 
        function iniciarContadorGlobal() {
            if (intervaloGlobal) clearInterval(intervaloGlobal);
            tiempoGlobal = 0;
            tiempoGlobalSpan.textContent = 'Tiempo: 00:00';
            intervaloGlobal = setInterval(() => {
                tiempoGlobal++;
                tiempoGlobalSpan.textContent = `Tiempo: ${formatearTiempo(tiempoGlobal)}`;
            }, 1000);
        }

        // Contador de tiempo por intento (20 segundos)
        function reiniciarContadorIntento() {
            clearInterval(intervaloIntento); 
            if (!juegoActivo) return;

            tiempoIntentoActual = TIEMPO_MAXIMO_INTENTO; 
            actualizarBarraTiempo();

            intervaloIntento = setInterval(() => {
                tiempoIntentoActual--;
                actualizarBarraTiempo();

                if (tiempoIntentoActual <= 0) {
                    clearInterval(intervaloIntento);
                    if (juegoActivo) { 
                        estadoSpan.textContent = `¡Tiempo agotado! La palabra del intento ${filaActual + 1} se salta.`;
                        saltarIntento();
                    }
                }
            }, 1000);
        }

        // Función para saltar la fila actual (si se agota el tiempo)
        function saltarIntento() {
            if (!juegoActivo) return;

            // 1. Borrar letras sin validar y cambiar el estilo a "perdido"
            for (let j = 0; j < N; j++) {
                let letraSpan = posiciones[`${filaActual},${j}`];
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                
                // Borrar la letra
                letraSpan.textContent = '';
                
                // Quitar clases activas y de estado
                celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido', 'estado-R-diccionario');
                
                // APLICAR LA CLASE DE ESTADO PERDIDO/AGOTADO
                celdaDiv.classList.add('estado-perdido'); 
            }
            
            // 2. Avanzar al siguiente intento
            filaActual++;
            columnaActual = 0;
            
            if (filaActual >= N) {
                // LÓGICA DE DERROTA POR TIEMPO AGOTADO EN EL ÚLTIMO INTENTO
                estadoSpan.textContent = `¡Juego Terminado! Has perdido por falta de tiempo. La palabra era: ${palabraAdivinar} 💀`;
                alert(`Has perdido por falta de tiempo. La palabra era: ${palabraAdivinar} 💀`);
                finalizarJuego();
            } else {
                // 3. Si aún quedan intentos, se reinicia el contador y el estilo de la nueva fila.
                reiniciarContadorIntento(); 
                actualizarEstiloFilaActual();
            }
        }

        // Función que realmente inicia el juego (llamada al hacer clic en el botón)
        function iniciarJuego() {
            if (!juegoActivo) return;

            // 1. Ocultar el modal
            modalBienvenida.style.display = 'none';

            // 2. Iniciar contadores y juego
            estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!';
            iniciarContadorGlobal(); 
            reiniciarContadorIntento(); 
            columnaActual = 0;
            // Marcar la primera celda de la primera fila como activa
            actualizarEstiloFilaActual();
        }


        // Funcion para arrancar la pagina y la funcion asincrona para cargar la pablra
        async function cargarPalabraEIniciarJuego() {
            estadoSpan.textContent = 'Cargando palabra del servidor...';
            tiempoGlobalSpan.textContent = 'Tiempo: --:--';
            barraTiempo.style.width = '100%'; 
            
            // Ocultar juego mientras carga
            document.getElementById('contenedor-juego').style.display = 'none';
            document.getElementById('contenedor-teclado').style.display = 'none';


            try {
                const resp = await fetch(ENDPOINT);
                if (!resp.ok) {
                    throw new Error(`Respuesta no exitosa: ${resp.status}`);
                }
                const data = await resp.json();
                const palabra = (data.word || "").toUpperCase();

                if (palabra.length !== N || !/^[A-ZÑ]+$/.test(palabra)) {
                    console.warn(`Palabra recibida ("${palabra}") no válida o no tiene ${N} letras. Usando palabra por defecto.`);
                } else {
                    palabraAdivinar = palabra;
                }

                // 1. Marcar el juego como "listo"
                juegoActivo = true; 
                estadoSpan.textContent = 'Palabra cargada. Esperando inicio...';

            } catch (error) {
                console.error("Error al cargar la palabra:", error);
                estadoSpan.textContent = `Error al cargar. Usando palabra por defecto`;
                palabraAdivinar = "LAPIZ"; // Asegurar una palabra por defecto
                juegoActivo = true; 
            }
            
            // 2. Mostrar el juego y el modal
            document.getElementById('contenedor-juego').style.display = 'block';
            document.getElementById('contenedor-teclado').style.display = 'block';
            modalBienvenida.style.display = 'flex'; // Mostrar el pop-up

            // Evento para iniciar el juego al hacer clic en el botón del modal
            botonIniciarJuego.addEventListener('click', iniciarJuego);
        }


        // Funcion para aplicar/quitar la clase 'activa' en la fila actual. 
        // Esto mantiene el fondo blanco en las letras escritas y el borde en la posición actual.
        function actualizarEstiloFilaActual() {
            if (filaActual >= N) return;
            
            for (let j = 0; j < N; j++) {
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                let celdaSpan = posiciones[`${filaActual},${j}`];

                // Limpiar clases de estado de intentos previos (si las hubiera, aunque no debería)
                celdaDiv.classList.remove('estado-V', 'estado-A', 'estado-R', 'estado-perdido', 'estado-R-diccionario');

                // Las celdas con texto o la celda actual del cursor deben estar activas (fondo blanco).
                if (celdaSpan.textContent.length > 0 || (j === columnaActual && columnaActual < N)) {
                    celdaDiv.classList.add('activa');
                } else {
                    celdaDiv.classList.remove('activa');
                }
            }
        }


        function obtenerPalabraFila(fila) {
            let palabraFila = "";
            for (let j = 0; j < N; j++) {
                let letra = posiciones[`${fila},${j}`].textContent;
                if (letra === '') {
                    return ""; 
                }
                palabraFila += letra;
            }
            return palabraFila.toUpperCase();
        }

        function mover(letra) {
            if (!juegoActivo || filaActual >= N || columnaActual >= N) return;
            if (columnaActual === N) return;

            let celdaSpan = posiciones[`${filaActual},${columnaActual}`];
            
            celdaSpan.textContent = letra;
            columnaActual++;
            
            actualizarEstiloFilaActual();
        }

        function borrar() {
            if (!juegoActivo || filaActual >= N || columnaActual === 0) return; 
            
            columnaActual--;
            
            let celdaSpan = posiciones[`${filaActual},${columnaActual}`];
            
            celdaSpan.textContent = '';
            
            actualizarEstiloFilaActual();
        }

        function actualizarTeclado(letra, nuevoEstado) {
            const teclaElemento = teclas[letra];
            if (!teclaElemento) return;

            if (teclaElemento.classList.contains('estado-V')) return;
            if (nuevoEstado === 'A' && teclaElemento.classList.contains('estado-A')) return;
            if (nuevoEstado === 'R' && (teclaElemento.classList.contains('estado-A') || teclaElemento.classList.contains('estado-V'))) return;

            teclaElemento.classList.remove('estado-A', 'estado-R');
            if (nuevoEstado === 'V') {
                teclaElemento.classList.add('estado-V');
            } else if (nuevoEstado === 'A') {
                teclaElemento.classList.add('estado-A');
            } else if (nuevoEstado === 'R') {
                teclaElemento.classList.add('estado-R');
            }
        }
        
        /**
         * Función para verificar la palabra en el diccionario remoto.
         * @param {string} palabra La palabra a verificar.
         * @returns {boolean} True si existe en el diccionario, False si no.
         */
        async function verificarPalabraEnDiccionario(palabra) {
            try {
                estadoSpan.textContent = 'Verificando palabra...';
                const url = `${ENDPOINT_CHECK}${palabra.toLowerCase()}`;
                
                const resp = await fetch(url);
                if (!resp.ok) {
                    throw new Error(`Error al verificar: ${resp.status}`);
                }
                const data = await resp.json();
                estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!'; 

                return data.exists;
            } catch (error) {
                console.error("Error en la verificación del diccionario:", error);
                // Si hay un error de conexión, se asume que la palabra es válida para no penalizar
                // por un error de servidor. Si prefieres penalizar, cambia 'true' a 'false'.
                estadoSpan.textContent = 'Error de conexión. Continuando validación...';
                return true; 
            }
        }


        // FUNCIÓN VALIDAR MODIFICADA
        async function validar() {
            if (!juegoActivo || filaActual >= N || columnaActual < N) return;

            let palabraIntento = obtenerPalabraFila(filaActual);

            // Detener el contador de intento antes de procesar
            clearInterval(intervaloIntento);
            barraTiempo.style.width = '0%';

            // 1. VALIDACIÓN DEL DICCIONARIO
            const existeEnDiccionario = await verificarPalabraEnDiccionario(palabraIntento);

            if (!existeEnDiccionario) {
                // *** LÓGICA DE INTENTO PERDIDO POR DICCIONARIO ***
                
                // 1a. Marcar todas las celdas como ROJAS (o 'estado-R-diccionario' para diferenciar)
                for (let j = 0; j < N; j++) {
                    let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                    let letraIntento = palabraIntento[j];
                    
                    celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido');
                    celdaDiv.classList.add('estado-R-diccionario');
                    
                    // 1b. Actualizar teclado a ROJO (R)
                    actualizarTeclado(letraIntento, 'R');
                }
                
                // 2. Notificar estado, pero SIN ALERT
                estadoSpan.textContent = `Palabra no encontrada. Intento ${filaActual + 1} perdido.`;
                setTimeout(() => {
                    estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!';
                }, 2000);
                
                // 3. Saltar al siguiente intento
                filaActual++;
                columnaActual = 0;

                if (filaActual >= N) {
                    estadoSpan.textContent = `¡Juego Terminado! Has perdido. La palabra era: ${palabraAdivinar} 💀`;
                    finalizarJuego(); 
                } else {
                    reiniciarContadorIntento(); 
                    actualizarEstiloFilaActual();
                }
                return; // Finalizar la función si la palabra no es válida
            }
            // FIN VALIDACIÓN DICCIONARIO - Si llega aquí, la palabra es válida y se procesa el intento normal.

            // --- LÓGICA DE VALIDACIÓN NORMAL (Palabra válida) ---

            const palabraObjetivo = palabraAdivinar.toUpperCase();
            const intentoArray = palabraIntento.split('');

            let estadosCeldas = new Array(N).fill('R');
            let objetivoRestante = {};

            // 1. Contar letras restantes del objetivo (excluyendo verdes)
            for (let i = 0; i < N; i++) {
                const letra = palabraObjetivo[i];
                if (intentoArray[i] !== letra) {
                    objetivoRestante[letra] = (objetivoRestante[letra] || 0) + 1;
                } else {
                    estadosCeldas[i] = 'V'; // Marcar Verde (acierto)
                }
            }

            let palabraAcertada = true;

            // 2. Marcar Amarillas y Rojas
            for (let j = 0; j < N; j++) {
                if (estadosCeldas[j] !== 'V') {
                    const letraIntento = intentoArray[j];

                    if (objetivoRestante[letraIntento] > 0) {
                        estadosCeldas[j] = 'A'; // Marcar Amarilla (presente)
                        objetivoRestante[letraIntento]--;
                    } else {
                        estadosCeldas[j] = 'R'; // Marcar Roja (no presente)
                    }
                    palabraAcertada = false;
                }
            }

            // 3. Actualizar la interfaz (Board y Teclado)
            for (let j = 0; j < N; j++) {
                const letraIntento = intentoArray[j];
                const estado = estadosCeldas[j];
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                
                celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido', 'estado-R-diccionario');

                celdaDiv.classList.add(`estado-${estado}`);

                actualizarTeclado(letraIntento, estado);
            }

            // 4. Lógica de avance/fin de juego
            if (palabraAcertada) {
                estadoSpan.textContent = `Has acertado en ${filaActual + 1} intentos. Tiempo total: ${formatearTiempo(tiempoGlobal)} 🎉`;
                alert(`Has acertado, felicidades. Tiempo total: ${formatearTiempo(tiempoGlobal)}`);
                finalizarJuego(); 
            } else {
                filaActual++;
                columnaActual = 0;
                
                if (filaActual >= N) {
                    estadoSpan.textContent = `¡Juego Terminado! La palabra era: ${palabraObjetivo} 💀`;
                    alert(`Has perdido. La palabra era: ${palabraObjetivo}`);
                    finalizarJuego(); 
                } else {
                    reiniciarContadorIntento(); 
                    actualizarEstiloFilaActual();
                }
            }
        }


        // event listeners para el los teclados

        // teclado de la pantalla
        document.querySelectorAll('.letra-key').forEach(button => {
            button.addEventListener('click', () => mover(button.dataset.key));
        });
        document.getElementById('Tecla_Enter').addEventListener('click', validar);
        document.getElementById('Tecla_Backspace').addEventListener('click', borrar);


        // teclado físico
        document.addEventListener('keydown', (e) => {
            if (!juegoActivo || modalBienvenida.style.display === 'flex') return;

            let key = e.key.toUpperCase();
            
            if (key === 'ENTER') {
                validar(); 
            } else if (key === 'BACKSPACE') {
                borrar();
            } else if (key.length === 1 && key.match(/^[A-ZÑ]$/)) {
                mover(key);
            }
        });

        //Iniciar la pagina
        cargarPalabraEIniciarJuego(); 
    </script>

</body>

</html>