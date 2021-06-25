<x-jet-form-section submit="updateProfileInformation">
@section('title', 'Edit Profile')
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="jk" value="{{ __('Jenis Kelamin') }}" />
            <select name="jk" id="jk" wire:model.defer="state.jk" class="sm:rounded-md mt-1 block w-full" required>
                    <option value="{{Auth::user()->jk}}">{{Auth::user()->jk}}</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                    <option value="khusus">Khusus</option>
            </select>
            <x-jet-input-error for="jk" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tempat_lahir" value="{{ __('Tempat Lahir') }}" />
            <x-jet-input id="tempat_lahir" type="text" class="mt-1 block w-full" wire:model.defer="state.tempat_lahir" />
            <x-jet-input-error for="tempat_lahir" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
            <x-jet-input id="tanggal_lahir" type="date" class="mt-1 block w-full" wire:model.defer="state.tanggal_lahir" />
            <x-jet-input-error for="tanggal_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="agama" value="{{ __('Agama') }}" />
            <select name="agama" id="agama" wire:model.defer="state.agama" class="sm:rounded-md mt-1 block w-full" required>
                    <option value="{{Auth::user()->agama}}">{{Auth::user()->agama}}</option>
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            <x-jet-input-error for="agama" class="mt-2" />
        </div>
              
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nisn" value="{{ __('NISN') }}" />
            <x-jet-input id="nisn" type="number" class="mt-1 block w-full" wire:model.defer="state.nisn" />
            <x-jet-input-error for="nisn" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="alamat" value="{{ __('Alamat Lengkap') }}" />
            <textarea name="alamat" id="alamat" rows="3" class="sm:rounded-md input_textarea mt-1 block w-full" wire:model.defer="state.alamat" required></textarea>
            <x-jet-input-error for="alamat" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="asal_sekolah" value="{{ __('Asal Sekolah') }}" />
            <x-jet-input id="asal_sekolah" type="text" class="mt-1 block w-full" wire:model.defer="state.asal_sekolah" />
            <x-jet-input-error for="asal_sekolah" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tahun_lulus" value="{{ __('Tahun Lulus') }}" />
            <x-jet-input id="tahun_lulus" type="number" class="mt-1 block w-full" wire:model.defer="state.tahun_lulus" />
            <x-jet-input-error for="tahun_lulus" class="mt-2" />
        </div>
        
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="no_hp" value="{{ __('Nomor Hp (Ortu/Siswa)') }}" />
            <x-jet-input id="no_hp" type="number" class="mt-1 block w-full" wire:model.defer="state.no_hp" />
            <x-jet-input-error for="no_hp" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="jurusan" value="{{ __('Jurusan') }}" />
            <select name="jurusan" id="jurusan" wire:model.defer="state.jurusan" class="sm:rounded-md mt-1 block w-full" required>
                    <option value="{{Auth::user()->jurusan}}">{{Auth::user()->jurusan}}</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                </select>
            <x-jet-input-error for="jurusan" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
