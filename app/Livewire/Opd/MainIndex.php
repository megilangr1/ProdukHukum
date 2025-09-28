<?php

namespace App\Livewire\Opd;

use App\Helpers\MainHelper;
use App\Models\Opd;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MainIndex extends Component
{
    use WithPagination;

    // Form State
    #[Locked]
    public $form = false;

    public $state = [];

    #[Locked]
    public $params = [
        'kode_opd' => null,
        'nama_opd' => null,
        'keterangan' => null,
    ];

    #[Locked]
    public ?Opd $editData;
    // End Form State

    // Static Data 
    #[Locked]
    public $staticData = [];
    // End Static Data

    public function mount()
    {
        $this->state = $this->params;
        $this->getStaticData();
    }

    public function getStaticData() {}

    public function render()
    {
        $data = new Opd();
        $data = $data->paginate(5);

        return view('livewire.opd.main-index', [
            'data' => $data
        ]);
    }

    public function showForm(bool $open, $edit = false)
    {
        $this->form = $open;
        $this->reset('state');
        $this->resetErrorBag();
        $this->state = $this->params;

        if ($edit) {
            $this->state['kode_opd'] = $this->editData->kode_opd;
            $this->state['nama_opd'] = $this->editData->nama_opd;
            $this->state['keterangan'] = $this->editData->keterangan;
        } else {
            $this->reset('editData');
        }
    }

    public function actionForm()
    {
        if (isset($this->editData)) {
            $this->doUpdate();
        } else {
            $this->doCreate();
        }
    }

    public function doCreate()
    {
        $this->validate([
            'state.kode_opd' => 'required|string|unique:opds,kode_opd',
            'state.nama_opd' => 'required|string',
            'state.keterangan' => 'nullable|string',
        ], [], [
            'state.kode_opd' => 'Kode OPD',
            'state.nama_opd' => 'Nama OPD',
            'state.keterangan' => 'Keterangan',
        ]);

        DB::beginTransaction();
        try {
            $data = Opd::firstOrCreate([
                'kode_opd' => $this->state['kode_opd'],
                'nama_opd' => $this->state['nama_opd'],
                'keterangan' => $this->state['keterangan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data OPD Berhasil di-Tambahkan !');
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }

    public function doEdit(String $uuid)
    {
        try {
            $this->editData = Opd::where('uuid', '=', $uuid)->firstOrFail();
            $this->showForm(true, true);
        } catch (\Throwable $th) {
            (new MainHelper)->doAlert();
        }
    }

    public function doUpdate()
    {
        $this->validate([
            'state.kode_opd' => 'required|string|unique:opds,kode_opd,' . $this->editData->id,
            'state.nama_opd' => 'required|string',
            'state.keterangan' => 'nullable|string',
        ], [], [
            'state.kode_opd' => 'Kode OPD',
            'state.nama_opd' => 'Nama OPD',
            'state.keterangan' => 'Keterangan',
        ]);

        DB::beginTransaction();
        try {
            $data = Opd::where('uuid', '=', $this->editData->uuid)->firstOrFail();

            $update = $data->update([
                'kode_opd' => $this->state['kode_opd'],
                'nama_opd' => $this->state['nama_opd'],
                'keterangan' => $this->state['keterangan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data OPD Berhasil di-Ubah !');
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }

    #[On('doDelete')]
    public function doDelete($uuid)
    {
        DB::beginTransaction();
        try {
            $data = Opd::where('uuid', '=', $uuid)->firstOrFail();
            $delete = $data->delete();

            DB::commit();
            (new MainHelper)->doAlert(2, 'Data OPD di-Hapus !');

            if ($this->form && $this->editData->uuid === $uuid) {
                $this->showForm(false, false);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }
}
