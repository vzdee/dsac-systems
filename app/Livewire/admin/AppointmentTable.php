<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
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

final class AppointmentTable extends PowerGridComponent
{
    public string $tableName = 'appointmentTable';
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
        // request everything from appointments table
        return Appointment::query('client.user', 'accountant.user', 'service', );
    }

    public function relationSearch(): array
    {
        return [
            'client.user' => ['name', 'last_name',],
            'accountant.user' => ['name', 'last_name',],
            'service' => ['name',],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')

            ->add('client_name', function (Appointment $model) {
                return trim(
                    ($model->client?->user?->name ?? '') . ' ' .
                    ($model->client?->user?->last_name ?? '')
                ) ?: 'Sin cliente';
            })

            ->add('accountant_name', function (Appointment $model) {
                return trim(
                    ($model->accountant?->user?->name ?? '') . ' ' .
                    ($model->accountant?->user?->last_name ?? '')
                ) ?: 'Sin empleado';
            })

            ->add('service_name', function (Appointment $model) {
                return $model->service?->name ?? 'Sin servicio';
            })

            ->add('scheduled_at_formatted', function (Appointment $model) {
                return $model->scheduled_at
                    ? Carbon::parse($model->scheduled_at)->format('d M Y H:i A')
                    : '--';
            })

            ->add('status')

            ->add('price_formatted', function (Appointment $model) {
                return '$' . number_format($model->price ?? 0, 2);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('ID Cita', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Cliente', 'client_name')
                ->searchable(),

            Column::make('Empleado', 'accountant_name')
                ->searchable(),

            Column::make('Tipo de Servicio', 'service_name')
                ->searchable(),

            Column::make('Fecha Programada', 'scheduled_at_formatted', 'scheduled_at')
                ->sortable(),

            Column::make('Estado de la Cita', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Precio', 'price_formatted', 'price')
                ->sortable(),

            Column::action('Acciones'),
        ];
    }

    public function actions(Appointment $row): array
    {
        return [
            Button::add('edit')
                ->id()
                ->slot('<i class="fa-regular fa-pen-to-square"></i>')
                ->tooltip('Editar cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-indigo-500 text-white transition hover:bg-indigo-600 cursor-pointer')
                ->route('admin.appointments.edit', ['appointment' => $row->id]),

            Button::add('delete')
                ->id()
                ->slot('<i class="fa-regular fa-trash-can"></i>')
                ->tooltip('Eliminar cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-red-500 text-white transition hover:bg-red-600 cursor-pointer')
                ->dispatch('confirmService', ['appointment' => $row->id]),
            Button::add('view')
                ->id()
                ->slot('<i class="fa-regular fa-eye"></i>')
                ->tooltip('Ver cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-green-500 text-white transition hover:bg-green-600 cursor-pointer')
                ->route('admin.appointments.show', ['appointment' => $row->id])
        ];
    }

    #[On('confirmService')]
    public function confirmService($appointment)
    {
        $this->dialog()
            ->question('Eliminar Cita', 'Estas seguro de que deseas eliminar esta cita?')
            ->confirm('Eliminar', 'deleteService', $appointment)
            ->cancel('Cancelar')
            ->send();
    }

    public function deleteService($appointment)
    {
        $appointment = Appointment::findOrFail($appointment);
        $appointment->delete();
        $this->toast()
            ->success('Servicio Eliminado', 'El servicio ha sido eliminado correctamente')
            ->flash()
            ->send();
    }
}
