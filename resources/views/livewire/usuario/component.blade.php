<div class="row layout-top-spacing">    
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
       @if($action == 1)                

       <div class="widget-content-area br-4">
         <div class="widget-header">
            <div class="row">
               <div class="col-xl-12 text-center">
                  <h5><b>Usuarios del Sistemas</b></h5>
              </div> 
          </div>
      </div>
      @include('common.search') <!-- búsqueda y botón para nuevos registros -->

      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
           <thead>
              <tr>                                                   
                 <th class="">NOMBRE</th>
                 <th class="">TELEFONO</th>
                 <th class="">MOVIL</th>
                 <th class="">TIPO</th>
                 <th class="">EMIAL</th>
                 <th class="text-center">ACCIONES</th>
             </tr>
         </thead>
         <tbody>
          @foreach($info as $r) <!-- iteración para llenar la tabla-->
          <tr>

             <td><p class="mb-0">{{$r->nombre}}</p></td>
             <td>{{$r->telefono}}</td>
             <td>{{$r->movil}}</td>
             <td>{{$r->email}}</td>
             <td>{{$r->tipo}}</td>
             <td class="text-center">
                @include('common.actions') <!-- botons editar y eliminar -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$info->links()}} <!--paginado de tabla -->
</div>

</div>     

@elseif($action == 2)
@include('livewire.usuario.form')		
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