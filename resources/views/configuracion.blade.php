@extends('welcome')

@section('content')
    <div class="min-h-screen">
        <!-- Encabezado u otros elementos fijos aquí -->

        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

            <div class="h-screen"></div>

            <!-- Contenido principal -->
            <div class="p-6 rounded-lg shadow-md transform -translate-y-96 transition-transform">

                <br>
                <br>
                <br>
                <div class="text-center">
                    {{-- paso 1 --}}
                    <div class="mt-1">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Paso 1: Crear usuario</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Debes de tomar en cuenta que, primero debes de crear un usuario para usar la API<br>
                            <b>(usa la siguiente url)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/auth/registro</span>
                            <br><b>POST</b>
                        </h2>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">

                        <p class="text-base text-gray-800 mb-2">Los valores esperados a enviar, son en formato JSON</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
            {
                "name": "Nombre User",
                "email": "correo@dominio.com",
                "password": "ContraseniaMayorA8"
            }
            </pre>
                        </div>
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
                "mensaje": "Se creo el usuario!",
                "token": "3|ETS8uAImfw4zD1OsIpwAB9BTwJuX7K4RjZ4JFLJwdfc334dc" (<= Guardar como respaldo)
            }
            </pre>
                        </div>
                    </div>


                    {{-- paso 2 --}}
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Paso 2: Iniciar session del usuario</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Debes de tomar en cuenta que, primero debes de iniciar session con un usuario para usar la API<br>
                            <b>(usa la siguiente url)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/auth/ingresar</span>
                            <br><b>Post</b>
                        </h2>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-600 mb-2">Los valores esperados a enviar, son en formato JSON</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
            {
                "email": "a@a.com",
                "password": "12345678"
            }
            </pre>
                        </div>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-base text-gray-600 mb-2">
                            Los valores de respuesta estan en formato JSON<br>
                            <b>(Guarda el token "Token Bearer" ya que servira, para cada consulta que se desea realizar)</b>
                        </p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
            {
                "estatus": true,
                "mensaje": "Ingreso autorizado!",
                "data": {
                    "id": 1,
                    "name": "Jorge post",
                    "email": "a@a.com",
                    "email_verified_at": null,
                    "created_at": "2023-09-01T06:19:29.000000Z",
                    "updated_at": "2023-09-01T06:19:29.000000Z"
                },
                "acceso": {
                    "tipo": "Bearer",
                    "token": "4|1SvNZLCBXVasCYtkimgyJ8oTN5QMxZqJjGaw14fz00c7d6b2"
                }
            }
            </pre>
                        </div>
                    </div>


                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">Paso 3: Salir de la session del usuario</h2>
                        <p class="text-base text-gray-600 dark:text-gray-400">
                            Debes de tomar en cuenta que, primero debes de iniciar session con un usuario para usar la API<br>
                            <b>(usa la siguiente url - Se debe de usar (enviar en el request) "Token Bearer" de Inicio de session)</b>
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">
                            <span class="text-blue-500">{{ strtolower(env('APP_URL')) }}/api/auth/salir</span>
                            <br><b>GET</b>
                        </h2>
                    </div>
                    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">

                        <p class="text-base text-gray-800 mb-2">Los valores de respuesta, son en formato JSON</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
            <pre class="bg-gray-200 p-2 rounded-lg text-gray-800 overflow-x-auto">
            {
                "status": true,
                "mensaje": "A cerrado la session con exito!"
            }
            </pre>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
