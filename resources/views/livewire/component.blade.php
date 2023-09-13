<div>
    @if ($section ==1)
    <div class="main-content">
        <div class="layout-xp-spacing">
            <div class="row">

                <div class="col-lg12 layout-xp spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 mt-3">
                                    <h3 class="text-center">Rentas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-conent widget-conent-area">

            <div class="row mt-1">
                {{-- div barcode --}}
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="la la.barcode"></i> </span>
                        </div>
                        <input type="text" id="code" wire:keydown.enter="$emit('doCheckOut', '', 2)" wire:model="barcode" class="form-control" maxlength="9" placeholder="Escanea el codigo de barras" autofocus>
                        <div class="iput-group-append">
                            <span wire:click="$set('barcode', '')" class="input-group-text" style="cursor:pointer;"> <i class="la la-remove la-lg"></i>
                            </span>
                        </div>
                    </div>
                </div>
                {{-- div ticket visita --}}
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <button wire:click.prevent="TicketVisita()" class="btn btn-primary btn-lg btn-block">
                        Ticket de visita
                    </button>
                </div>

                {{-- div ticket de renta --}}
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <button wire:click.prevent="$set('section', 3)" class="btn btn-primary btn-lg btn-block">
                        Ticket de Rentas
                    </button>
                </div>

            </div>

            {{-- div de cajones --}}
            <div class="row">
                <div class="col">
                    <div class="row">
                        @foreach ($cajones as $c)
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xm-6"></div>
                            
                        @endforeach
                    </div>
                </div>
            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        

</div>
