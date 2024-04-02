<x-app-layout :active="$active">
    <x-layout.page>
        <x-slot name="titulo"> Respuestas </x-slot>
        <x-slot name="boton">
           
        </x-slot>

        <x-slot name="indicadores"> </x-slot>
        <x-slot name="cuerpo">
            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"> </x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" options='{
                   "order": [],
                    "info": {
                    "totalQty": "#datatableWithPaginationInfoTotalQty"
                    },
                    "search": "#datatableSearch",
                    "entries": "#datatableEntries",
                    "pageLength": 12,
                    "pagination": "datatablePagination"
                    }'>
                        <x-slot name="headers">
                            <th>Nombre</th>
                            <th>Total encuestas</th>
                            <th>calificación</th>
                            <th>Acciones</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
        </x-slot>
        <x-slot name="modals">
            {{-- @include('pages.encuestas.modal_application') --}}
        </x-slot>
    </x-layout.page>
    @push('js')
        <script>
            window.addEventListener("load",function(event) {

                new HSAddField('.js-add-field', {
                    addedField: field => {
                        HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
                    }
                })

                HSCore.components.HSTomSelect.init('.js-select')

                HSCore.components.HSDatatables.init($('#datatable'), {
                    language: {
                        zeroRecords: `<div class="text-center p-4">
                      <img class="mb-3" src="{{ asset('assets') }}/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                      <img class="mb-3" src="{{ asset('assets') }}/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">No hay información para mostrar</p>
                    </div>`,
                        processing: `<div id="users-table_processing" class="dataTables_processing">
                        <div class="spinner-border text-primary spinner-datatable-processing" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="d-block">Cargando información</div>
                    </div>`,
                    },
                    processing: true,
                    ajax: '{{ url('encuestasL') }}',
                    columns: [{
                        render: function (data, type, row) {
                            return ` <div class="d-flex align-items-center" href="user-profile.html">
                                    <div class="avatar avatar-soft-primary avatar-circle">
                                      <span class="avatar-initials">${row.nombre[0]}</span>
                                    </div>
                                    <div class="ms-3">
                                      <span class="d-block h5 text-inherit mb-0">${row.nombre}</span>
                                    </div>
                                </div>`
                        }
                        },{render: function (data, type, row) {

                            return `25`
                        }
                        },{render: function (data, type, row) {

                            return `Bueno`
                        }
                        },{render: function (data, type, row) {
                            return `<button class="btn btn-lg btn-white dropdown-toggle" type="button" id="dropdownMenuButtonClickAnimation" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                        Opciones
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonClickAnimation">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalApplication" data-url="{{ url('preguntas') }}/${row.id}" data-uuid="${row.id}"><i class="bi bi-file-earmark-text-fill" style="margin-right: 5px;"></i> Ver encuestas</a>
                                      </div>`
                        },
                    }]
                });
                const tom_select = HSCore.components.HSTomSelect.getItems();
                const datatable = HSCore.components.HSDatatables.getItem('datatable');

                HSBsValidation.init('.js-validate', {
                    onSubmit: data => {
                        let fun = data.form.dataset.js ?? 'success'
                        data.event.preventDefault()
                        HSCallStore.init(data,eval(fun))
                    }
                })

                const success = (data) => {
                    if(data.respuesta) {
                        $('#ModalTratamiento').modal('hide');
                        tata.success('Éxito', data.mensaje);
                        datatable.ajax.reload();
                    }
                }

                $("button[data-bs-target]").on('click', function(event){
                    $.each(tom_select, function(index, value){
                        if(value.inputId != 'datatableEntries'){
                            tom_select[index].clear()
                        }
                    })
                    clear($($(this).data('bs-target')));
                });

                $("table").on("click","[data-bs-target='#ModalTratamiento']",function(){
                    let url = $(this).data('url')
                    clear($($(this).data('bs-target')))
                    HSCallGet.init(url,get)
                })

                $("table").on("click","button.rmv",function(){
                    HSCallDelete.init($(this),del)
                })

                $("table").on("change",".form-check-input",function(){
                    let id = $(this).attr('data-id');
                    let che =  $(this).is(":checked")? 1: 0
                    let url = (($(this).attr('data-id3') == 1) ? '{{ url('encuestasA') }}' : '{{ url('encuestasG') }}' );

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: 'id='+id+'&check='+che,
                        dataType: 'json',
                        beforeSend: function(){
                            loading();
                        },
                        success: function (data) {
                            close_loading();
                            if(data.respuesta) {
                                tata.success( 'Éxito',data.mensaje );
                                datatable.ajax.reload();
                            }
                        },
                        error: function (data) {
                            close_loading();
                            errorSwal('Error',err);
                        }
                    });
                   
                });

                const get = (data) =>{
                    $.each(data.posts, function(index, value) {
                        
                        $('#'+index).val(value);
                        
                    });
                }

                const del = (data) =>{
                    datatable.ajax.reload();
                    tata.success('Éxito', "Eliminado correctamente");
                }

                @stack('js_modulo')
            });
        </script>
    @endpush
</x-app-layout>