<?php

namespace App\Livewire;

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

final class ClientTable extends PowerGridComponent
{
    public string $tableName = 'clientTable';
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
        // find users with role 'Cliente'
        return User::role('Cliente')
            ->select('users.*');
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
            Column::make('Cliente', 'full_name'),

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
                ->tooltip('Editar cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-indigo-500 text-white transition hover:bg-indigo-600 cursor-pointer')
                ->route('admin.clients.edit', ['client' => $row->id]),

            Button::add('delete')
                ->id()
                ->slot('<i class="fa-regular fa-trash-can"></i>')
                ->tooltip('Eliminar cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-red-500 text-white transition hover:bg-red-600 cursor-pointer')
                ->dispatch('confirmClient', ['client' => $row->id]),
            Button::add('view')
                ->id()
                ->slot('<i class="fa-regular fa-eye"></i>')
                ->tooltip('Ver cliente')
                ->class('inline-flex items-center justify-center size-9 rounded-sm bg-green-500 text-white transition hover:bg-green-600 cursor-pointer')
                ->route('admin.clients.show', ['client' => $row->id])
        ];
    }

    // confirm delete client
    #[on('confirmClient')]
    public function confirmClient($client){
        $this->dialog()
            ->question('Eliminar Cliente', '¿Estás seguro de eliminar este cliente? Esta acción no se puede deshacer')
            ->confirm('Eliminar', 'deleteClient', $client)
            ->cancel('Cancelar')
            ->send();
    }

    // delete client
    public function deleteClient($client){
        $client = User::findOrFail($client);

        // validate if client is logged in
        if($client->id === Auth::user()->id){
            $this->dialog()
                ->error('Error', 'No puedes eliminar tu propio usuario')
                ->send();
            return;
        }

        // detach roles and delete client
        $client->roles()->detach();
        $client->delete();

        // show success message
        $this->toast()
            ->success('Cliente Eliminado', 'El cliente ha sido eliminado correctamente')
            ->flash()
            ->send();

        // refresh table
        $this->dispatch('$refresh');
    }
}
