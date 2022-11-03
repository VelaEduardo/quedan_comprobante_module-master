<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comprobante;

class Comprobantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $serie, $fecha_com, $can_total, $hiden, $fuente_id, $proyecto_id, $proveedor_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.comprobantes.view', [
            'comprobantes' => Comprobante::latest()
						->orWhere('serie', 'LIKE', $keyWord)
						->orWhere('fecha_com', 'LIKE', $keyWord)
						->orWhere('can_total', 'LIKE', $keyWord)
						->orWhere('fuente_id', 'LIKE', $keyWord)
						->orWhere('proyecto_id', 'LIKE', $keyWord)
						->orWhere('proveedor_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->serie = null;
		$this->fecha_com = null;
		$this->can_total = null;
		$this->fuente_id = null;
		$this->proyecto_id = null;
		$this->proveedor_id = null;
    }

    public function store()
    {
        $this->validate([
		'serie' => 'required',
		'fecha_com' => 'required',
		'can_total' => 'required',
		
		'fuente_id' => 'required',
		'proyecto_id' => 'required',
		'proveedor_id' => 'required',
        ]);

        Comprobante::create([ 
			'serie' => $this-> serie,
			'fecha_com' => $this-> fecha_com,
			'can_total' => $this-> can_total,
		
			'fuente_id' => $this-> fuente_id,
			'proyecto_id' => $this-> proyecto_id,
			'proveedor_id' => $this-> proveedor_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Comprobante Successfully created.');
    }

    public function edit($id)
    {
        $record = Comprobante::findOrFail($id);

        $this->selected_id = $id; 
		$this->serie = $record-> serie;
		$this->fecha_com = $record-> fecha_com;
		$this->can_total = $record-> can_total;
		
		$this->fuente_id = $record-> fuente_id;
		$this->proyecto_id = $record-> proyecto_id;
		$this->proveedor_id = $record-> proveedor_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'serie' => 'required',
		'fecha_com' => 'required',
		'can_total' => 'required',
		
		'fuente_id' => 'required',
		'proyecto_id' => 'required',
		'proveedor_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Comprobante::find($this->selected_id);
            $record->update([ 
			'serie' => $this-> serie,
			'fecha_com' => $this-> fecha_com,
			'can_total' => $this-> can_total,
			
			'fuente_id' => $this-> fuente_id,
			'proyecto_id' => $this-> proyecto_id,
			'proveedor_id' => $this-> proveedor_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Comprobante Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Comprobante::where('id', $id);
            $record->delete();
        }
    }
}
