@extends('welcome')

@section('content')
    <div class="min-h-screen">
        <!-- Encabezado u otros elementos fijos aquí -->

        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Contenedor de espacio vacío -->
            <div class="h-screen"></div>

            <!-- Contenido principal que se revela al desplazarse hacia abajo -->
            <div class="p-6 rounded-lg shadow-md transform -translate-y-96 transition-transform">
                <!-- Contenido largo aquí -->
                <!-- Este div será desplazado hacia abajo para revelarse -->
                <br>
                <br>
                <br>
                <div class="text-center">
                    {{-- listar --}}
                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Consultar Pruebas medicas</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Consultar los pruebas medicas de la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/p-medicas</span>
                            <br><b>GET</b>
                        </h2>
                    </div>

                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-800 mb-2">
                            Los valores de respuesta seran tambien, en formato JSON<br>
                            <b>(guarda el token)</b>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
    <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
    {
        "estatus": true,
        "datos": {
            "current_page": 1,
            "data": [
                {},{},{},
                ],
                "first_page_url": "http://l10api-labclinico.test/api/pacientes?page=1",
                "from": 1,
                "last_page": 1,
                "last_page_url": "http://l10api-labclinico.test/api/pacientes?page=1",
                "links": [
                    {
                        "url": null,
                        "label": "&laquo; Previous",
                        "active": false
                    },
                    {
                        "url": "http://l10api-labclinico.test/api/pacientes?page=1",
                        "label": "1",
                        "active": true
                    },
                    {
                        "url": null,
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "next_page_url": null,
                "path": "http://l10api-labclinico.test/api/pacientes",
                "per_page": 15,
                "prev_page_url": null,
                "to": 5,
                "total": 5
            }
    }
    </pre>
                        </div>
                    </div>


                    {{-- crear --}}
                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Crear prueba medica</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Crear un prueba medica en la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/p-medicas</span>
                            <br><b>POST</b>
                        </h2>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">

                        <p class="text-base text-gray-800 mb-2">Los valores esperados a enviar, son en formato JSON</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "nombre": "VIH",
                    "tipo": "Sanguineo",
                    "costo": "305.2",
                    "tiempo_resultado": "2023-09-04 03:56:36"
                }
            </pre>
                        </div>
                    </div>

                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-800 mb-2">
                            Los valores de respuesta seran tambien, en formato JSON<br>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "estatus": true,
                    "mensaje": "Se creo la prueba medica!"
                }
            </pre>
                        </div>
                    </div>


                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Actualizar una prueba medica</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Actualizar una prueba medica en la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/p-medicas/{IdDelRegistro a Editar}</span>
                            <br><b>PUT</b>
                        </h2>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">

                        <p class="text-base text-gray-800 mb-2">Los valores esperados a enviar, son en formato JSON</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "nombre": "Glucosa",
                    "tipo": "Sanguineo",
                    "costo": "305.2",
                    "tiempo_resultado": "2023-09-04 03:56:36"
                }
            </pre>
                        </div>
                    </div>

                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-800 mb-2">
                            Los valores de respuesta seran tambien, en formato JSON<br>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "estatus": true,
                    "mensaje": "Se actualizo la prueba medica!"
                }
            </pre>
                        </div>
                    </div>

                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Obtener una prueba medica</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Obtener una prueba medica en la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/p-medicas/{IdDelRegistro a Obtener}</span>
                            <br><b>GET</b>
                        </h2>
                    </div>

                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-800 mb-2">
                            Los valores de respuesta seran tambien, en formato JSON<br>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "estatus": true,
                    "datos": {
                        "id_prueba": 6,
                        "nombre": "Glucosa",
                        "tipo": "Sanguineo",
                        "costo": 305.2,
                        "tiempo_resultado": "2023-09-04 03:56:36",
                        "created_at": "2023-09-01T23:53:38.000000Z",
                        "updated_at": "2023-09-01T23:55:18.000000Z"
                    }
                }
            </pre>
                        </div>
                    </div>

                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Eliminar prueba medica</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Eliminar un prueba medica en la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/p-medicas/{IdDelRegistro a Eliminar}</span>
                            <br><b>DELETE</b>
                        </h2>
                    </div>


                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-800 mb-2">
                            Los valores de respuesta seran tambien, en formato JSON<br>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
                {
                    "estatus": true,
                    "mensaje": "Prueba medica eliminada!"
                }
            </pre>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
