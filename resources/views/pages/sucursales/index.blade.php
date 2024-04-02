<x-app-layout :active="$active">
    <x-layout.page>
        <x-slot name="titulo"> Gestión de sucursales </x-slot>
        <x-slot name="boton">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalClientes">
                <i class="bi-plus mr-1"></i> Agregar empresa
            </button>
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
                            <th>Dirección</th>
                            <th>Encargado</th>
                            <th>Acciones</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
        </x-slot>
        <x-slot name="modals">
            @include('pages.sucursales.modal_add')
        </x-slot>

    </x-layout.page>
    @push('js')
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=quarterly&region=MX&language=es&key={{ ENV('API_GOOGLE_MAPS')}}&libraries=places"></script>
    <script type="text/javascript" src="//googlearchive.github.io/js-marker-clusterer/src/markerclusterer.js"></script>
        <script>
            HSCore.components.HSMask.init('.js-input-mask')
            
            window.addEventListener("load",function(event) {
                let lat_geo;
                let long_geo;
                let lat_org = '20.122400152964854';
                let long_org = '-98.73567825342464';

                $.each(catalogos().estados, function(index, value) {
                    $('#{{ $inputs["empresas"]->id_estado }}').append(`<option value="${value.id}" >${value.estado}</option>`);
                })        

                const municipio = catalogos().municipios
                let asesores = catalogos().asesores;
                $.each(asesores, function(index, value) {
                    $('#{{ $inputs['empresas']->id_encargado }}').append(`<option value="${value.id}" >${value.name + ' ' + value.apellidos}</option>`);
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
                    ajax: '{{ url('sucursalesL') }}',
                    columns: [{
                        render: function (data, type, row) {
                            let perfil = `<div class="avatar avatar-soft-primary avatar-circle">
                                            <span class="avatar-initials">${row.nombre[0]}</span>
                                        </div>`
                            if(row.imagen_perfil){
                                perfil = `<span class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ url('documentos') }}/${row.imagen_perfil}" alt="Image Description">
                                        </span>`
                            }
                            return ` <div class="d-flex align-items-center" href="user-profile.html">
                                        ${perfil}
                                        <div class="ms-3">
                                            <span class="d-block h5 text-inherit mb-0">${ row.nombre }</span>
                                        </div>
                                    </div>`
                        }},{render: function (data, type, row) {
                            return `<span class="d-block h5 mb-0">${row.calle}</span>`
                        }},{render: function (data, type, row) {
                            return `<span class="d-block h5 mb-0">${ row.encargado }</span>`
                        }},{render: function (data, type, row) {
                            return `<a class="btn btn-sm btn-primary" href="{{ url('perfil_cliente') }}/${row.id}" target="_blank"> <i class="bi bi-person-circle"></i> Ver</a>
                                    <button class="btn btn-lg btn-white dropdown-toggle" type="button" id="dropdownMenuButtonClickAnimation" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                        Opciones
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonClickAnimation">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalClientes" data-url="{{ url("empresas") }}/${row.id}/edit"><i class="bi bi-pencil-fill" style="margin-right: 5px;"></i>  Editar</a>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item text-danger rmv" data-id="${row.id}" data-url="{{ url("empresas") }}/${row.id}"><i class="bi bi-trash3 text-danger" style="margin-right: 5px;"></i>  Eliminar</button>
                                      </div>`
                        },
                    }]
                });
                const tom_select = HSCore.components.HSTomSelect.getItems()
                const datatable = HSCore.components.HSDatatables.getItem('datatable')

                HSBsValidation.init('.js-validate', {
                    onSubmit: data => {
                        let fun = data.form.dataset.js ?? 'success'
                        data.event.preventDefault()
                        HSCallStore.init(data,eval(fun))
                    }
                })

                const success = (data) => {
                    if(data.respuesta) {
                        $('#ModalClientes').modal('hide');
                        tata.success('Éxito', data.mensaje);
                        datatable.ajax.reload();
                        localStorage.clear();
                        catalogos();
                    }
                }

                $("button[data-bs-target]").on('click', function(event){
                    let nuevaPosicion = new google.maps.LatLng(lat_org, long_org);
                    marker_0.setPosition(nuevaPosicion);
                    map.setCenter(nuevaPosicion);
                    clear($($(this).data('bs-target')), tom_select);
                });


                $("table").on("click","[data-bs-target='#ModalClientes']",function(){
                    let url = $(this).data('url')
                    clear($($(this).data('bs-target')),tom_select)
                    HSCallGet.init(url,get)
                })

                $("table").on("click","button.rmv",function(){
                    HSCallDelete.init($(this),del)
                })

                const del = (data) =>{
                    datatable.ajax.reload();
                    tata.success('Éxito', "Eliminado correctamente");
                }

                // function obtenerCoordenadas(codigoPostal) {
                //     // URL de la API de OpenCage Data
                //     let apiUrl = `https://api.opencagedata.com/geocode/v1/json?q=${codigoPostal}&key=c42b7e0594d240b2bb2ccb41bd2da7b2`;

                //     // Realiza la solicitud Ajax a la API
                //     $.ajax({
                //         url: apiUrl,
                //         method: 'GET',
                //         dataType: 'json',
                //         success: function(data) {
                //             let cod = 'ISO_3166-1_alpha-2';
                //             $.each(data.results, function(index, value) {
                //                 if(value.components['ISO_3166-1_alpha-2'] == 'MX'){
                //                     let lat_geo = data.results[index].geometry.lat;
                //                     let long_geo = data.results[index].geometry.lng;
                    
                //                 }
                //             })
                //         },
                //         error: function(error) {
                //             console.error("Error en la solicitud:", error);
                //         }
                //     });
                // }

                // obtenerCoordenadas(42300);
                @stack('js_modulo')
            });
        </script>
    @endpush
</x-app-layout>
