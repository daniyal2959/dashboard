<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Livewire\Component;

class StatusModal extends Component
{
    public $name;

    public $back_color;

    public $text_color;

    public Status $status;

    protected $rules = [
        'name' => 'required|string',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.status_id' => 'mountStatus',
        'delete_status' => 'delete'
    ];

    public function render()
    {
        return view('livewire.status.status-modal');
    }

    public function mountStatus($status_id = '')
    {
        if (empty($status_id)) {
            // Create new
            $this->status = new Status;
            $this->name = '';
            $this->text_color = '';
            $this->back_color = '';
            return;
        }

        // Get the role by name.
        $status = Status::find($status_id);
        if (is_null($status)) {
            $this->emit('error', 'The selected status [' . $status_id . '] is not found');
            return;
        }

        $this->status = $status;

        // Set the name and checked permissions properties to the role's values.
        $this->name = $this->status->name;
        $this->text_color = $this->status->text_color;
        $this->back_color = $this->status->back_color;
    }

    public function submit()
    {
        $this->validate();

        $this->status->name = strtolower($this->name);
        $this->status->back_color = strtolower($this->back_color);
        $this->status->text_color = strtolower($this->text_color);
        if ($this->status->isDirty()) {
            $this->status->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Status updated');
    }

    public function delete($id)
    {
        $status = Status::find($id);

        if (!is_null($status)) {
            $status->delete();
        }

        $this->emit('success', 'Status deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
