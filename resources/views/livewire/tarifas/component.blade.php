<div class="row layout-top-spacing">
    <div class="col-sm-12 col-md-12 col-lg-12 layout-spacing">
       
            <div class="widget-content-area br-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h5><b>Tarifas de Sistema</b></h5>
                        </div>
                    </div>
                </div>
<!--buscador-->
     <div class="row justify-content-between mb-4 mt-3">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="input-group ">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                            </div>
                                <input type="text" wire:model="search" class="form-control" placeholder="Buscar.." aria-label="notification" aria-describedby="basic-addon1">
                        </div>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-12 mt-2 mb-2 text-right mr-2">
                <button type="button" onclick='openModal("{{$jerarquia}}")'' class="btn btn-dark">
                    <i class="la la-file la-lg"></i>
                </button>
            </div>
        </div>
<!--/buscador-->

       

                <!-- Tabla-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TIEMPO</th>
                                <th>DESCRIPCION</th>
                                <th>COSTO</th>
                                <th>TIPO</th>
                                <th>JERARQUIA</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $r)
                            <tr>
                                <td>
                                    {{$r->id}}
                                </td>
                                <th>{{$r->tiempo}}</th>
                                <th>{{$r->descripcion}}</th>
                                <th>{{$r->costo}}</th>
                                <th>{{$r->tipo}}</th>
                                <th>{{$r->jerarquia}}</th>
                                <th class="text-center">
                                  <!--Actions-->
                                  <ul class="table-controls">
        
                                    <li>
                                        <a href="javascript:void(0);" onclick="editTarifa('{{$r}}')" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                    </li>
                                
                                    <li>
                               
                                       
                                        <a href="javascript:void(0);"          		
                                            onclick="Confirm('{{$r->id}}')"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                         
                                        
                                    </li>
                                
                                    
                                  </ul>
                                  <!--/action-->

                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$info->links()}}
                </div>
            </div>
      
        @include('livewire.tarifas.modal',[$tipos])
        <input type="hidden" id="id" value="0">
     
    </div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        
        
        });
        
        
        function Confirm(id)
        {
        
         let me = this
         const swalWithBootstrapButtons = Swal.mixin({
          
          buttonsStyling: true
        })
        
        swalWithBootstrapButtons.fire({
          title: 'CONFIRMAR',
          text: "¿DESEAS ELIMINAR EL REGISTRO?",
          icon: 'Warning',
          showCancelButton: true,
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          reverseButtons: true,
          closeOnConfirm: false
        }).then((result) => {
          if (result.isConfirmed) {
            
            console.log('ID', id);
                        window.livewire.emit('deleteRow', id)    //emitimos evento deleteRow
                        toastr.success('info', 'Registro eliminado con éxito') //mostramos mensaje de confirmación 
                        swal.close()   //cerramos la modal
                    
          } else {
            swal.close()   
          }
        })
         /*
         swal({
            title: 'CONFIRMAR',
            text: '¿DESEAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false
        },
        function() {
            console.log('ID', id);
                        window.livewire.emit('deleteRow', id)    //emitimos evento deleteRow
                        toastr.success('info', 'Registro eliminado con éxito') //mostramos mensaje de confirmación 
                        swal.close()   //cerramos la modal
                    })
        
        */
        
        
        }
        function editTarifa(row){
            
            $('#id').val(info.id)
            $('#costo').val(info.costo)
            $('#descripcion').val(info.descripcion)
            $('#tiempo').val(info.tiempo)
            $('#jerarquia').val(info.jerarquia)
            $('.modal-title').text('Editar Tarifa')
            $('#modalTarifa').modal('show')
        }
        function openModal(jerarquia){
            $('#ids').val(0)
            $('#costo').val('')
            $('#descripcion').val('')
            $('#tiempo').val('Elegir')
            $('#tipo').val('Elegir')
            $('#jerarquia').val(jerarquia)
            $('.modal-title').text('Crear Tarifa')
            $('#modalTarifa').modal('show')
        }
        function save(){
            if ($('#tiempo option:selected').val()=='Elegir') {
                toastr.error('Elige una opcion valida para el tiempo')
                return;
            }
            if ($('#tipo option:selected').val()=='Elegir') {
                toastr.error('Elige una opcion valida para el tipo')
                return;
            }
            if ($.trim($('#costo').val())=='') {
                toastr.error('Ingresa un costo valido')
                return;
            }
            var data=JSON.stringify({
                'id':$('#ids').val(),
                'tiempo':$('#tiempo option:selected').val(),
                'tipo':$('#tipo option:selected').val(),
                'costo':$('#costo').val(),
                'descripcion':$('#descripcion').val(),
                'jerarquia':$('#jerarquia').val(),
            });
            window.livewire.emit('createFromModal',data)
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('msg-ok',dataMsg=>{
                $('#modalTarifa').modal('hide')
            })
            window.livewire.on('msg-error',dataMsg=>{
                $('#modalTarifa').modal('hide')
            })
        
    });
        </script>
</div>