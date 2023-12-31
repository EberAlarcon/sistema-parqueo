<div class="row layout-top-spacing">
    <div class="col-sm-12 col-md-12 col-lg-12 layout-spacing">
        @if($action==1)
            <div class="widget-content-area br-4">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h5><b>Cajones de Estacionamiento</b></h5>
                        </div>
                    </div>
                </div>
                @include('common.search')
                <!-- Tabla-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DESCRIPCION</th>
                                <th>ESTATUS</th>
                                <th>TIPO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $r)
                            <tr>
                                <td>
                                    {{$r->id}}
                                </td>
                                <th>{{$r->descripcion}}</th>
                                <th>{{$r->estatus}}</th>
                                <th>{{$r->tipo}}</th>
                                <th class="text-center">
                                    @include('common.actions')
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$info->links()}}
                </div>
            </div>
        @elseif($action==2)
        @include('livewire.cajones.form',[$tipos])
        @endif
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
        
        
        
        </script>
</div>