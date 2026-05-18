<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use TallStackUi\Traits\Interactions;

final class ServiceTable extends PowerGridComponent
{
    public string $tableName = 'serviceTable';

    use Interactions;
    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Service::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('status')
            ->add('created_at_formatted', function (Service $service) {
                return $service->created_at
                    ? $service->created_at->translatedFormat('d M Y')
                    : 'Sin fecha';
            });

    }

    public function columns(): array
    {
        return [
            Column::make('Nombre', 'name')
                ->searchable(),

            Column::make('Descripción', 'description')
                ->searchable(),

            Column::make('Precio', 'price')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Fecha de creación', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Acciones')
        ];
    }

    public function actions(Service $row): array
    {
        return [
            Button::add('edit')
                ->id()
                ->slot('<i class="fa-regular fa-pen-to-square"></i>')
                ->tooltip('Editar servicio')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-indigo-500 text-white transition hover:bg-indigo-600 cursor-pointer')
                ->route('admin.services.edit', ['service' => $row->id]),

            Button::add('delete')
                ->id()
                ->slot('<i class="fa-regular fa-trash-can"></i>')
                ->tooltip('Eliminar servicio')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-red-500 text-white transition hover:bg-red-600 cursor-pointer')
                ->dispatch('confirmService', ['service' => $row->id]),
        ];
    }

    #[On('confirmService')]
    public function confirmService($service){
        $this->dialog()
            ->question('Eliminar Servicio', '¿Estás seguro de eliminar este empleado? Esta acción no se puede deshacer.')
            ->confirm('Eliminar', 'deleteService', $service)
            ->cancel('Cancelar')
            ->send();
    }

    public function deleteService($service){
        $service = Service::findOrFail($service);
        $this->toast()
            ->success('Eliminación Exitosa', 'Servicio eliminado correctamente')
            ->flash()
            ->send();
        $service->delete();
    }

}
