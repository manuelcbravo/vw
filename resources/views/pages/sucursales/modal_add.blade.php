<x-modal.modal id="ModalClientes" size="modal-xl" nombretitulo="">
    <x-slot name="titulo"> Sucursakes </x-slot>
    <x-slot name="body">
        <form class="js-validate needs-validation" novalidate="" data-name="FormUsuarios" id="FormUsuarios" method="POST" >
            <input type="hidden" id="{{ $inputs['empresas']->id }}" name="{{ $inputs['empresas']->id }}" value="">
            <input type="hidden" id="{{ $inputs["empresas"]->latitud}}" name="{{ $inputs["empresas"]->latitud}}" value="">
            <input type="hidden" id="{{ $inputs["empresas"]->longitud}}" name="{{ $inputs["empresas"]->longitud}}" value="">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="{{ $inputs['empresas']->nombre }}" titulo="Nombre de la sucursal" holder="" required="true" options='' validationclass='' error=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="{{ $inputs['empresas']->prefijo }}" titulo="Prefijo" holder="" required="true" options='' validationclass='' error=''></x-form.input>
                </div>
                
                <div class="col-sm-4">
                    <x-form.select id="{{ $inputs['empresas']->id_encargado }}" titulo="Encargado" required="" multiple='' class='genero'/>
                </div>
                
            </div>
            <div class=" mb-3">
                <span class="h3">Ubicación</span>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <x-form.select id="{{ $inputs['empresas']->id_estado }}" titulo="Estado" required="true" multiple='' class='est'/>
                    </div>
                <div class="col-sm-4">
                    <x-form.select id="{{ $inputs['empresas']->id_municipio }}" titulo="Municipio" required="true" multiple='' class='mun'/>
                </div>
                
                <div class="col-sm-4">
                    <x-form.input tipo="number" id="{{ $inputs['empresas']->cp }}" titulo="Código postal" holder="" required="" options='' validationclass='' error=''></x-form.input>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="{{ $inputs['empresas']->calle }}" titulo="Calle" holder="" required="" options='' validationclass='' error=''></x-form.input>
                    </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="{{ $inputs['empresas']->interior }}" titulo="No. Interior" holder="" required="" options='' validationclass='' error=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="{{ $inputs['empresas']->exterior }}" titulo="No. Exterior" holder="" required="" options='' validationclass='' error=''></x-form.input>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12" style="height: 15rem;">
                    <div id="map-canvas-0" style="width: 100%; height: 100%; margin: 0; padding: 0; position: relative; overflow: hidden;"></div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" style="margin-right: 4px"> <i class="bi-check-lg"></i> Guardar</button>
                <button type="button" class="btn btn-white text-danger" data-bs-dismiss="modal"> <i class="bi-x-lg"></i> Cancelar</button>
            </div>
        </form>
    </x-slot>
    @push('js_modulo')
        const select_estado = tom_select.find(element => element.inputId == '{{ $inputs["empresas"]->id_estado }}');
        const select_municipio = tom_select.find(element => element.inputId == '{{ $inputs["empresas"]->id_municipio }}');
        let map;
        let bounds = new google.maps.LatLngBounds();
        let markers = [];
        let marker_0;

        $("#{{ $inputs["empresas"]->id_estado }}").on('change', function(event){
            const id_estado = $(this).val()
            estado(id_estado);
        });
        

        const get = (data) =>{
            

            $.each(data.posts, function(index, value) {
                if(index === '{{ $inputs["empresas"]->id_estado }}' ) {
                    if(index === '{{ $inputs["empresas"]->id_estado }}'){
                        estado(value)
                        select_municipio.setValue([data.posts.{{ $inputs["empresas"]->id_municipio }}])
                    }
                    const select = tom_select.find(element => element.inputId == index);
                    select.setValue([value])
                }else{
                    $('#ModalClientes #'+index).val(value);
                }
            });

            let nuevaPosicion = new google.maps.LatLng(data.posts.{{ $inputs["empresas"]->latitud}}, data.posts.{{ $inputs["empresas"]->longitud}});

            marker_0.setPosition(nuevaPosicion);
            map.setCenter(nuevaPosicion);
        }

        const estado = (id_estado) =>{
            const select_municipio = tom_select.find(element => element.inputId == '{{ $inputs["empresas"]->id_municipio }}');
            select_municipio.clearOptions();
            const municipio_find = municipio.filter(element => element.id_estado == id_estado)
            $.each(municipio_find, function(index, value) {
                select_municipio.addOption({value: value.id, text: value.municipio})
            })
        }
        
        $("body").on('click', '.cp-b', function(e) {
            let cp_id = $('#ModalClientes #{{ $inputs["empresas"]->cp }}').val()
            if(cp_id.length == 5){
                HSCallGet.init('{{ url('cp')}}/'+cp_id,get_cp)
            }else{
                warningSwal('Revise el campo','Revise el campo de C.P., debe de estar compuesto por 5 caracteres numericos');
            }
        });

        const get_cp = (data) =>{
            let apiUrl = `https://api.opencagedata.com/geocode/v1/json?q=${data.cp}&key=c42b7e0594d240b2bb2ccb41bd2da7b2`;

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    let cod = 'ISO_3166-1_alpha-2';
                    $.each(data.results, function(index, value) {
                        if(value.components['ISO_3166-1_alpha-2'] == 'MX'){
                            let lat_geo = data.results[index].geometry.lat;
                            let long_geo = data.results[index].geometry.lng;
                            $("#ModalClientes #{{ $inputs["empresas"]->latitud}}").val(lat_geo);
                            $("#ModalClientes #{{ $inputs["empresas"]->longitud}}").val(long_geo);
                            let nuevaPosicion = new google.maps.LatLng(lat_geo, long_geo);
                            marker_0.setPosition(nuevaPosicion);
                            map.setCenter(nuevaPosicion);
                        }
                    })
                },
                error: function(error) {
                    console.error("Error en la solicitud:", error);
                }
            });
        }

        function initMap() {
            var infowindow = new google.maps.InfoWindow();
            var position = new google.maps.LatLng(20.072465021082, -98.696024344599);

            map = new google.maps.Map(document.getElementById('map-canvas-0'), {
                center: { lat: 20.072465021082, lng: -98.696024344599 },
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI:  false ,
                zoomControl:  true ,
                mapTypeControl:  true ,
                scaleControl:  false ,
                streetViewControl:  false ,
                rotateControl:  false ,
                fullscreenControl:  false ,
                gestureHandling: 'auto',
            });

            map.setTilt(0);

            var infowindows = [];
            var shapes = [];
            var markerPosition_0 = new google.maps.LatLng(20.072465021082, -98.696024344599);

            marker_0 = new google.maps.Marker({
                position: markerPosition_0,
                draggable: true,
                title: "",
                label: "",
                animation: google.maps.Animation.DROP,
                icon: "",
            });  

            bounds.extend(marker_0.position);
            marker_0.setMap(map);
            markers.push(marker_0);
            
            google.maps.event.addListener(marker_0, 'dragend', function(event) {
                $("#ModalClientes #{{ $inputs["empresas"]->latitud}}").val(event.latLng.lat());
                $("#ModalClientes #{{ $inputs["empresas"]->longitud}}").val(event.latLng.lng());
            });

            var idleListener = google.maps.event.addListenerOnce(map, "idle", function() {
                map.setZoom(15);
            });
            
            var markerClusterOptions = {
                imagePath: '//googlearchive.github.io/js-marker-clusterer/images/m',
                gridSize: 60,
                maxZoom: null,
                averageCenter: false,
                minimumClusterSize: 2
            };
            var markerCluster = new MarkerClusterer(map, markers, markerClusterOptions);

            window.addEventListener('load', map);
        }

        initMap()
    
    @endpush
</x-modal.modal>