<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class DepartmentModal extends Component
{
    public $name;

    public Department $department;

    protected $rules = [
        'name' => 'required|string',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.department_id' => 'mountDepartment',
        'delete_department' => 'delete'
    ];

    public function render()
    {
        return view('livewire.department.department-modal');
    }

    public function mountDepartment($department_id = '')
    {
        if (empty($department_id)) {
            // Create new
            $this->department = new Department;
            $this->name = '';
            return;
        }

        // Get the role by name.
        $department = Department::find($department_id);
        if (is_null($department)) {
            $this->emit('error', 'The selected department [' . $department_id . '] is not found');
            return;
        }

        $this->department = $department;

        // Set the name and checked permissions properties to the role's values.
        $this->name = $this->department->name;
    }

    public function submit()
    {
        $this->validate();

        $this->department->name = strtolower($this->name);
        if ($this->department->isDirty()) {
            $this->department->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Department updated');
    }

    public function delete($id)
    {
        $department = Department::find($id);

        if (!is_null($department)) {
            $department->delete();
        }

        $this->emit('success', 'Department deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
