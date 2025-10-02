<div class="flex flex-col gap-3">
    <x-page-header title="Data Akun OPD">
        <button type="button" class="btn btn-neutral btn-sm" wire:click="showForm(true)"
            @if ($form) disabled @endif>Tambah Data</button>
    </x-page-header>

    <div class="card border border-slate-300 bg-base-100 w-full {{ $form ? 'block' : 'hidden' }}">
        <div class="card-body p-0">
            <div class="card-title px-5 py-3 border-b border-b-slate-300 text-sm flex items-center justify-between">
                <div class="flex-auto">
                    Formulir {{ $editData ? 'Ubah' : 'Tambah' }} Akun OPD
                </div>

                <button type="button" class="btn bg-red-500 text-white btn-xs" wire:click="showForm(false)">
                    Tutup Formulir
                </button>
            </div>
            <form wire:submit="actionForm">
                <div class="w-full grid grid-cols-6 px-6 pb-2 gap-3">
                    {{-- <div class="col-span-6 md:col-span-4">
                        <label for="id_opd"
                            class="block text-sm font-medium mb-2 {{ $errors->has('state.id_opd') ? 'text-red-500' : '' }}">
                            OPD :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <select wire:model="state.id_opd" id="id_opd" name="id_opd"
                                class="w-full select @error('state.id_opd') select-error @enderror"
                                aria-describedby="id_opd-helper" required>
                                <option value="">Pilih OPD</option>
                                @foreach ($staticData['opd'] as $item)
                                    <option value="{{ $item->uuid }}">{{ $item->kode_opd }} - {{ $item->nama_opd }}
                                    </option>
                                @endforeach
                            </select>
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.id_opd') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.id_opd')
                            <p class="text-xs text-red-600 mt-1" id="id_opd-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div> --}}

                    {{-- <div class="col-span-6 md:col-span-4">
                        <div class="flex flex-col sm:flex-row justify-between gap-1 mb-2">
                            <label for="id_opd"
                                class="flex-auto block text-sm font-medium {{ $errors->has('state.id_opd') ? 'text-red-500' : '' }}">
                                Organisasi Perangkat Daerah (OPD) :
                                <span class="text-red-500 text-xs">*</span>
                            </label>
                            <div class="ms-auto">
                                <div class="flex gap-x-1">
                                    @if ($state['id_opd'] != null)
                                        <span class="badge badge-xs badge-error cursor-pointer text-white"
                                            wire:click="resetSelectedOpd">
                                            <svg class="shrink-0 size-2" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-rotate-ccw">
                                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                                <path d="M3 3v5h5" />
                                            </svg>

                                            Reset Pilihan
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <input type="text" id="id_opd" name="id_opd"
                                class="w-full input @error('state.id_opd') input-error @enderror"
                                aria-describedby="id_opd-helper"
                                value="{{ $state['kode_opd'] != null ? $state['kode_opd'] . ' - ' . $state['nama_opd'] : '' }}"
                                placeholder="Pilih Organisasi Perangkat Daerah (OPD)..." required autocomplete="false"
                                wire:click="$dispatchTo('modal.data-opd', 'open-data-opd-modal')" readonly>
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.id_opd') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.id_opd')
                            <p class="text-xs text-red-600 mt-1" id="id_opd-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div> --}}

                    <div class="col-span-6 md:col-span-4">
                        <div class="flex flex-col sm:flex-row justify-between gap-1 mb-2">
                            <label for="opd"
                                class="flex-auto block text-sm font-medium {{ $errors->has('state.id_opd') ? 'text-red-500' : '' }}">
                                Organisasi Perangkat Daerah (OPD) :
                                <span class="text-red-500 text-xs">*</span>
                            </label>
                            <div class="ms-auto">
                                <div class="flex gap-x-1">
                                    @if ($state['id_opd'] != null)
                                        <span class="badge badge-xs badge-error cursor-pointer text-white"
                                            wire:click="resetSelectedOpd">
                                            <svg class="shrink-0 size-2" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-rotate-ccw">
                                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                                <path d="M3 3v5h5" />
                                            </svg>

                                            Reset Pilihan
                                        </span>
                                    @endif
                                    <span class="badge badge-xs badge-success cursor-pointer text-white"
                                        wire:click="$dispatchTo('modal.data-opd', 'open-data-opd-modal')">
                                        <svg class="shrink-0 size-2" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-sheet-icon lucide-sheet">
                                            <rect width="18" height="18" x="3" y="3" rx="2"
                                                ry="2" />
                                            <line x1="3" x2="21" y1="9" y2="9" />
                                            <line x1="3" x2="21" y1="15" y2="15" />
                                            <line x1="9" x2="9" y1="9" y2="21" />
                                            <line x1="15" x2="15" y1="9" y2="21" />
                                        </svg>

                                        Daftar Data
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <div wire:ignore>
                                <select wire:model="state.id_opd" id="opd" name="opd"
                                    class="w-full @error('state.id_opd') select-error @enderror"
                                    aria-describedby="opd-helper" required>
                                    <option value="">Pilih OPD</option>
                                    @foreach ($staticData['opd'] as $item)
                                        <option value="{{ $item->uuid }}">
                                            {{ $item->kode_opd }} - {{ $item->nama_opd }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.id_opd') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.id_opd')
                            <p class="text-xs text-red-600 mt-1" id="opd-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-2">
                        <label for="nip"
                            class="block text-sm font-medium mb-2 {{ $errors->has('state.nip') ? 'text-red-500' : '' }}">
                            NIP :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model="state.nip" id="nip" name="nip"
                                class="w-full input @error('state.nip') input-error @enderror"
                                aria-describedby="nip-helper" placeholder="Masukan NIP..." required
                                autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.nip') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.nip')
                            <p class="text-xs text-red-600 mt-1" id="nip-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-2">
                        <label for="nama_lengkap"
                            class="block text-sm font-medium mb-2 {{ $errors->has('state.nama_lengkap') ? 'text-red-500' : '' }}">
                            Nama Lengkap :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model="state.nama_lengkap" id="nama_lengkap"
                                name="nama_lengkap"
                                class="w-full input @error('state.nama_lengkap') input-error @enderror"
                                aria-describedby="nama_lengkap-helper" placeholder="Masukan Nama Lengkap..." required
                                autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.nama_lengkap') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.nama_lengkap')
                            <p class="text-xs text-red-600 mt-1" id="nama_lengkap-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-2">
                        <label for="jabatan"
                            class="block text-sm font-medium mb-2 {{ $errors->has('state.jabatan') ? 'text-red-500' : '' }}">
                            Jabatan :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model="state.jabatan" id="jabatan" name="jabatan"
                                class="w-full input @error('state.jabatan') input-error @enderror"
                                aria-describedby="jabatan-helper" placeholder="Masukan Jabatan..." required
                                autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.jabatan') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.jabatan')
                            <p class="text-xs text-red-600 mt-1" id="jabatan-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-2">
                        <label for="email"
                            class="block text-sm font-medium mb-2 @error('state.email') text-red-500 @enderror">
                            Email Pengguna :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" wire:model="state.email" id="email" name="email"
                                class="w-full input @error('state.email') input-error @enderror"
                                aria-describedby="email-helper" placeholder="Masukan Email Pengguna..." required
                                autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.email') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>
                        @error('state.email')
                            <p class="text-xs text-red-600 mt-1" id="email-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-3">
                        <label for="password"
                            class="block text-sm font-medium mb-2 @error('state.password') text-red-500 @enderror">
                            Password Pengguna :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" wire:model="state.password" id="password" name="password"
                                class="w-full input @error('state.password') input-error @enderror"
                                aria-describedby="password-helper" placeholder="Masukan Password Pengguna..."
                                @if (!isset($editData)) required @endif autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.password') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>

                        @error('state.password')
                            <p class="text-xs text-red-600 mt-1" id="password-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-3">
                        <label for="password_confirmation"
                            class="block text-sm font-medium mb-2 @error('state.password_confirmation') text-red-500 @enderror">
                            Konfirmasi Password :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" wire:model="state.password_confirmation"
                                id="password_confirmation" name="password_confirmation"
                                class="w-full input @error('state.password_confirmation') input-error @enderror"
                                aria-describedby="password_confirmation-helper"
                                placeholder="Masukan Konfirmasi Password Pengguna..."
                                @if (!isset($editData)) required @endif autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.password_confirmation') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12">
                                    </line>
                                    <line x1="12" x2="12.01" y1="16" y2="16">
                                    </line>
                                </svg>
                            </div>
                        </div>

                        @error('state.password_confirmation')
                            <p class="text-xs text-red-600 mt-1" id="password_confirmation-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <hr class="border-t-1 border-t-slate-300">
                    </div>

                    <div class="col-span-6 md:col-span-2 lg:col-span-1">
                        <button type="submit" class="btn btn-neutral w-full btn-sm">
                            {{ isset($editData) ? 'Simpan Data' : 'Buat Data' }}
                        </button>
                    </div>
                    <div class="col-span-6 md:col-span-2 lg:col-span-1">
                        <button type="{{ $editData ? 'button' : 'reset' }}" class="btn btn-error w-full btn-sm"
                            @isset($editData) wire:click="showForm(false)" @endisset>
                            {{ isset($editData) ? 'Batalkan' : 'Reset Input' }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="card-actions text-xs font-semibold text-slate-600 bg-slate-200 rounded-b-lg px-5 py-2">
                Formulir {{ $editData ? 'Ubah' : 'Tambah' }} Pengguna
            </div>
        </div>
    </div>

    <div class="overflow-x-auto border rounded-lg border-slate-300">
        <table class="table table-sm table-pin-rows table-pin-cols">
            <thead>
                <tr>
                    <th class="text-center" width="8%">No.</th>
                    <td>OPD</td>
                    <td>NIP</td>
                    <td>Nama Lengkap</td>
                    <td>Jabatan</td>
                    <td>Email</td>
                    <td>Pembuat</td>
                    <th class="text-center" width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <th class="text-center bg-slate-200">{{ $loop->iteration }}.</th>
                        <td>{{ $item->opd->kode_opd ?? '-' }} | {{ $item->opd->nama_opd ?? '-' }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->nama_creator }}</td>
                        <th class="text-center">
                            <button type="button" class="btn btn-xs btn-neutral w-full font-normal tracking-wider"
                                popovertarget="popover-{{ $loop->iteration }}"
                                style="anchor-name:--anchor-{{ $loop->iteration }}">
                                Aksi
                            </button>
                            <div class="dropdown dropdown-end menu w-auto rounded-box bg-base-100 border border-slate-300 shadow-lg text-xs flex flex-col gap-1 px-4"
                                popover id="popover-{{ $loop->iteration }}"
                                style="position-anchor:--anchor-{{ $loop->iteration }}">
                                <h5 class="text-center">Aksi Data</h5>
                                <hr class="border-t-1 border-t-slate-300 my-1">
                                <button type="button"
                                    class="btn btn-xs btn-outline w-full font-normal tracking-wider"
                                    popovertarget="popover-{{ $loop->iteration }}"
                                    wire:click="doEdit('{{ $item->uuid }}')">
                                    Edit Data
                                </button>
                                <button type="button" popovertarget="popover-{{ $loop->iteration }}"
                                    class="btn btn-xs btn-outline w-full font-normal tracking-wider delete-btn"
                                    popovertarget="popover-{{ $loop->iteration }}" data-uuid="{{ $item->uuid }}"
                                    data-target="opd-pengguna.main-index">
                                    Hapus Data
                                </button>
                            </div>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-2">Belum Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="w-full">
        {{ $data->links() }}
    </div>

    <livewire:modal.data-opd />
</div>

@push('scripts')
    <script>
        document.addEventListener("livewire:navigated", () => {
            initTomSelect('#opd', {
                maxItems: 1
            });
        });
    </script>
@endpush
