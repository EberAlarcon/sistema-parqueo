<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Component
{
    public $tipo='Elegir', $nombre, $telefono,$password, $movil,$email;
    public $selected_id,$search;
    public $action=1, $pagination=5;
    use WithPagination;
    public function render()
    {
        
        if (strlen($this->search)>0) {
            $info=User::where('nombre','LIKE', '%'.$this->search.'%')
            ->where('email','LIKE', '%'.$this->search.'%')->simplePaginate($this->pagination);
            return view('livewire.usuario.component',[
                'info'=>$info
            ]);
        }
        else{
            $info = User::simplePaginate($this->pagination);
            return view('livewire.usuario.component',[
                'info'=>$info
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
        $this->nombre='';
        $this->selected_id=null;
        $this->action=1;
        $this->search='';
        $this->telefono='';
        $this->movil='';
        $this->tipo='Elegir';
        $this->email='';
        $this->password='';
       
    }
    //funcion para cargar los input con los datos de la BD
    public function edit($id)
    {
       $record=User::find($id);
       $this->nombre=$record->nombre;
        $this->selected_id=$record->id;
        $this->action=2;
        $this->telefono=$record->telefono;
        $this->movil=$record->movil;
        $this->tipo=$record->tipo;
        $this->email=$record->email;
        $this->password=$record->password;
  
    }
    //funcion para eliminar un registro de usuario
    public function destroy($id)
    {
        $record=User::find($id);
        $record->delete();
        $this->resetInput();
    }
    public function StoreOrUpdate()
    {
       $rules=[
        'nombre'=>'required',
        'telefono'=>'required',
        'movil'=>'required',
        'email'=>'required',
        'tipo'=>'not_in:Elegir|required',
        
        
       ];
       $customMessages=[
        'nombre.required'=>'El nombre de usuario es requerido',
        'telefono.required'=>'El telefono de usuario es requerido',
        'movil.required'=>'El movil de usuario es requerido',
        'email.required'=>'El Correo de usuario es requerido',
        'tipo.not_in'=>'Debe escoger una opcion valida de tipo',
        'tipo.required'=>'El tipo de usuario es requerido',
       ];
       $this->validate($rules,$customMessages);
       if ($this->selected_id>0) {
        $record=User::find($this->selected_id);
        $record->update([
            'nombre'=>$this->nombre,
            'telefono'=>$this->telefono,
            'movil'=>$this->movil,
            'email'=>$this->email,
            'tipo'=>$this->tipo,
            'password' => $this->password,
        ]);
        $this->resetInput();
       }
       else {
        $record=User::create([
            'nombre'=>$this->nombre,
            'telefono'=>$this->telefono,
            'movil'=>$this->movil,
            'email'=>$this->email,
            'tipo'=>$this->tipo,
            'password' => $this->password,

        ]);
       }
       if($this->selected_id)
       $this->emit('msgok','El usuario fue Actualizado con Éxito');
       else
       $this->emit('msgok','El usuario fue creado con Éxito');
       $this->resetInput();
    }
      //Listeners/escuchar eventos
      protected $listeners=[
        'deleteRow'=>'destroy'
            ];
}
