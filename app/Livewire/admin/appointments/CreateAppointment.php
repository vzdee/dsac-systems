<?php

namespace App\Livewire\Admin\Appointments;

use App\Models\Accountant;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CreateAppointment extends Component
{
  use Interactions;
  
  public $accountant_id = '';
  public $client_id = '';
  public $service_id = '';

  public $scheduled_date = '';
  public $scheduled_time = '8:00 AM';

  public $status = 'Pendiente';
  public $description = '';

  public $accountants;
  public $clients;
  public $services;

  public function mount()
  {
    $this->accountants = Accountant::with('user')->get();
    $this->clients = Client::with('user')->get();
    $this->services = Service::all();

  }

  public function formattedDate()
  {
    if (!$this->scheduled_date) {
      return '--';
    }

    return Carbon::parse($this->scheduled_date)->format('d/m/Y');
  }

  public function formattedTime()
  {
    if (!$this->scheduled_time) {
      return '--';
    }

    return Carbon::parse($this->scheduled_time)->format('h:i A');
  }

  public function save()
  {
    $this->validate([
      'accountant_id' => 'required|exists:accountants,id',
      'client_id' => 'required|exists:clients,id',
      'service_id' => 'required|exists:services,id',
      'scheduled_date' => 'required|date',
      'scheduled_time' => 'required',
      'status' => 'required|in:Pendiente,Confirmada,Cancelada,Completada',
      'description' => 'nullable|string|max:1000',
    ]);

    $service = Service::findOrFail($this->service_id);

    $scheduledAt = Carbon::parse($this->scheduled_date . ' ' . $this->scheduled_time);

    Appointment::create([
      'accountant_id' => $this->accountant_id,
      'client_id' => $this->client_id,
      'service_id' => $this->service_id,
      'scheduled_at' => $scheduledAt,
      'status' => $this->status,
      'description' => $this->description,
      'price' => $service->price ?? 0,
    ]);

    $this->toast()
      ->success('Cita Creada', 'La cita se ha creado correctamente')
      ->flash()
      ->send();

    return redirect()
      ->route('admin.appointments.index');
  }

  public function render()
  {
    return view('livewire.admin.appointments.create-appointment');
  }
}