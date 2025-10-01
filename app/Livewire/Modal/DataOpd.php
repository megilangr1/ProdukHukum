<?php

namespace App\Livewire\Modal;

use App\Helpers\MainHelper;
use App\Models\Opd;
use Livewire\Attributes\On;
use Livewire\Component;

class DataOpd extends Component
{
    public $search = "";
    public $modal = false;

    public function render()
    {
        $data = new Opd();

        if ($this->search) {
            $data = $data->where('kode_opd', 'LIKE', '%' . $this->search . '%')
                ->orWhere('nama_opd', 'LIKE', '%' . $this->search . '%');
        }

        $data = $data->paginate(5);

        return view('livewire.modal.data-opd', [
            'data' => $data,
        ]);
    }

    #[On('open-data-opd-modal')]
    public function openModal()
    {
        $this->reset('search');
        $this->modal = true;
    }

    #[On('close-data-skpd-modal')]
    public function closeModal()
    {
        $this->reset('search');
        $this->modal = false;
    }

    public function selectOpd($uuid)
    {
        try {
            $data = Opd::where('uuid', '=', $uuid)->firstOrFail();

            $this->dispatch('selectedOpd', $data->toArray());
            $this->closeModal();
        } catch (\Throwable $th) {
            (new MainHelper)->doAlert();
        }
    }
}
