<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use TallStackUi\Traits\Interactions;
use Livewire\Attributes\On;

final class EmployeeTable extends PowerGridComponent
{
    public string $tableName = 'employeeTable';
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
        // find users with role 'Contador'
        return User::role('Contador')
            ->select('users.*');
        ;
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name')
            ->add('last_name')
            ->add('full_name', function (User $user) {
                return $user->name . ' ' . $user->last_name;
            })
            ->add('email')
            ->add('phone_number')
            ->add('rfc')
            ->add('curp')
            ->add('created_at_formatted', function (User $user) {
                return $user->created_at
                    ? $user->created_at->translatedFormat('d M Y')
                    : 'Sin fecha';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Empleado', 'full_name'),

            Column::make('Nombre', 'name')
                ->searchable()
                ->hidden(),

            Column::make('Apellido', 'last_name')
                ->searchable()
                ->hidden(),

            Column::make('Email', 'email')
                ->searchable(),

            Column::make('Teléfono', 'phone_number')
                ->searchable(),

            Column::make('RFC', 'rfc')
                ->searchable(),

            Column::make('CURP', 'curp')
                ->searchable(),

            Column::make('Fecha de Registro', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Acciones'),
        ];
    }

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->id()
                ->slot('<i class="fa-regular fa-pen-to-square"></i>')
                ->tooltip('Editar empleado')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-indigo-500 text-white transition hover:bg-indigo-600 cursor-pointer')
                ->route('admin.employees.edit', ['employee' => $row->id]),

            Button::add('delete')
                ->id()
                ->slot('<i class="fa-regular fa-trash-can"></i>')
                ->tooltip('Eliminar empleado')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-red-500 text-white transition hover:bg-red-600 cursor-pointer')
                ->dispatch('confirmEmployee', ['employee' => $row->id]),
        ];
    }

    // Confirm delete employee
    #[On('confirmEmployee')]
    public function confirmEmployee($employee)
    {
        $this->dialog()
            ->question('Eliminar Empleado', '¿Estás seguro de eliminar este empleado? Esta acción no se puede deshacer.')
            ->confirm('Eliminar', 'deleteEmployee', $employee)
            ->cancel('Cancelar')
            ->send();
    }

    public function deleteEmployee($employee)
    {
        // find employee by id
        $employee = User::findOrFail($employee);

        // validate if employee is logged in 
        if ($employee->id === Auth::user()->id) {
            $this->dialog()
                ->error('Ocurrió un error', 'No puedes eliminar tu propio usuario.')
                ->send();
            return;
        }

        // detach roles and delete employee
        $employee->roles()->detach();
        $employee->delete();

        $this->toast()
            ->success('Empleado Eliminado', 'Empleado eliminado correctamente')
            ->send();
        // refresh table
        $this->dispatch('$refresh');

    }
}
