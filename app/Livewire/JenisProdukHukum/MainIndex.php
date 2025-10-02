<?php

namespace App\Livewire\JenisProdukHukum;

use App\Helpers\MainHelper;
use App\Models\JenisProdukHukum;
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
        'kode_jenis_ph' => null,
        'nama_jenis_ph' => null,
        'keterangan' => null,
    ];

    #[Locked]
    public ?JenisProdukHukum $editData;
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
        $data = new JenisProdukHukum();
        $data = $data->paginate(5);

        return view('livewire.jenis-produk-hukum.main-index', [
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
            $this->state['kode_jenis_ph'] = $this->editData->kode_jenis_ph;
            $this->state['nama_jenis_ph'] = $this->editData->nama_jenis_ph;
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
            'state.kode_jenis_ph' => 'required|string|unique:jenis_produk_hukums,kode_jenis_ph',
            'state.nama_jenis_ph' => 'required|string',
            'state.keterangan' => 'nullable|string',
        ], [], [
            'state.kode_jenis_ph' => 'Kode Jenis Produk Hukum',
            'state.nama_jenis_ph' => 'Nama Jenis Produk Hukum',
            'state.keterangan' => 'Keterangan',
        ]);

        DB::beginTransaction();
        try {
            $data = JenisProdukHukum::firstOrCreate([
                'kode_jenis_ph' => $this->state['kode_jenis_ph'],
                'nama_jenis_ph' => $this->state['nama_jenis_ph'],
                'keterangan' => $this->state['keterangan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data Jenis Produk Hukum Berhasil di-Tambahkan !');
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }

    public function doEdit(String $uuid)
    {
        try {
            $this->editData = JenisProdukHukum::where('uuid', '=', $uuid)->firstOrFail();
            $this->showForm(true, true);
        } catch (\Throwable $th) {
            (new MainHelper)->doAlert();
        }
    }

    public function doUpdate()
    {
        $this->validate([
            'state.kode_jenis_ph' => 'required|string|unique:jenis_produk_hukums,kode_jenis_ph,' . $this->editData->id,
            'state.nama_jenis_ph' => 'required|string',
            'state.keterangan' => 'nullable|string',
        ], [], [
            'state.kode_jenis_ph' => 'Kode Jenis Produk Hukum',
            'state.nama_jenis_ph' => 'Nama Jenis Produk Hukum',
            'state.keterangan' => 'Keterangan',
        ]);

        DB::beginTransaction();
        try {
            $data = JenisProdukHukum::where('uuid', '=', $this->editData->uuid)->firstOrFail();

            $update = $data->update([
                'kode_jenis_ph' => $this->state['kode_jenis_ph'],
                'nama_jenis_ph' => $this->state['nama_jenis_ph'],
                'keterangan' => $this->state['keterangan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data Jenis Produk Hukum Berhasil di-Ubah !');
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
            $data = JenisProdukHukum::where('uuid', '=', $uuid)->firstOrFail();
            $delete = $data->delete();

            DB::commit();
            (new MainHelper)->doAlert(2, 'Data Jenis Produk Hukum di-Hapus !');

            if ($this->form && $this->editData->uuid === $uuid) {
                $this->showForm(false, false);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }
}
