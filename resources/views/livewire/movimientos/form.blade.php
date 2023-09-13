<div class="widget-content-area">
    <div class="widget-one">
        <form >
            <h3>
                Crear/Editar Movimientos
            </h3>
            @include('common.messages')
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-12 ">
                    <label>Tipo</label>
                    <select class="form-control" name="" wire:model="tipo" id="">
                        <option value="Elegir">Elegir</option>
                        <option value="Ingreso">Ingreso</option>
                        <option value="Pago de Renta">Pago de Renta</option>

                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 ">
                    <label>Monto</label>
                    <input type="number" name="" wire:model.lazy="monto" class=" form-control text-center" id="" placeholder="ej: 100.00">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 ">
                    <label>Comprobante</label>
                    <input type="file" name="" wire:change="$emit('fileChoosen',this)" accept="image/x-png image/gif image/jpeg" class="  " id="image" >
                </div>

               
                <div class="form-group col-lg-12 mb-8 col-sm-12 ">
                    <label>Ingresa la descripción</label>
                    <input type="text" name="" wire:model.lazy="concepto" class=" form-control text-center" id="" placeholder="...">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-2  text-left">
                             <button type="button" wire:click="doAction(1)" class="btn btn-danger">
                                 <i class="mbri-left"></i> Regresar
                             </button>
                             <button type="button"
                             wire:click="StoreOrUpdate() " 
                             class="btn btn-primary ml-2">
                             <i class="mbri-success"></i> Guardar
                         </button>
                     </div>
            </div>
        </form>
    </div>
</div>