<div>

    <h2>Servicios</h2>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('main') }}" class="btn btn-outline-info">Principal</a>
        <button class="btn btn-primary" wire:click="create">
            <i class="fas fa-plus me-2"></i> Crear Servicio
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>${{ number_format($service->price, 2) }}</td>
                        <td>
                            <button wire:click="edit({{ $service->id }})" class="btn btn-sm btn-primary me-2"
                                title="Editar">
                                <i class="fas fa-edit"></i>Editar
                            </button>
                            <button wire:click="destroy({{ $service->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar">
                                <i class="fas fa-trash"></i>Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No se encontraron servicios</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($openCreate)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Crear Servicio</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openCreate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="store">
                            <div class="mb-3">
                                <label for="nameCreate" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nameCreate"
                                    placeholder="Ingrese el nombre del servicio..." wire:model.lazy="nameCreate">
                                @error('nameCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descriptionCreate" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descriptionCreate" rows="3"
                                    placeholder="Ingrese la descripción del servicio..." wire:model.lazy="descriptionCreate"></textarea>
                                @error('descriptionCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="priceCreate" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="priceCreate"
                                    placeholder="Ingrese el precio del servicio..." wire:model.lazy="priceCreate">
                                @error('priceCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="$set('openCreate', false)">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif

    @if ($openUpdate)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Actualizar Servicio</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openUpdate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="nameUpdate" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nameUpdate"
                                    placeholder="Ingrese el nombre del servicio..." wire:model.lazy="nameUpdate">
                                @error('nameUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descriptionUpdate" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descriptionUpdate" rows="3"
                                    placeholder="Ingrese la descripción del servicio..." wire:model.lazy="descriptionUpdate"></textarea>
                                @error('descriptionUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="priceUpdate" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="priceUpdate"
                                    placeholder="Ingrese el precio del servicio..." wire:model.lazy="priceUpdate">
                                @error('priceUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="$set('openUpdate', false)">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif



</div>
