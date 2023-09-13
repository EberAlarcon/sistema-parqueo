<?php

namespace App\Http\Livewire;
use  Livewire\WithPagination;
use App\Models\Cajon;
use App\Models\Tipo;


use Livewire\Component;

class Cajones extends Component
{
    //Paginacion
    use WithPagination;
    //Propiedades
    public $tipo= 'Elegir',$descripcion,$estatus='DISPONIBLE',$tipos;
    public $selected_id, $search;
    public $action=1, $pagination=5;

    public function mount(){
      //  $this->name='Reyes Macias';
     
    }
    public function render()
    {
         $this->tipos = Tipo::all();
        //Para la dar el resultado de busqueda
        if (strlen($this->search)> 0) {
            $info=Cajon::leftjoin('tipos as t','t.id','cajones.tipo_id')
            ->select('cajones.*','t.descripcion as tipo')
            ->where('cajones.descripcion','LIKE','%'.$this->search.'%')
            ->orWhere('cajones.estatus','LIKE','%'.$this->search.'%')
            ->paginate($this->pagination);
            return view('livewire.cajones.component',[
                'info'=>$info
            
            ]);
        }
        //para filtrar lo datos de cuando carga la pagina.
        else{
            $info=Cajon::leftjoin('tipos as t','t.id','cajones.tipo_id')
            ->select('cajones.*','t.descripcion as tipo')
            ->orderBy('cajones.id','desc')
            ->paginate($this->pagination);
            return view('livewire.cajones.component',[
                'info'=>$info
              
            ]);
        }
        
    }
    //paginado por busqueda
    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
    public function doAction($action)
    {
        $this->resetInput();
        $this->action=$action;
    }
    public function resetInput()
    {
       $this->descripcion='';
       $this->tipo='Elegir';
       $this->estatus='DISPONIBLE';
       $this->action=1;
       $this->selected_id=null;
       $this->search='';
    }
    public function edit($id)
    {
        $record=Cajon::find($id);
        $this->tipo=$record->tipo_id;
        $this->descripcion=$record->descripcion;
        $this->estatus=$record->estatus;
        $this->selected_id=$record->id;
        $this->action=2;
    }
    public function StoreOrUpdate()
    {
       $this->validate([
        'tipo'=>'not_in:Elegir'
       ]);
       $this->validate([
        'tipo'=> 'required',
        'descripcion'=>'required',
        'estatus'=>'required'
       ]);
       if ($this->selected_id <= 0) {
       $cajon=Cajon::create([
        'descripcion'=>$this->descripcion,
        'tipo_id'=>$this->tipo,
        'estatus'=>$this->estatus
       ]);
       }
       else{
        $record=Cajon::find($this->selected_id);
        $record->update([
            'descripcion'=>$this->descripcion,
            'tipo_id'=>$this->tipo,
            'estatus'=>$this->estatus
        ]);
       }
       if ($this->selected_id) 
        $this->emit('msgok','Cajon Actualizado con Éxito');
       else
        $this->emit('msgok','Cajon fue creado con Éxito');
       $this->resetInput();
    }
    public function destroy($id)
    {
       if ($id) {
        $record=Cajon::where('id',$id);
        $record->delete();
        $this->resetInput();
        $this->emit('msgok','Registro Eliminado con exito');
       }
    }
     //Listeners/escuchar eventos
     protected $listeners=[
        'deleteRow'=>'destroy'
            ];
}
