<x-modal.modal id="ModalApplication" size="modal-xl" nombretitulo="tituloAF">
    <x-slot name="titulo">Encuesta personalizada</x-slot>
    <x-slot name="body">
        <form class="js-validate needs-validation" novalidate="" data-name="FormApplication" id="FormApplication" method="POST" action="{{ url('application_form/af') }}" data-js="success_application">
            <input type="hidden" id="{{ $inputs['application']->id_sucursal	}}" name="{{ $inputs['application']->id_sucursal }}" value="">
            <div class="alert alert-soft-primary" role="alert">
                <i class="bi-exclamation-circle mt-1 mr-1"></i> Las preguntas personalizadas solo se pueden mostrar cuando la opción <b> encuesta personalizada </b> este activa
            </div>

            <!-- Form -->
            <div class="js-add-field row mb-4" data-hs-add-field-options='{ "template": "#addPhoneFieldTemplate", "container": "#addPreguntaFieldContainer", "defaultCreated": 0}'>
                <label for="phoneLabel" class="col-sm-2 col-form-label form-label">Pregunta</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" name="{{ $inputs['application']->pregunta }}[]" id="{{ $inputs['application']->pregunta }}" required="true" placeholder="PREGUNTA"> <!-- name="phone" id="phoneLabel" -->
                        <div class="tom-select-custom tom-select-custom-end">
                            <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{"searchInDropdown": false, "hideSearch": true, "dropdownWidth": "8rem"}' name="{{ $inputs['application']->tipo_pregunta }}[]" id="{{ $inputs['application']->tipo_pregunta }}" required="true">
                                <option value="1" selected>Abierta</option>
                                <option value="2">Opción multiple (Si/No)</option>
                                <option value="3">Opción multiple (Si/No) con detalle</option>
                                <option value="4">Opción rango (Muy bueno/bueno/malo/regular)</option>
                                <option value="5">Opción rango (Muy bueno/bueno/malo/regular) con detalle</option>
                            </select>
                        </div>
                    </div>
                    <div id="addPreguntaFieldContainer"></div>
                    <a class="js-create-field form-link" href="javascript:;">
                        <i class="bi-plus"></i> Agregar
                    </a>
                </div>
            </div>
            <!-- End Form -->

            <!-- Add Phone Input Field -->
            <div id="addPhoneFieldTemplate" class="input-group-add-field" style="display: none;">
                <div class="input-group input-group-sm-vertical align-items-center">
                    <input type="text" class="form-control" name="{{ $inputs['application']->pregunta }}[]" placeholder="PREGUNTA" > <!-- data-name="additionlPhone" -->
                    <div class="input-group-append">
                        <div class="tom-select-custom tom-select-custom-end">
                            <select class="js-select-dynamic form-select" autocomplete="off" name="{{ $inputs['application']->tipo_pregunta }}[]" data-hs-tom-select-options='{"searchInDropdown": false, "hideSearch": true, "dropdownWidth": "8rem"}'> <!-- data-name="phoneSelect" -->
                                <option value="1" selected>Abierta</option>
                                <option value="2">Opción multiple (Si/No)</option>
                                <option value="3">Opción multiple (Si/No) con detalle</option>
                            </select>
                        </div>
                    </div>
                </div>
                <a class="js-delete-field input-group-add-field-delete" href="javascript:;"><i class="bi-x-lg"></i></a>
            </div>
            <!-- End Add Phone Input Field -->

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" style="margin-right: 4px"> <i class="bi-check-lg"></i> Guardar</button>
                <button type="button" class="btn btn-white text-danger" data-bs-dismiss="modal"> <i class="bi-x-lg"></i> Cancelar</button>
            </div>
        </form>

        <h3 class="mt-3 mb-3">Preguntas</h3>
        <div class="row">
            <div class="js-sortable sortablejs-custom list-group" id="lista_preguntas">
            </div>
        </div>
    </x-slot>
    @push('js_modulo')
        $("table").on("click","[data-bs-target='#ModalApplication']",function(){
            let url = $(this).data('url')
            let uuid = $(this).data('uuid')
            clear($($(this).data('bs-target')))
            $('#ModalApplication #{{ $inputs['application']->id_sucursal }}').val(uuid);
            HSCallGet.init(url,get_preguntas)
        })

        const get_preguntas = (data) => {
            if(data.respuesta) {
                $('#tituloAF').text('Encuesta de : ' + data.nombre);
                preguntas(data.preguntas);
            }
        }

        const success_application = (data) => {
            if(data.respuesta) {
                $('#ModalApplication').modal('hide');
                tata.success('Éxito', data.mensaje);
            }
        }

        const preguntas = (data) => {
            $('#lista_preguntas').empty();
            $('#addPreguntaFieldContainer').empty('');
            if(data.length == 0){
                $('#lista_preguntas').append('<h5>No hay preguntas registradas</h5>');
            }else{
                $.each(data, function (index, value) {
                    $('#lista_preguntas').append(`<div class="list-group-item" data-id2="${value.id}" data-id3="${value.id_tratamiento}">
            <table style="width:100%"><tr>
                    <td style="width:80%">${value.numero}.- ${value.pregunta}</td>
                    <td><div class="form-check form-switch mb-4">
                            <input type="checkbox" class="form-check-input cambiar_estatus" data-id="${value.id}" ${(value.estatus == 2) ? "checked":""}>
                        </div>
                    </td>
                </tr></table>
        </div>`);
                });
            }
        }

        $(document).on('change', '.cambiar_estatus', function () {
            let id = $(this).attr('data-id');
            let che =  $(this).is(":checked")? 2: 1
            $.ajax({
                url: '{{ url('application_form') }}',
                type: "POST",
                data: '${{ $inputs['application']->id }}='+id+'&${{ $inputs['application']->estatus }}='+che,
                dataType: 'json',
                beforeSend: function(){
                    loading();
                },
                success: function (data) {
                    close_loading();
                    if(data.respuesta) {
                        tata.success( 'Éxito',data.mensaje );
                    }
                },
                error: function (data) {
                    close_loading();
                    errorSwal('Error',err);
                }
            });
        });

    @endpush
</x-modal.modal>