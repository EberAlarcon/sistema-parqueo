<div class="widget-content-area">
    <div class="widget-one">
        <div class="row">
            @include('common.messages')
            <div class="col-12">
                <h4 class="text-center">
                    Datos de la empresa
                </h4>
            </div>
            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label >Nombre</label>
                <input type="text" wire:model.lazy="nombre" class="form-control text-left">
            </div>
            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label >Telefono</label>
                <input type="text" wire:model.lazy="telefono" maxlength="12" class="form-control text-left">
            </div>
            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label >Email</label>
                <input type="text" wire:model.lazy="email" maxlength="65" class="form-control text-left">
            </div>
            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label >Direccion</label>
                <input type="text" wire:model.lazy="direccion" class="form-control text-left">
            </div>
            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label >Logo</label>
                <input type="file" name="" wire:change="$emit('fileChoosen',this)" accept="image/x-png image/gif image/jpeg" class="form-control-file  " id="image" >
            </div>
            
            <div class="col-sm-12 text-center mt-5" >
                <button type="button" class="btn btn-primary" wire:click.prevent="Guardar">
                    <i class="mbri-success"></i>
                    Guardar
                </button>
            </div>
        </div>
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
      
    </script>
</div>