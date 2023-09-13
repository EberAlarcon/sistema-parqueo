<div class="main-content">
    @if($action==1)
    <div class="layout-pc-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <h3>Movimiento De Caja</h3>
                        @include('common.search')
                        @include('common.alerts')
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">DESCRIPCION</th>
                                        <th class="text-center">TIPO</th>
                                        <th class="text-center">MONTO</th>
                                        <th class="text-center">COMPROBANTE</th>
                                        <th class="text-center">FECHA</th>
                                        <th class="text-center">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($info as $r)
                                    <tr>
                                        <td class="text-center">{{$r->concepto}}</td>
                                        <td class="text-center">{{$r->tipo}}</td>
                                        <td class="text-center">{{$r->monto}}</td>
                                        <td class="text-center">
                                            <img class=" rounded" src="images/movs/{{$r->comprobante}}" alt="" height="40">
                                        </td>
                                        <td class="text-center">{{$r->created_at}}</td>
                                        <td class="text-center">
                                            @include('common.actions')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          {{$info->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($action>1)
    @include('livewire.movimientos.form',[$info])
    @endif
</div>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		window.livewire.on('fileChoosen', () => {
			let inputField = document.getElementById('image')
			let file = inputField.files[0]
            console.log(inputField)
			let reader = new FileReader();
			reader.onloadend = ()=> {
				window.livewire.emit('fileUpload', reader.result)
			}
			reader.readAsDataURL(file);
		});	

	});
    function Confirm(id)
        {
        
         let me = this
         const swalWithBootstrapButtons = Swal.mixin({
          
          buttonsStyling: true
        })
        
        swalWithBootstrapButtons.fire({
          title: 'CONFIRMAR',
          text: "¿DESEAS ELIMINAR EL MOVIMIENTO?",
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
                        toastr.success('info', 'MOVIMIENTO eliminado con éxito') //mostramos mensaje de confirmación 
                        swal.close()   //cerramos la modal
                    
          } else {
            swal.close()   
          }
        })
    }
</script>