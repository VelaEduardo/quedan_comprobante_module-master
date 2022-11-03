@section('title', __('Comprobantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Comprobante de Retencion </h4>
						</div>
						<div wire:poll.60s>
						<code><h5>Fecha de hoy: {{ now()->format('d-m-Y') }} </h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Comprobantes">
						</div>
						<div>
							<div class="btn btn-sm btn-info" data-toggle="modal"  data-target="#createDataModal">
							<!-- wire:click.prevent="loadCreateQdn()" -->
							<i class="fa fa-plus"></i>    Añadir Comprobante
							</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.comprobantes.create')
						@include('livewire.comprobantes.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<!-- <td>#</td>  -->
								<th>Serie</th>
								<th>Fecha</th>
								<th>Cantidad Total</th>
								<th>Fuente</th>
								<th>Proyecto</th>
								<th>Proveedor</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($comprobantes as $row)
							<tr>
								<!-- <td>{{ $loop->iteration }}</td>  -->
								<td>{{ $row->serie }}</td>
								<td>{{ date("d-m-Y", strtotime($row->fecha_com)) }}</td>
								<td>${{ number_format($row->can_total, 2 )  }}</td>
								
								<td>{{ $row->fuente->nombre_fuente }}</td>
								<td>{{ $row->proyecto->nombre_proyecto }}</td>
								<td>{{ $row->nombre_proveedor }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Comprobante id {{$row->id}}? \nDeleted Comprobantes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $comprobantes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
