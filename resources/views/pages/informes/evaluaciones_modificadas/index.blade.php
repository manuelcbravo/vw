<x-app-layout :active="$active">
    @push('css')
    <link href="{{ asset('assets/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css">
    @endpush

    <x-layout.page>
        <x-slot name="titulo"> @lang("blog.titulo") </x-slot>
        <x-slot name="boton">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUsuarios">
                <i class="bi-plus mr-1"></i> @lang("blog.agregar")
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
                            <th>@lang("blog.encabezado.publicacion")</th>
                            <th>Fecha creación</th>
                            <th>Publicado</th>
                            <th>Acciones</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
        </x-slot>
        <x-slot name="modals">
            @include('pages.blog.posts.modal_add')
        </x-slot>

    </x-layout.page>
@push('js')
<script src="{{ asset('assets/js/dropify.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        window.addEventListener("load",function(event) {
            hljs.configure({   // optionally configure hljs
                languages: ['javascript', 'php', 'python', 'sql','html','xml']
            });

            $.each(catalogos().tags, function(index, value) {
                $('.tags').append('<option value="'+ value.id +'">'+ value.nombre+'</option>');
            })
            
            $.each(catalogos().categorias, function(index, value) {
                $('.categoria').append('<option value="'+ value.id +'">'+ value.nombre+'</option>');
            })

            $('.dropify').dropify({
                messages: {
                    'default': '<span class="form-text" style="font-size: 14px">Arrastre y suelte un archivo aquí o haga clic.</span>',
                    'replace': 'Arrastra y suelta o haz clic para reemplazar.',
                    'remove':  'Eliminar',
                    'error':   'Vaya, sucedió algo mal.'
                },error: {
                    'fileSize': 'El archivo es muy grande.'
                },allowedFileExtensions: ["png", "jpg", "jpeg"]
            });

            HSCore.components.HSTomSelect.init('.js-select')
            let toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'image'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
            ];

            const quill = new Quill('#quill',{ modules: {
                toolbar: toolbarOptions,
                syntax: true,
                },
                theme: 'snow',
                placeholder: 'Escriba el articulo',}
            );
            
            HSCore.components.HSDatatables.init($('#datatable'), {
                language: {
                    zeroRecords: `<div class="text-center p-4">
                      <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                      <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">No data to show</p>
                    </div>`
                },
                ajax: '{{ url('postsL') }}',
                columns: [{
                    render: function (data, type, row) {
                        return ` <div class="d-flex align-items-center" href="user-profile.html">
                                    <div class="avatar avatar-soft-primary avatar-circle">
                                      <span class="avatar-initials">${row.titulo[0]}</span>
                                    </div>
                                    <div class="ms-3">
                                      <span class="d-block h5 text-inherit mb-0">${row.titulo}</span>
                                    </div>
                                </div>`
                    }},{render: function (data, type, row) {
                        return `<span class="d-block h5 mb-0">${moment(row.created_at).format('HH:mm:ss DD/MM/YYYY')}</span>`
                    }},{render: function (data, type, row) {
                        return `<div class="form-check form-switch mb-4">
                                  <input type="checkbox" class="form-check-input" id="formSwitch${row.id}" ${(row.status == 1) ? 'checked':''} data-id="${row.id}">
                                </div>`
                    }},{render: function (data, type, row) {
                        return `<button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUsuarios" data-url="{{ url('posts') }}/${row.id}/edit">
                                    <i class="bi-pencil-fill text-info"></i>
                                </button>
                                <button type="button" class="btn btn-white btn-sm rmv" data-id="${row.id}" data-url="{{ url('posts') }}/${row.id}">
                                    <i class="bi-trash3-fill text-danger" ></i>
                                </button>`
                    },
                }]
            });
            const tom_select = HSCore.components.HSTomSelect.getItems()
            // const quill = HSCore.components.HSQuill.getItem('quill');
            // quill.theme.modules.syntax = true
            // var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
            // quill.theme.modules.toolbar= [['code-block']]
            // console.log(quill);
            const datatable = HSCore.components.HSDatatables.getItem('datatable')

            $("button[data-bs-target]").on('click', function(event){
                $.each(tom_select, function(index, value){
                    if(value.inputId != 'datatableEntries'){
                        tom_select[index].clear()
                    }
                })
                quill.setContents('', 'api');
                $(".dropify-clear").trigger("click");

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

            $("table").on("change",".form-check-input",function(){
                let id = $(this).attr('data-id');
                let che =  $(this).is(":checked")? 1: 0

                $.ajax({
                    url: "{{ url('status_post') }}",
                    type: "POST",
                    data: 'id='+id+'&status='+che,
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
                    if(index === '{{ $inputs['posts']->categoria }}' || index === '{{ $inputs['posts']->tags }}') {
                        const select = tom_select.find(element => element.inputId == index+[]);
                        select.items = value.split(',').map(function(strVale){return Number(strVale);})
                        select.refreshItems()
                    }else if(index === '{{ $inputs['posts']->img_portada }}'){
                        let img =  '{{ asset('documentos') }}/posts/'+value;
                        let drEvent = $('.dropify').dropify(
                            {
                                defaultFile: img
                            });
                        drEvent = drEvent.data('dropify');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                        drEvent.settings.defaultFile = img;
                        drEvent.destroy();
                        drEvent.init()
                    }else if(index === '{{ $inputs['posts']->cuerpo }}'){
                        let ops = JSON.parse(value)
                        quill.setContents(ops.ops, 'api');
                    }else{
                        $('#'+index).val(value);
                    }
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
