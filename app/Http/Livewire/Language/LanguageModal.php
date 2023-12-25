<?php

namespace App\Http\Livewire\Language;

use App\Models\Language;
use Livewire\Component;
use Livewire\WithFileUploads;

class LanguageModal extends Component
{
    use WithFileUploads;

    public $name;
    public $flag;
    public $excerpt;
    public $saved_flag;

    public Language $language;

    protected $rules = [
        'name' => 'required|string',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.language_id' => 'mountLanguage',
        'delete_language' => 'delete',
        'languageSelected'
    ];

    public function render()
    {
        return view('livewire.language.language-modal');
    }

    public function mountLanguage($language_id = '')
    {
        if (empty($language_id)) {
            // Create new
            $this->language = new Language;
            $this->name = '';
            $this->excerpt = '';
            $this->flag = '';
            return;
        }

        // Get the role by name.
        $language = Language::find($language_id);
        if (is_null($language)) {
            $this->emit('error', 'The selected language [' . $language_id . '] is not found');
            return;
        }

        $this->language = $language;

        // Set the name and checked permissions properties to the role's values.
        $this->name = $this->language->name;
        $this->excerpt = $this->language->excerpt;
        $this->saved_flag = $this->language->flag;
    }

    public function submit()
    {
        dd($this->name, $this->flag, $this->excerpt);
        $this->validate();

        $this->language->name = strtolower($this->name);
        $this->language->excerpt = strtolower($this->excerpt);
        if ($this->flag) {
            $this->language->flag = $this->flag->store('flags', 'public');
        } else {
            $this->language->flag = null;
        }

        if ($this->language->isDirty()) {
            $this->language->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Language updated');
    }

    public function delete($id)
    {
        $language = Language::find($id);

        if (!is_null($language)) {
            $language->delete();
        }

        $this->emit('success', 'Language deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function languageSelected($target)
    {
        dd($target);
    }
}
