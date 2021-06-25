<x-guest-layout>
@section('title', 'Daftar - SMK Wikrama 1 Garut')
    <x-jet-authentication-card>
                <div class="px-4 mb-5 py-5 bg-gradient-to-r from-blue-500  sm:rounded-md to-red-500 sm:p-6 ">
                  <div class="flex flex-wrap content-center">
                    <div><img src="http://localhost:8000/logo/wk_logo.png" width="100px" height="100px" alt="" class="mx-4 place-self-center mt-11"></div>
                    <div class="font-sans text-left font-bold mb-10 mt-10 text-white ml-3">
                      <p class="text-4xl">Form Pendaftaran <br> PPDB SMK Wikrama 1 Garut 2021</p>
                      <p>Silahkan Isi data diri anda pada form berikut ini</p>
                    </div>
                  </div>
                </div>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="grid grid-cols-3">
                <div class="grid grid-cols-1">
                    <div class="mt-3">
                        <label class="text-black text-opacity-75 text-md form-check-label" for="laki">
                            Jenis Kelamin
                        </label>
                        <select name="jk" id="jk" :value="old('jk')" class="border-gray-300 mt-1 block w-full sm:rounded-md" required>
                            <option >Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <!-- <div class="text-black text-opacity-75 form-check">
                            <input class="form-check-input" type="radio" value="Laki-laki" name="jk" id="laki" required>
                            <label class="form-check-label" for="laki">
                                Laki-laki
                            </label><br>
                            <input class="form-check-input" type="radio" value="Perempuan" name="jk" id="perempuan" required>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div> -->
                        
                    </div>
                </div>

                
                    <div class="mt-4 ml-3">
                        <x-jet-label for="tempat_lahir" value="{{ __('Tempat Lahir') }}" />
                        <x-jet-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir')" required />
                    </div>
                    <div class="mt-4 ml-3">
                        <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
                        <x-jet-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
                    </div>
                
            </div>
            <div class="grid grid-cols-2">
                <div class="mt-4">
                    <x-jet-label for="agama" value="{{ __('Agama') }}" />
                    <select name="agama" id="agama" :value="old('agama')" class="border-gray-300 mt-1 block w-full sm:rounded-md" required>
                        <option >Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="ml-3 mt-4">
                    <x-jet-label for="nisn" value="{{ __('NISN') }}" />
                    <x-jet-input id="nisn" class="block mt-1 w-full" type="number" name="nisn" :value="old('nisn')" required />
                </div>
            </div>

            

            <div class="mt-4">
                <x-jet-label for="alamat" value="{{ __('Alamat Lengkap') }}" />
                <textarea name="alamat" id="alamat" rows="3" class="border-gray-300 sm:rounded-md input_textarea mt-1 block w-full" :value="old('alamat')" required></textarea>
            </div>
            
            <div class="grid grid-cols-2">
                <div class="mt-4">
                    <x-jet-label for="asal_sekolah" value="{{ __('Asal Sekolah') }}" />
                    <x-jet-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah" :value="old('asal_sekolah')" required />
                </div>
                
                <div class="ml-3 mt-4">
                    <x-jet-label for="tahun_lulus" value="{{ __('Tahun Lulus') }}" />
                    <x-jet-input id="tahun_lulus" class="block mt-1 w-full" type="number" name="tahun_lulus" :value="old('tahun_lulus')" required />
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                
                <div class="mt-4 ml-3">
                    <x-jet-label for="no_hp" value="{{ __('Nomor Hp (Ortu/Siswa)') }}" />
                    <x-jet-input id="no_hp" class="block mt-1 w-full" type="number" name="no_hp" :value="old('no_hp')" required />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="jurusan" value="{{ __('Jurusan') }}" />
                <select name="jurusan" id="jurusan" class="border-gray-300 sm:rounded-md mt-1 block w-full" :value="old('jurusan')" required>
                    <option class="opacity-50">Pilih</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah Terdaftar?') }}
                </a>

                <x-jet-button class="ml-4" onclick="return confirm('Apakah Datanya sudah diisi dengan benar?')">
                    {{ __('Daftar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
