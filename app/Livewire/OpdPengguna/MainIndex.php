<?php

namespace App\Livewire\OpdPengguna;

use App\Helpers\MainHelper;
use App\Models\Opd;
use App\Models\OpdPengguna;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        'id_opd' => null,
        'nip' => null,
        'nama_lengkap' => null,
        'jabatan' => null,
        'email' => null,
        'password' => null,
        'password_confirmation' => null,
    ];

    #[Locked]
    public ?OpdPengguna $editData;
    // End Form State

    // Static Data 
    #[Locked]
    public $staticData = [
        'opd' => []
    ];
    // End Static Data

    // Tom Select
    #[Locked]
    public $tomSelectData = [
        'opd' => [
            'selectId' => 'opd',
            'value' => '',
            'option' => null,
        ],
    ];
    // End Tom Select

    public function mount()
    {
        $this->state = $this->params;
        $this->getStaticData();
    }

    public function getStaticData()
    {
        try {
            $getOpd = Opd::orderBy('nama_opd', 'ASC')->get();

            $this->staticData['opd'] = $getOpd;
        } catch (\Throwable $th) {
            (new MainHelper)->doAlert(0);
        }
    }

    public function render()
    {
        $data = new OpdPengguna();

        $data = $data->with([
            'opd',
            'user'
        ]);

        $data = $data->paginate(5);

        return view('livewire.opd-pengguna.main-index', [
            'data' => $data
        ]);
    }

    public function showForm(bool $open, $edit = false)
    {
        $this->form = $open;
        $this->reset('state');
        $this->resetErrorBag();
        $this->state = $this->params;

        $tomSelectData = $this->tomSelectData;

        if ($edit) {
            $this->state['id_opd'] = $this->editData->opd->uuid;
            $this->state['kode_opd'] = $this->editData->opd->kode_opd;
            $this->state['nama_opd'] = $this->editData->opd->nama_opd;
            $this->state['nip'] = $this->editData->nip;
            $this->state['nama_lengkap'] = $this->editData->nama_lengkap;
            $this->state['jabatan'] = $this->editData->jabatan;
            $this->state['email'] = $this->editData->user->email;
            $this->state['password'] = "";
            $this->state['password_confirmation'] = "";

            if ($this->editData->opd !== null) {
                $tomSelectData['opd']['selectId'] = 'opd';
                $tomSelectData['opd']['value'] = $this->editData->opd->uuid;
                // $tomSelectData['opd']['option'] = [
                //     'value' => $this->editData->opd->uuid,
                //     'text' => $this->editData->opd->nama_opd,
                // ];
            }
        } else {
            $this->reset('editData');
        }

        $this->dispatch('setTomSelect', $tomSelectData);
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
            'state.id_opd' => 'required|string|exists:opds,uuid',
            'state.nip' => 'required|string',
            'state.nama_lengkap' => 'required|string',
            'state.jabatan' => 'required|string',
            'state.email' => 'required|string|email|unique:users,email',
            'state.password' => 'nullable|string|min:8|confirmed',
            'state.password_confirmation' => 'nullable|string',
        ], [], [
            'state.id_opd' => 'Opd',
            'state.nip' => 'NIP',
            'state.nama_lengkap' => 'Nama Lengkap',
            'state.jabatan' => 'Jabatan',
            'state.name' => 'Nama Pengguna',
            'state.email' => 'Email Pengguna',
            'state.password' => 'Password Pengguna',
            'state.password_confirmation' => 'Konfirmasi Password',
        ]);

        DB::beginTransaction();
        try {
            $opd = Opd::where('uuid', '=', $this->state['id_opd'])->firstOrFail();

            $user = User::firstOrCreate([
                'name' => $this->state['nama_lengkap'],
                'email' => $this->state['email'],
                'password' => Hash::make($this->state['password']),
            ]);
            $user->syncRoles(['Operator']);

            $data = OpdPengguna::firstOrCreate([
                'id_user' => $user->id,
                'id_opd' => $opd->id,
                'nip' => $this->state['nip'],
                'nama_lengkap' => $this->state['nama_lengkap'],
                'jabatan' => $this->state['jabatan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data Akun OPD Berhasil di-Tambahkan !');
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
            dd($th);
        }
    }

    public function doEdit(String $uuid)
    {
        try {
            $this->editData = OpdPengguna::with(['opd', 'user'])->where('uuid', '=', $uuid)->firstOrFail();
            $this->showForm(true, true);
        } catch (\Throwable $th) {
            (new MainHelper)->doAlert();
        }
    }

    public function doUpdate()
    {
        $this->validate([
            'state.id_opd' => 'required|string|exists:opds,uuid',
            'state.nip' => 'required|string',
            'state.nama_lengkap' => 'required|string',
            'state.jabatan' => 'required|string',
            'state.email' => 'required|string|email|unique:users,email,' . $this->editData->id_user,
            'state.password' => 'nullable|string|min:8|confirmed',
            'state.password_confirmation' => 'nullable|string',
        ], [], [
            'state.id_opd' => 'Opd',
            'state.nip' => 'NIP',
            'state.nama_lengkap' => 'Nama Lengkap',
            'state.jabatan' => 'Jabatan',
            'state.name' => 'Nama Pengguna',
            'state.email' => 'Email Pengguna',
            'state.password' => 'Password Pengguna',
            'state.password_confirmation' => 'Konfirmasi Password',
        ]);

        DB::beginTransaction();
        try {
            $data = OpdPengguna::where('uuid', '=', $this->editData->uuid)->firstOrFail();
            $opd = Opd::where('uuid', '=', $this->state['id_opd'])->firstOrFail();
            $user = User::where('id', '=', $data->id_user)->firstOrFail();

            $password = $this->state['password'] != null ? Hash::make($this->state['password']) :  $data->user->password;

            $updateUser = $user->update([
                'name' => $this->state['nama_lengkap'],
                'email' => $this->state['email'],
                'password' => $password,
            ]);
            $user->syncRoles(['Operator']);

            $update = $data->update([
                'id_opd' => $opd->id,
                'nip' => $this->state['nip'],
                'nama_lengkap' => $this->state['nama_lengkap'],
                'jabatan' => $this->state['jabatan'],
            ]);

            DB::commit();
            $this->showForm(false);
            (new MainHelper)->doAlert(1, 'Data Akun OPD Berhasil di-Ubah !');
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
            dd($th);
        }
    }

    #[On('doDelete')]
    public function doDelete($uuid)
    {
        DB::beginTransaction();
        try {
            $data = OpdPengguna::where('uuid', '=', $uuid)->firstOrFail();
            $deleteUser = $data->user()->delete();
            $delete = $data->delete();

            DB::commit();
            (new MainHelper)->doAlert(2, 'Data Akun OPD di-Hapus !');

            if ($this->form && $this->editData->uuid === $uuid) {
                $this->showForm(false, false);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            (new MainHelper)->doAlert();
        }
    }


    // Event
    #[On('selectedOpd')]
    public function selectedOpd($value)
    {
        $tomSelectData = $this->tomSelectData;

        if ($value !== null) {
            $this->state['id_opd'] = $value['uuid'];

            $tomSelectData['opd']['selectId'] = 'opd';
            $tomSelectData['opd']['value'] = $value['uuid'];
            $tomSelectData['opd']['option'] = null;
        }

        $this->dispatch('setTomSelect', $tomSelectData);
    }

    public function resetSelectedOpd()
    {
        $this->state['id_opd'] = null;
        $tomSelectData = $this->tomSelectData;
        $this->dispatch('setTomSelect', $tomSelectData);
    }

    public function dummy()
    {
        dd($this->state);
    }
}
