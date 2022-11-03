<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="serie"></label>
                <input wire:model="serie" type="text" class="form-control" id="serie" placeholder="Serie">@error('serie') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_com"></label>
                <input wire:model="fecha_com" type="text" class="form-control" id="fecha_com" placeholder="Fecha Com">@error('fecha_com') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="can_total"></label>
                <input wire:model="can_total" type="text" class="form-control" id="can_total" placeholder="Can Total">@error('can_total') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="hiden"></label>
                <input wire:model="hiden" type="text" class="form-control" id="hiden" placeholder="Hiden">@error('hiden') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fuente_id"></label>
                <input wire:model="fuente_id" type="text" class="form-control" id="fuente_id" placeholder="Fuente Id">@error('fuente_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="proyecto_id"></label>
                <input wire:model="proyecto_id" type="text" class="form-control" id="proyecto_id" placeholder="Proyecto Id">@error('proyecto_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="proveedor_id"></label>
                <input wire:model="proveedor_id" type="text" class="form-control" id="proveedor_id" placeholder="Proveedor Id">@error('proveedor_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
