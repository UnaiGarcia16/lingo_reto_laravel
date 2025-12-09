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
    <header>
        <img class="logo" src="{{ asset('images/mi-logo.png') }}" alt="Logo Lingo">

        <h1>LINGO</h1>

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
                <i class="fas fa-sign-out-alt"></i>

            </a>
        </div>

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
                <div id="barra-tiempo"></div> </div>
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
        // Constante: N es el tamaño de la palabra (5x5 celdas)
        const N = 5;
        // La URL para pedir la palabra del día (del servidor)
        const ENDPOINT = "http://185.60.43.155:3000/api/word/1";
        // La URL para verificar si la palabra que pones existe en el diccionario
        const ENDPOINT_CHECK = "http://185.60.43.155:3000/api/check/";
        // Tiempo que tienes para adivinar cada intento (20 segundos)
        const TIEMPO_MAXIMO_INTENTO = 20; // Segundos

        // Objeto para guardar todas las referencias a las celdas y las letras (Letra00, Celda00, etc.)
        const posiciones = {};
        for (let i = 0; i < N; i++) {
            for (let j = 0; j < N; j++) {
                posiciones[`${i},${j}`] = document.getElementById(`Letra${i}${j}`);
                posiciones[`Celda${i}${j}`] = document.getElementById(`Celda${i}${j}`);
            }
        }

        // Objeto para guardar las referencias a las teclas del teclado virtual
        const teclas = {};
        document.querySelectorAll('.letra-key').forEach(tecla => {
            teclas[tecla.dataset.key] = tecla;
        });

        // Referencias a los elementos que muestran el estado y el tiempo
        const estadoSpan = document.getElementById('estado-carga');
        const tiempoGlobalSpan = document.getElementById('tiempo-global');
        const barraTiempo = document.getElementById('barra-tiempo');

        // Variables de estado del juego (dónde estoy escribiendo, cuál es la palabra, si está activo, etc.)
        let filaActual = 0; // Fila (intento) actual (0 a 4)
        let columnaActual = 0; // Columna (letra) actual (0 a 4)
        let palabraAdivinar = "LAPIZ"; // Palabra por defecto (por si falla el servidor)
        let juegoActivo = false; // ¿Está el juego en marcha?

        let tiempoGlobal = 0; // Tiempo total que llevas
        let intervaloGlobal = null; // ID del contador de tiempo total

        let tiempoIntentoActual = TIEMPO_MAXIMO_INTENTO; // Tiempo que queda para este intento
        let intervaloIntento = null; // ID del contador por intento


        // Función para poner el tiempo en formato MM:SS
        function formatearTiempo(totalSegundos) {
            const minutos = String(Math.floor(totalSegundos / 60)).padStart(2, '0');
            const segundos = String(totalSegundos % 60).padStart(2, '0');
            return `${minutos}:${segundos}`;
        }

        // Función que actualiza el ancho y el color de la barra de tiempo
        function actualizarBarraTiempo() {
            const porcentaje = (tiempoIntentoActual / TIEMPO_MAXIMO_INTENTO) * 100;
            barraTiempo.style.width = `${porcentaje}%`;

            // Cambiar color de la barra (Verde > 50%, Amarillo > 20%, Rojo < 20%)
            barraTiempo.classList.remove('barra-verde', 'barra-amarilla', 'barra-roja');
            if (porcentaje > 50) {
                barraTiempo.classList.add('barra-verde');
            } else if (porcentaje > 20) {
                barraTiempo.classList.add('barra-amarilla');
            } else {
                barraTiempo.classList.add('barra-roja');
            }
        }

        // Función para parar todos los contadores cuando el juego acaba (ganas o pierdes)
        function finalizarJuego() {
            juegoActivo = false;
            clearInterval(intervaloGlobal);
            clearInterval(intervaloIntento);
            barraTiempo.style.width = '0%';
            barraTiempo.className = ''; // Quitar colores
        }

        // Empieza el contador de tiempo TOTAL de la partida
        function iniciarContadorGlobal() {
            if (intervaloGlobal) clearInterval(intervaloGlobal);
            tiempoGlobal = 0;
            tiempoGlobalSpan.textContent = 'Tiempo: 00:00';
            intervaloGlobal = setInterval(() => {
                tiempoGlobal++;
                tiempoGlobalSpan.textContent = `Tiempo: ${formatearTiempo(tiempoGlobal)}`;
            }, 1000);
        }

        // Reinicia o empieza el contador de tiempo para CADA intento (los 20 segundos)
        function reiniciarContadorIntento() {
            clearInterval(intervaloIntento);
            if (!juegoActivo) return;

            tiempoIntentoActual = TIEMPO_MAXIMO_INTENTO;
            actualizarBarraTiempo(); // Pone la barra al 100%

            intervaloIntento = setInterval(() => {
                tiempoIntentoActual--;
                actualizarBarraTiempo(); // Actualiza el ancho y color de la barra

                if (tiempoIntentoActual <= 0) {
                    clearInterval(intervaloIntento);
                    if (juegoActivo) {
                        estadoSpan.textContent = `¡Tiempo agotado! La palabra del intento ${filaActual + 1} se salta.`;
                        saltarIntento(); // Pasa a la siguiente fila
                    }
                }
            }, 1000);
        }

        // Lo que pasa cuando se te acaba el tiempo en una fila: se considera un intento fallido
        function saltarIntento() {
            if (!juegoActivo) return;

            // 1. Limpiar la fila y ponerla como "perdida" visualmente
            for (let j = 0; j < N; j++) {
                let letraSpan = posiciones[`${filaActual},${j}`];
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];

                letraSpan.textContent = ''; // Borrar la letra
                celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido', 'estado-R-diccionario');
                celdaDiv.classList.add('estado-perdido'); // Clase para el estilo de "fallo por tiempo"
            }

            // 2. Avanzar al siguiente intento
            filaActual++;
            columnaActual = 0;

            if (filaActual >= N) {
                // Si ya no quedan intentos, ¡pierdes!
                estadoSpan.textContent = `¡Juego Terminado! Has perdido por falta de tiempo. La palabra era: ${palabraAdivinar} 💀`;
                alert(`Has perdido por falta de tiempo. La palabra era: ${palabraAdivinar} 💀`);
                finalizarJuego();
            } else {
                // Si aún quedan intentos, reiniciar el tiempo para la nueva fila
                reiniciarContadorIntento();
                actualizarEstiloFilaActual();
            }
        }

        // Función que realmente pone en marcha los contadores y el tablero
        function iniciarJuego() {
            if (!juegoActivo) return;

            // 1. Iniciar contadores y estado inicial
            estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!';
            iniciarContadorGlobal(); // Empieza el tiempo total
            reiniciarContadorIntento(); // Empieza el tiempo por intento
            columnaActual = 0;
            // Pone el foco visual en la primera celda
            actualizarEstiloFilaActual();
        }


        // Función que pide la palabra al servidor ANTES de que empiece el juego
        async function cargarPalabraEIniciarJuego() {
            estadoSpan.textContent = 'Cargando palabra del servidor...';
            tiempoGlobalSpan.textContent = 'Tiempo: --:--';
            barraTiempo.style.width = '100%';

            // Esconder el juego mientras carga para que no se vea feo
            document.getElementById('contenedor-juego').style.display = 'none';
            document.getElementById('contenedor-teclado').style.display = 'none';


            try {
                // Hacemos la petición a la API para conseguir la palabra
                const resp = await fetch(ENDPOINT);
                if (!resp.ok) {
                    throw new Error(`Respuesta no exitosa: ${resp.status}`);
                }
                const data = await resp.json();
                const palabra = (data.word || "").toUpperCase();

                // Comprobamos que la palabra sea válida (5 letras y solo letras)
                if (palabra.length !== N || !/^[A-ZÑ]+$/.test(palabra)) {
                    console.warn(`Palabra recibida ("${palabra}") no válida o no tiene ${N} letras. Usando palabra por defecto.`);
                } else {
                    palabraAdivinar = palabra; // Guardamos la palabra real
                }

                // 1. Marcar el juego como "listo"
                juegoActivo = true;
                estadoSpan.textContent = 'Palabra cargada. Iniciando juego...';

            } catch (error) {
                // Si falla la conexión o la API
                console.error("Error al cargar la palabra:", error);
                estadoSpan.textContent = `Error al cargar. Usando palabra por defecto`;
                palabraAdivinar = "LAPIZ"; // Aseguramos que haya una palabra
                juegoActivo = true; // Permite iniciar el juego con la palabra por defecto
            }

            // 2. Mostrar el juego (ya con la palabra cargada)
            document.getElementById('contenedor-juego').style.display = 'block';
            document.getElementById('contenedor-teclado').style.display = 'block';

            // 3. Empezar a jugar
            iniciarJuego();
        }


        // Pone o quita el estilo 'activa' (fondo blanco/borde) a la celda donde está el cursor
        function actualizarEstiloFilaActual() {
            if (filaActual >= N) return;

            for (let j = 0; j < N; j++) {
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                let celdaSpan = posiciones[`${filaActual},${j}`];

                // Las celdas con texto o la celda actual del cursor deben tener el fondo claro ('activa')
                if (celdaSpan.textContent.length > 0 || (j === columnaActual && columnaActual < N)) {
                    celdaDiv.classList.add('activa');
                } else {
                    celdaDiv.classList.remove('activa');
                }
            }
        }


        // Coge todas las letras de la fila actual y las une para formar la palabra
        function obtenerPalabraFila(fila) {
            let palabraFila = "";
            for (let j = 0; j < N; j++) {
                let letra = posiciones[`${fila},${j}`].textContent;
                if (letra === '') {
                    return ""; // Devuelve vacío si la palabra no está completa
                }
                palabraFila += letra;
            }
            return palabraFila.toUpperCase();
        }

        // Introduce una letra en la celda actual y mueve el cursor a la derecha
        function mover(letra) {
            if (!juegoActivo || filaActual >= N || columnaActual >= N) return; // Si el juego no va o la fila está llena, no hace nada

            if (columnaActual === N) return;

            let celdaSpan = posiciones[`${filaActual},${columnaActual}`];

            celdaSpan.textContent = letra;
            columnaActual++; // Mueve el cursor a la siguiente celda

            actualizarEstiloFilaActual();
        }

        // Borra la última letra y mueve el cursor a la izquierda
        function borrar() {
            if (!juegoActivo || filaActual >= N || columnaActual === 0) return; // Si el juego no va o no hay nada que borrar

            columnaActual--; // Mueve el cursor hacia atrás

            let celdaSpan = posiciones[`${filaActual},${columnaActual}`];

            celdaSpan.textContent = ''; // Borra el contenido de la celda

            actualizarEstiloFilaActual();
        }

        // Pinta la tecla del teclado virtual con el color (V/A/R) que le toque.
        function actualizarTeclado(letra, nuevoEstado) {
            const teclaElemento = teclas[letra];
            if (!teclaElemento) return;

            // Lógica para que el color 'V' (Verde) gane a 'A' (Amarillo), y 'A' gane a 'R' (Rojo)
            if (teclaElemento.classList.contains('estado-V')) return;
            if (nuevoEstado === 'A' && teclaElemento.classList.contains('estado-A')) return;
            if (nuevoEstado === 'R' && (teclaElemento.classList.contains('estado-A') || teclaElemento.classList.contains('estado-V'))) return;

            teclaElemento.classList.remove('estado-A', 'estado-R'); // Quita colores anteriores (si es necesario)
            if (nuevoEstado === 'V') {
                teclaElemento.classList.add('estado-V');
            } else if (nuevoEstado === 'A') {
                teclaElemento.classList.add('estado-A');
            } else if (nuevoEstado === 'R') {
                teclaElemento.classList.add('estado-R');
            }
        }

        /**
         * Función para ver si la palabra existe en la base de datos (Diccionario).
         * @param {string} palabra La palabra que el usuario ha escrito.
         * @returns {boolean} True si está, False si no.
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
                estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!'; // Restaurar estado

                return data.exists; // Devuelve si existe o no
            } catch (error) {
                console.error("Error en la verificación del diccionario:", error);
                // Si la conexión falla, asumimos que es válida para no fastidiar al jugador
                estadoSpan.textContent = 'Error de conexión. Continuando validación...';
                return true;
            }
        }


        // FUNCIÓN PRINCIPAL: Se llama al darle a ENTER. Comprueba si la palabra es correcta.
        async function validar() {
            // No validar si el juego no está activo o la palabra no está completa
            if (!juegoActivo || filaActual >= N || columnaActual < N) return;

            let palabraIntento = obtenerPalabraFila(filaActual);

            // Parar el contador por intento mientras procesamos
            clearInterval(intervaloIntento);
            barraTiempo.style.width = '0%';

            // 1. VALIDACIÓN DEL DICCIONARIO
            const existeEnDiccionario = await verificarPalabraEnDiccionario(palabraIntento);

            if (!existeEnDiccionario) {
                // *** LÓGICA DE INTENTO PERDIDO POR NO ESTAR EN EL DICCIONARIO ***

                // 1a. Marcar todas las celdas como ROJAS especiales (no válida)
                for (let j = 0; j < N; j++) {
                    let celdaDiv = posiciones[`Celda${filaActual}${j}`];
                    let letraIntento = palabraIntento[j];

                    celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido');
                    celdaDiv.classList.add('estado-R-diccionario'); // Poner clase de 'rojo de diccionario'

                    // 1b. Actualizar teclado a ROJO
                    actualizarTeclado(letraIntento, 'R');
                }

                // 2. Notificar error y avisar de la pérdida de intento
                estadoSpan.textContent = `Palabra no encontrada. Intento ${filaActual + 1} perdido.`;
                setTimeout(() => {
                    estadoSpan.textContent = '¡Juego listo! ¡Adivina la palabra!';
                }, 2000);

                // 3. Pasar al siguiente intento
                filaActual++;
                columnaActual = 0;

                if (filaActual >= N) {
                    estadoSpan.textContent = `¡Juego Terminado! Has perdido. La palabra era: ${palabraAdivinar} 💀`;
                    finalizarJuego(); // ¡Juego acabado!
                } else {
                    reiniciarContadorIntento(); // Reiniciar tiempo para la nueva fila
                    actualizarEstiloFilaActual();
                }
                return; // Terminar aquí si la palabra no es válida
            }
            // FIN VALIDACIÓN DICCIONARIO - Si llegamos aquí, la palabra es real.

            // --- LÓGICA DE VALIDACIÓN NORMAL (Comprobar colores) ---

            const palabraObjetivo = palabraAdivinar.toUpperCase();
            const intentoArray = palabraIntento.split('');

            let estadosCeldas = new Array(N).fill('R'); // Empezamos asumiendo que todas son Rojas
            let objetivoRestante = {};

            // 1. PRIMERA PASADA: Identificar y marcar VERDES (posición correcta)
            for (let i = 0; i < N; i++) {
                const letra = palabraObjetivo[i];
                if (intentoArray[i] !== letra) {
                    // Si no es Verde, se cuenta como letra restante para buscar Amarillos
                    objetivoRestante[letra] = (objetivoRestante[letra] || 0) + 1;
                } else {
                    estadosCeldas[i] = 'V'; // ¡Verde!
                }
            }

            let palabraAcertada = true;

            // 2. SEGUNDA PASADA: Identificar y marcar AMARILLAS (letra correcta en posición incorrecta) y ROJAS
            for (let j = 0; j < N; j++) {
                if (estadosCeldas[j] !== 'V') { // Solo si no es Verde
                    const letraIntento = intentoArray[j];
                    palabraAcertada = false; // Como no es todo Verde, la palabra no está acertada

                    if (objetivoRestante[letraIntento] > 0) {
                        estadosCeldas[j] = 'A'; // ¡Amarillo!
                        objetivoRestante[letraIntento]--; // Restamos una letra del conteo restante
                    } else {
                        estadosCeldas[j] = 'R'; // ¡Rojo! (No está la letra)
                    }
                }
            }

            // 3. Actualizar la interfaz (Poner los colores en el tablero y teclado)
            for (let j = 0; j < N; j++) {
                const letraIntento = intentoArray[j];
                const estado = estadosCeldas[j];
                let celdaDiv = posiciones[`Celda${filaActual}${j}`];

                // Limpiar clases y aplicar la nueva
                celdaDiv.classList.remove('activa', 'estado-V', 'estado-A', 'estado-R', 'estado-perdido', 'estado-R-diccionario');
                celdaDiv.classList.add(`estado-${estado}`);

                // Poner el color en la tecla del teclado virtual
                actualizarTeclado(letraIntento, estado);
            }

            // 4. Lógica de avance/fin de juego
            if (palabraAcertada) {
                // ¡HAS GANADO!
                estadoSpan.textContent = `Has acertado en ${filaActual + 1} intentos. Tiempo total: ${formatearTiempo(tiempoGlobal)} 🎉`;
                alert(`Has acertado, felicidades. Tiempo total: ${formatearTiempo(tiempoGlobal)}`);
                finalizarJuego();
            } else {
                // Pasar al siguiente intento
                filaActual++;
                columnaActual = 0;

                if (filaActual >= N) {
                    // ¡HAS PERDIDO! (Último intento fallido)
                    estadoSpan.textContent = `¡Juego Terminado! La palabra era: ${palabraObjetivo} 💀`;
                    alert(`Has perdido. La palabra era: ${palabraObjetivo}`);
                    finalizarJuego();
                } else {
                    // Reiniciar el contador y el foco para la nueva fila
                    reiniciarContadorIntento();
                    actualizarEstiloFilaActual();
                }
            }
        }


        // Escuchadores de eventos para los botones del teclado VIRTUAL
        document.querySelectorAll('.letra-key').forEach(button => {
            button.addEventListener('click', () => mover(button.dataset.key)); // Pone la letra al hacer click
        });
        document.getElementById('Tecla_Enter').addEventListener('click', validar); // Llama a validar
        document.getElementById('Tecla_Backspace').addEventListener('click', borrar); // Llama a borrar


        // Escuchador de eventos para el teclado FÍSICO
        document.addEventListener('keydown', (e) => {
            if (!juegoActivo) return; // Solo funciona si el juego está activo

            let key = e.key.toUpperCase();

            if (key === 'ENTER') {
                validar(); // Si pulsas Enter
            } else if (key === 'BACKSPACE') {
                borrar(); // Si pulsas Borrar
            } else if (key.length === 1 && key.match(/^[A-ZÑ]$/)) {
                mover(key); // Si pulsas una letra
            }
        });

        // Esto arranca todo el proceso al cargar la página: primero carga la palabra y luego el juego
        cargarPalabraEIniciarJuego();
    </script>

</body>

</html>