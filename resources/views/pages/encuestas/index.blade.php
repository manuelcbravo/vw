<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Solicitudes de Evaluación</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div>
                <h2>EVALUACIÓN</h2>
                <form action="/guardar" method="POST">
                    @csrf

                    <div>
                        <label for="tipo_evaluacion">Tipo de Evaluación:</label>
                        <select id="tipo_evaluacion" name="tipo_evaluacion">
                            <option value="evaluacion">Seleccione</option>
                            <option value="evaluacion1">Evaluación 1</option>
                            <option value="evaluacion2">Evaluación 2</option>
                            <option value="evaluacion3">Evaluación 3</option>
                        </select>
                    </div>

                    <div>
                        <label for="vendedor">VENDEDOR:</label>
                        <select id="vendedor" name="vendedor">
                            <option value="vendedor">Seleccione</option>
                            <option value="vendedor1">Vendedor 1</option>
                            <option value="vendedor2">Vendedor 2</option>
                            <option value="vendedor3">Vendedor 3</option>
                        </select>
                    </div>

                    <div>
                        <br>
                        <h2>DATOS DEL CLIENTE</h2>

                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre">
                        </div>

                        <div>
                            <label for="email">Correo:</label>
                            <input type="email" id="email" name="email">
                        </div>

                        <div>
                            <label for="telefono">Móvil:</label>
                            <input type="tel" id="telefono" name="telefono">
                        </div>
                    </div>

                    <br>
                    <h2>VEHICULO DE INTERES </h2>

                    <div>
                        <label for="año">Año:</label>
                        <input type="text" id="año" name="año">
                    </div>

                    <div>
                        <label for="vehiculo">Vehiculo:</label>
                        <input type="text" id="vehiculo" name="vehiculo">
                    </div>

                    <h2>VEHICULO PARA EVALUACIÓN </h2>

                    <div>
                        <label for="vin">VIN:</label>
                        <input type="text" id="vin" name="vin">
                    </div>

                    <div>
                        <label for="expectativa">Expectativa del Cliente:</label>
                        <input type="text" id="expectativa" name="expectativa">
                    </div>

                    <div>
                        <label for="servicio">¿Tiene el historial de Servicio?</label>
                        <select id="servicio" name="servicio">
                            <option value="servicio">Seleccione</option>
                            <option value="servicio">Si</option>
                            <option value="servicio">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="historial">¿El historial del servicio contiene...?</label>
                        <select id="historial" name="historial">
                            <option value="historial">Seleccione</option>
                            <option value="historial1">Si</option>
                            <option value="historial2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="historial">¿...?</label>
                        <select id="historial" name="historial">
                            <option value="historial">Seleccione</option>
                            <option value="historial1">Si</option>
                            <option value="historial2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="manual">¿Tiene el manual de Propietario?</label>
                        <select id="manual" name="manual">
                            <option value="manual">Seleccione</option>
                            <option value="manual1">Si</option>
                            <option value="manual2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="duplicado">¿Usted tiene el duplicado de llaves?</label>
                        <select id="duplicado" name="duplicado">
                            <option value="duplicado">Seleccione</option>
                            <option value="duplicado1">Si</option>
                            <option value="duplicado2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="siniestro">¿Tuvo algun siniestro?</label>
                        <select id="siniestro" name="siniestro">
                            <option value="siniestro">Seleccione</option>
                            <option value="siniestro1">Si</option>
                            <option value="siniestro2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="dueño">¿Es el primer dueño?</label>
                        <select id="dueño" name="dueño">
                            <option value="dueño">Seleccione</option>
                            <option value="dueño1">Si</option>
                            <option value="dueño2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="financiado">¿El vehiculo esta financiado?</label>
                        <select id="financiado" name="financiado">
                            <option value="financiado">Seleccione</option>
                            <option value="financiado1">Si</option>
                            <option value="financiado2">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="observaciones">Observaciones:</label>
                        <input type="text" id="observaciones" name="observaciones">
                    </div>
                </form>
            </div>
        </x-slot>
    </x-layout.page>
</x-app-layout>
