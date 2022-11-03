<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comprobantefactura;

class Comprobantefacturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $factura_id, $comprobante_id, $hiden;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.comprobantefacturas.view', [
            'comprobantefacturas' => Comprobantefactura::latest()
						->orWhere('factura_id', 'LIKE', $keyWord)
						->orWhere('comprobante_id', 'LIKE', $keyWord)
						->orWhere('hiden', 'LIKE', $keyWord)
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
		$this->factura_id = null;
		$this->comprobante_id = null;
		$this->hiden = null;
    }

    public function store()
    {
        $this->validate([
		'factura_id' => 'required',
		'comprobante_id' => 'required',
		'hiden' => 'required',
        ]);

        Comprobantefactura::create([ 
			'factura_id' => $this-> factura_id,
			'comprobante_id' => $this-> comprobante_id,
			'hiden' => $this-> hiden
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Comprobantefactura Successfully created.');
    }

    public function edit($id)
    {
        $record = Comprobantefactura::findOrFail($id);

        $this->selected_id = $id; 
		$this->factura_id = $record-> factura_id;
		$this->comprobante_id = $record-> comprobante_id;
		$this->hiden = $record-> hiden;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'factura_id' => 'required',
		'comprobante_id' => 'required',
		'hiden' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Comprobantefactura::find($this->selected_id);
            $record->update([ 
			'factura_id' => $this-> factura_id,
			'comprobante_id' => $this-> comprobante_id,
			'hiden' => $this-> hiden
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Comprobantefactura Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Comprobantefactura::where('id', $id);
            $record->delete();
        }
    }
}
