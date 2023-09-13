<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tipo;
use Livewire\WithPagination;

class Tipos extends Component
{
    use WithPagination;
    //publicas variables
    public $descripcion;
    public $selected_id, $search;
    public $action=1;
    private $pagination=5;

    public function mount(){
        //Inicializar variables o data
    }
    //se ejecuta despues del mount
    public function render()
    {
        $tipos=Tipo::all();
        if (strlen($this->search)>0) {
           $info = Tipo::where('descripcion', 'LIKE', '%'.$this->search.'%')->simplePaginate($this->pagination);
            return view('livewire.tipos.component',[
                'info'=>$info,
                'tipos'=>$tipos
            ]);
        }
        else{
            $info = Tipo::simplePaginate($this->pagination);
            return view('livewire.tipos.component',[
                'info'=>$info,
                'tipos'=>$tipos
            ]); 
        }
        
    }
    //Para busqueda con paginacion
    public function updatingSearch():void
    {
        $this->gotoPage(1);
    }
    //movernos entre ventanas
    public  function doAction($action)
    {
           $this->resetInput();
        $this->action=$action;
     

    }
    // limpiar propiedades
    public function resetInput()
    {
        $this->descripcion='';
        $this->selected_id=null;
        $this->action=1;
        $this->search='';
    }

    //mostrar la info del registro editar
    public function edit($id)
    {
       $record=Tipo::findOrFail($id);
       $this->descripcion=$record->descripcion;
       $this->selected_id=$record->id;
       $this->action=2;
    }
    //eliminar registro
    public  function destroy($id)
    {
        if ($id) {
            $record=Tipo::find($id);
            $record->delete();
            $this->resetInput();
        }
    }
    //Crear y editar elementos
    public function StoreOrUpdate()
    {
        //validar que descripcion tiene info
        $this->validate(['descripcion'=>'required|min:4']);
        //validar si existe otro registro con el mismo nombre
        if ($this->selected_id>0) {
            $existe=Tipo::where('descripcion',$this->descripcion)->where('id','<>',$this->selected_id)
            ->select('descripcion')->get();
            if ($existe->count()>0) {
                session()->flash('msg-error','Ya existe otro registro con la misma descripcion');
                $this->resetInput();
                return;
            }
            
        }
        else{
            $existe=Tipo::where('descripcion',$this->descripcion)->
            select('descripcion')->get();
            if ($existe->count()>0) {
                session()->flash('msg-error','Ya existe otro registro con la misma descripcion');
                $this->resetInput();
                return;
            }
        }
        if ($this->selected_id<=0) 
        {
            //creamos ese registro
            $record=Tipo::create(['descripcion'=>$this->descripcion]);
        }
        else{
            //buscamos el registro
            $record=Tipo::find($this->selected_id);
            $record->update(['descripcion' => $this->descripcion]);
        }
        if ($this->selected_id)
        session()->flash('message','Tipo actualizado');
        else
        session()->flash('message','Tipo creado');

        $this->resetInput();
        
     
    }
    //Listeners/escuchar eventos
    protected $listeners=[
'deleteRow'=>'destroy'
    ];
}
