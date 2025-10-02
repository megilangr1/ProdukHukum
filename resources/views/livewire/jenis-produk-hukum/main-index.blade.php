<div class="flex flex-col gap-3">
    <x-page-header title="Data Jenis Produk Hukum">
        <button type="button" class="btn btn-neutral btn-sm" wire:click="showForm(true)"
            @if ($form) disabled @endif>Tambah Data</button>
    </x-page-header>

    <div class="card border border-slate-300 bg-base-100 w-full {{ $form ? 'block' : 'hidden' }}">
        <div class="card-body p-0">
            <div class="card-title px-5 py-3 border-b border-b-slate-300 text-sm flex items-center justify-between">
                <div class="flex-auto">
                    Formulir {{ $editData ? 'Ubah' : 'Tambah' }} Jenis Produk Hukum
                </div>

                <button type="button" class="btn bg-red-500 text-white btn-xs" wire:click="showForm(false)">
                    Tutup Formulir
                </button>
            </div>
            <form wire:submit="actionForm">
                <div class="w-full grid grid-cols-6 px-6 pb-2 gap-3">
                    <div class="col-span-6 md:col-span-2">
                        <label for="kode_jenis_ph"
                            class="block text-sm font-medium mb-2 {{ $errors->has('state.kode_jenis_ph') ? 'text-red-500' : '' }}">
                            Kode Jenis Produk Hukum :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model="state.kode_jenis_ph" id="kode_jenis_ph"
                                name="kode_jenis_ph"
                                class="w-full input @error('state.kode_jenis_ph') input-error @enderror"
                                aria-describedby="kode_jenis_ph-helper" placeholder="Masukan Kode Jenis Produk Hukum..."
                                required autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.kode_jenis_ph') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
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
                        @error('state.kode_jenis_ph')
                            <p class="text-xs text-red-600 mt-1" id="name-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 md:col-span-4">
                        <label for="nama_jenis_ph"
                            class="block text-sm font-medium mb-2 @error('state.nama_jenis_ph') text-red-500 @enderror">
                            Nama Jenis Produk Hukum :
                            <span class="text-red-500 text-xs">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model="state.nama_jenis_ph" id="nama_jenis_ph"
                                name="nama_jenis_ph"
                                class="w-full input @error('state.nama_jenis_ph') input-error @enderror"
                                aria-describedby="nama_jenis_ph-helper" placeholder="Masukan Nama Jenis Produk Hukum..."
                                required autocomplete="false">
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.nama_jenis_ph') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
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
                        @error('state.nama_jenis_ph')
                            <p class="text-xs text-red-600 mt-1" id="nama_jenis_ph-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="keterangan"
                            class="block text-sm font-medium mb-2 @error('state.keterangan') text-red-500 @enderror">
                            Keterangan :
                        </label>
                        <div class="relative">
                            <textarea wire:model="state.keterangan" id="keterangan" name="keterangan"
                                class="textarea w-full @error('state.keterangan') textarea-error @enderror" placeholder="Masukan Keterangan..."
                                aria-describedby="keterangan-helper" placeholder="Masukan Keterangan..." autocomplete="false"></textarea>
                            <div
                                class="absolute inset-y-0 end-0 {{ $errors->has('state.keterangan') ? 'flex' : 'hidden' }} items-center pointer-events-none pe-3">
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
                        @error('state.keterangan')
                            <p class="text-xs text-red-600 mt-1" id="keterangan-helper">
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
                Formulir {{ $editData ? 'Ubah' : 'Tambah' }} Jenis Produk Hukum
            </div>
        </div>
    </div>

    <div class="overflow-x-auto border rounded-lg border-slate-300">
        <table class="table table-sm table-pin-rows table-pin-cols">
            <thead>
                <tr>
                    <th class="text-center" width="8%">No.</th>
                    <td>Kode Jenis Produk Hukum</td>
                    <td>Nama Jenis Produk Hukum</td>
                    <td>Keterangan</td>
                    <td>Pembuat</td>
                    <th class="text-center" width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <th class="text-center bg-slate-200">{{ $loop->iteration }}.</th>
                        <td>{{ $item->kode_jenis_ph }}</td>
                        <td>{{ $item->nama_jenis_ph }}</td>
                        <td>{{ $item->keterangan != null ? $item->keterangan : '-' }}</td>
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
                                    data-target="jenis-produk-hukum.main-index">
                                    Hapus Data
                                </button>
                            </div>
                        </th>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center p-2">Belum Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="w-full">
        {{ $data->links() }}
    </div>
</div>
