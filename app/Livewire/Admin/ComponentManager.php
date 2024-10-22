<?php

namespace App\Livewire\Admin;

use App\Models\Components;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;

#[Layout('layouts.app')]
class ComponentManager extends Component
{
    use Toast;

    public $components, $name, $url_name, $description, $tailwind_code, $componentId;
    public bool $editForm = false;

    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'description', 'label' => 'Description']
    ];

    protected $rules = [
        'name' => 'required|string',
        'url_name' => 'required|string',
        'description' => 'required|string',
        'tailwind_code' => 'required',
    ];

    public function mount()
    {
        $this->components = Components::all();
    }

    private function loadComponents()
    {
        $this->components = Components::all();
    }

    public function create()
    {
        $this->validate();
        Components::create([
            'name' => $this->name,
            'url_name' => $this->url_name,
            'description' => $this->description,
            'tailwind_code' => $this->tailwind_code,
        ]);

        $this->success("Succesfully created new component");
        $this->resetFields();

        $this->loadComponents();
    }

    public function edit($id)
    {
        $component = Components::find($id);
        $this->name = $component->name;
        $this->url_name = $component->url_name;
        $this->description = $component->description;
        $this->tailwind_code = $component->tailwind_code;
        $this->componentId = $component->id;

        $this->editForm = true;
    }

    public function update()
    {
        $this->validate();

        Components::find($this->componentId)->update([
            'name' => $this->name,
            'url_name' => $this->url_name,
            'description' => $this->description,
            'tailwind_code' => $this->tailwind_code,
        ]);

        $this->success("Succesfully edited component");
        $this->resetFields();

        $this->editForm = false;
        $this->loadComponents();
    }

    public function delete($id)
    {
        Components::find($id)->delete();

        $this->success("Succesfully deleted component");
        $this->loadComponents();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->url_name = '';
        $this->description = '';
        $this->tailwind_code = '';
        $this->componentId = null;
    }

    public function render()
    {
        return view('livewire.admin.component-manager', [
            'components' => Components::all(),
            'headers' => $this->headers,
        ]);
    }
}
