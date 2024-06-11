<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Solicitudes</h2>
        <button wire:click="create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Crear Solicitud
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Plan</th>
                    <th>Usuario</th>
                    <th>Email usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->plan->name }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->user->email }}</td>
                        <td>
                            <button wire:click="edit({{ $request->id }})" class="btn btn-sm btn-primary me-2" title="Editar">
                                <i class="fas fa-edit"></i>Editar
                            </button>
                            <button wire:click="destroy({{ $request->id }})" class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron solicitudes</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($openCreate)
        <!-- Modal for creating a new request -->
    @endif

    @if ($openUpdate)
        <!-- Modal for updating an existing request -->
    @endif
</div>