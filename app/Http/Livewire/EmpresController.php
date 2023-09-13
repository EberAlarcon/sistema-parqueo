<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
class EmpresController extends Component
{
    public $nombre, $telefono, $email, $direccion, $logo;

    public function mount()
    {
       $empresa=Empresa::all();
       if ($empresa->count()>0) {
         $this->nombre=$empresa[0]->nombre;
       $this->telefono=$empresa[0]->telefono;
       $this->direccion=$empresa[0]->direccion;
       $this->email=$empresa[0]->email;
       $this->logo=$empresa[0]->logo;
       }
      
    }
    public function render()
    {
        return view('livewire.empresas.component');
    }
    public function Guardar()
    {
        $rules=[
            'nombre'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'direccion'=>'required',
        ];
        $customMessages=[
            'nombre.required'=>'El Nombre de la Empresa es requerido',
            'telefono.required'=>'El telefono de la Empresa es requerido',
            'email.required'=>'El Correo de la Empresa es requerido',
            'direccion.required'=>'La Direccion de la Empresa es requerido',
        ];
        $this->validate($rules,$customMessages);
        $record=Empresa::all();
        $rutaImagen = 'images/logos/'.$record[0]->logo; // obtener la ruta completa de la imagen
    
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen); // eliminar la imagen del servidor
        }
        DB::table('empresas')->truncate();
        $caja= Empresa::create([
            'nombre'=>$this->nombre,
            'telefono'=>$this->telefono,
            'direccion'=>$this->direccion,
            'email'=>$this->email,

        ]);
        if($this->logo)
			{
				$image = $this->logo;
				$fileName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
				$moved = \Image::make($image)->save('images/logos/'.$fileName);

				}
				if($moved) 
				{
					$caja ->logo = $fileName;
					$caja->save();
			}
        $this->emit('msgok','Informacion de Empresa registrada');
       

    }
    protected $listeners = [
		
		'fileUpload' =>'handleFileUpload'
	];


	public function handleFileUpload($imageData)
	{
		$this->logo = $imageData;
	}
}
