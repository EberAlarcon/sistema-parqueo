<div class="widget-content-area">
    <div class="widget-one">
        @include('common.messages')
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Nombre:</label>
                <input type="text" wire:model.lazy="nombre" class="form-control" placeholder="nombre">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Teléfono:</label>
                <input type="text" wire:model.lazy="telefono" class="form-control" placeholder="telefono">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Movil:</label>
                <input type="text" wire:model.lazy="movil" class="form-control" placeholder="movil">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Email:</label>
                <input type="text" wire:model.lazy="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Contraseña:</label>
                    <input type="text" wire:model.lazy="password" class="form-control" placeholder="Contraseña">
                </div>  
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Tipo:</label>
                <select name="" wire:model="tipo" class="form-control text-center">
                    <option value="Elegir">Elegir</option>
                    <option value="Admin">Admin</option>
                    <option value="Empleado">Empleado</option>
                </select>
                
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mt-2 text-left">
                <button type="button" wire:click.prevent=doAction(1) class=" btn btn-dark mr-1">
                    <i class="mbri-left"></i>Regresar
                </button>
                <button type="button" wire:click.prevent=StoreOrUpdate()  class="btn btn-primary ml-2">
                    <i class="mbri-success"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>