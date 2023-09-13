<div class="widget-content-area">
    <div class="widget-one">
        @include('common.messages')

        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Nombre</label>
                <input type="text" wire:model="descripcion" class="form-control" placeholder="nombre">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Tipo</label>
                <select class="form-control" name="" id="" wire:model="tipo">
                    <option value="Elegir" disabled>Elegir</option>
                    @foreach ($tipos as $t)
                        <option value="{{$t->id}}">{{$t->descripcion}}</option>
                    @endforeach
                </select>
                
               
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="Estatus">Estatus</label>
                <select name="" class="form-control" id="" wire:model="estatus">
                    <option value="DISPONIBLE">DISPONIBLE</option>
                    <option value="OCUPADO">OCUPADO</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-2 text-left">
                    <button type="button" class="btn btn-danger" wire:click="doAction(1)">
                        <i class="mbri-left"></i>
                        Regresar
                    </button>
                    <button  type="button"  class="btn btn-primary ml-2" wire:click.prevent="StoreOrUpdate()">
                        <i class="mbri-succes"></i>
                        Guardar
                    </button>
                </div>
            </div>
           
        </div>
    </div>

</div>