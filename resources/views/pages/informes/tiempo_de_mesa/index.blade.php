<x-app-layout :active="$active">
    <x-layout.page>
        <x-slot name="titulo"> Tags</x-slot>
        <x-slot name="boton">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTags">
                <i class="bi-plus mr-1"></i> Agregar
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
                            <th>Color</th>
                            <th>Acciones</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
        </x-slot>
        <x-slot name="modals">
            @include('pages.blog.tags.modal_add')
        </x-slot>

    </x-layout.page>
@push('js')

    <script>
        window.addEventListener("load",function(event) {

            HSCore.components.HSDatatables.init($('#datatable'), {
                language: {
                    zeroRecords: `<div class="text-center p-4">
                      <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                      <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">No data to show</p>
                    </div>`
                },
                ajax: '{{ url("tagsL") }}',
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
                    }},{render: function (data, type, row) {
                        return `<span class="d-block h5 mb-0">${row.color}</span>`
                    }},{render: function (data, type, row) {
                        return `<button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTags" data-url="{{ url('tags') }}/${row.id}/edit">
                                    <i class="bi-pencil-fill text-info"></i>
                                </button>
                                <button type="button" class="btn btn-white btn-sm rmv" data-id="${row.id}" data-url="{{ url('tags') }}/${row.id}">
                                    <i class="bi-trash3-fill text-danger" ></i>
                                </button>`
                    },
                }]
            });
            const datatable = HSCore.components.HSDatatables.getItem('datatable')

            $("button[data-bs-target]").on('click', function(event){
                clear($($(this).data('bs-target')));
            });


            $("table").on("click","[data-bs-target]",function(){
                let url = $(this).data('url')
                clear($($(this).data('bs-target')))
                HSCallGet.init(url,get)
            })

            $("table").on("click","button.rmv",function(){
                HSCallDelete.init($(this),del)
            })

            const get = (data) =>{
                $.each(data.tags, function(index, value) {
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
