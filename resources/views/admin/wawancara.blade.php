<x-guest-layout>
@section('title', 'Wawancara - SMK Wikrama 1 Garut')
    <x-slot name="logo">
        <img src="http://localhost:8000/logo/wk_logo.png" width="100px" height="100px" alt="">
    </x-slot>
    

   
                    <div class="mx-14 mt-5">
            <div class="px-4 py-5 bg-gradient-to-r from-yellow-500  sm:rounded-md to-red-500 sm:p-6 ">
                  <div class="flex flex-wrap content-center">
                    <div><img src="http://localhost:8000/logo/wk_logo.png" width="100px" height="100px" alt="" class="mx-4 place-self-center mt-8"></div>
                    <div class="font-sans text-left font-bold mb-7 mt-7 text-white ml-3">
                      <p class="text-4xl">Form Wawancara Siswa dan Orang tua<br> PPDB SMK Wikrama 1 Garut 2021</p>
                      <p>Silahkan Isi semua pertanyaan pada form berikut ini!</p>
                    </div>
                  </div>
                </div> 
                <form method="POST" action="{{ url('/admin/wawancara/store/'.$data->id) }}">
                @csrf
                @method('patch')
                    
                        <input type="hidden" name="nisn" value="{{ $data->nisn }}">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mx-12">
                    <h2 class="font-semibold text-xl mt-8 text-blue-800">A. Siswa</h2>
                    <hr>
                    <div class="grid grid-cols-2">
                        <div class="mt-2 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                               1. Tau Sekolah SMK Wikrama 1 Garut Dari mana?
                            </label>
                            <select name="pertanyaan1" id="pertanyaan1" :value="old('pertanyaan1')" class="border-gray-300 mt-1 block w-full sm:rounded-md" required>
                                <option>Pilih Jawaban</option>
                                <option value="Guru/Staf/Laboran/Pegawai Wikrama">Guru/Staf/Laboran/Pegawai Wikrama</option>
                                <option value="Siswa SMK Wikrama">Siswa SMK Wikrama</option>
                                <option value="Alumni SMK Wikrama">Alumni SMK Wikrama</option>
                                <option value="Guru SMP">Guru SMP</option>
                                <option value="Calon Siswa SMK Wikrama">Calon Siswa SMK Wikrama</option>
                                <option value="Sosial Media">Sosial Media</option>
                                <option value="Referensi Langsung">Referensi Langsung</option>
                            </select>
                        </div>

                        <div class="mt-2 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                2. Kenapa Memilih SMK?
                            </label>
                            <x-jet-input id="pertanyaan2" placeholder="Jawaban....." class="block mt-1 w-full" type="text" name="pertanyaan2" :value="old('pertanyaan2')" required />
                        </div>

                        <div class="mt-3">
                            <label class="font-bold font-bold  text-black text-opacity-75 text-md form-check-label">
                                3. Pernah Merokok atau tidak?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Pernah - " name="pertanyaan3" id="pernah" required>
                                <label class="form-check-label" for="pernah">
                                    Pernah 
                                </label>
                                    <x-jet-input id="pertanyaan3" placeholder="Terakhir merokok..." class="my-1 ml-14 w-80" type="text" name="pertanyaan3" :value="old('pertanyaan3')" />
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan3" id="tidak" required>
                                <label class="form-check-label" for="tidak">
                                    Tidak Pernah
                                </label>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                4. Pernah Mengkonsumsi Narkoba dan semacamnya?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Pernah - " name="pertanyaan4" id="pernah1" required>
                                <label class="form-check-label" for="pernah1">
                                    Pernah 
                                </label>
                                    <x-jet-input id="pertanyaan4" placeholder="Terakhir mengkonsumsi..." class="my-1 ml-14 w-80" type="text" name="pertanyaan4" :value="old('pertanyaan4')"  />
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan4" id="tidak2" required>
                                <label class="form-check-label" for="tidak2">
                                    Tidak Pernah
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                5. Pernah Pacaran atau tidak?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input my-2" type="radio" value="Pernah" name="pertanyaan5" id="pernah3" required>
                                <label class="form-check-label my-2" for="pernah3">
                                    Pernah 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan5" id="tidak3" required>
                                <label class="form-check-label" for="tidak3">
                                    Tidak Pernah
                                </label>
                            </div>
                        </div>
                    
                        <div class="mt-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                6. Tes Matematika 
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Lancar - " name="pertanyaan6" id="Lancar" required>
                                <label class="form-check-label" for="Lancar">
                                    Lancar 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Kurang Lancar" name="pertanyaan6" id="kurang" required>
                                <label class="form-check-label" for="kurang">
                                    Kurang Lancar
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Lancar" name="pertanyaan6" id="tidaklancar" required>
                                <label class="form-check-label" for="tidaklancar">
                                    Tidak Lancar
                                </label>
                            </div>
                        </div>

                        <div class="mt-4 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                7. Jurusan yang diminati
                            </label>
                            <select name="pertanyaan7" id="pertanyaan7" class="border-gray-300 sm:rounded-md mt-1 block w-full" :value="old('pertanyaan7')" required>
                                <option class="opacity-50">Pilih</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            </select>
                        </div>

                        <div class="mt-4 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                8. Alasan Mengambil Jurusan Tersebut
                            </label>
                            <x-jet-input id="pertanyaan8" placeholder="Jawaban..." class="my-1 w-full" type="text" name="pertanyaan8" :value="old('pertanyaan8')" required />
                        </div>
                    </div>

                        <div class="my-3 mb-6">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                9. Unggulan Atau Reguler?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Unggulan" name="pertanyaan9" id="unggulan" required>
                                <label class="form-check-label" for="unggulan">
                                    Unggulan 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Reguler" name="pertanyaan9" id="reguler" required>
                                <label class="form-check-label" for="reguler">
                                    Reguler
                                </label>
                            </div>
                        
                    <br>
                    <h2 class="font-semibold text-xl mt-2 text-blue-800">B. Orang Tua</h2>
                    <hr>
                    <div class="grid grid-cols-2">
                        <div class="mt-2 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                               1. Tau Sekolah SMK Wikrama 1 Garut Dari mana?
                            </label>
                            <select name="pertanyaan1_ortu" id="pertanyaan1_ortu" :value="old('pertanyaan1_ortu')" class="border-gray-300 mt-1 block w-full sm:rounded-md" required>
                                <option>Pilih Jawaban</option>
                                <option value="Guru/Staf/Laboran/Pegawai Wikrama">Guru/Staf/Laboran/Pegawai Wikrama</option>
                                <option value="Siswa SMK Wikrama">Siswa SMK Wikrama</option>
                                <option value="Alumni SMK Wikrama">Alumni SMK Wikrama</option>
                                <option value="Guru SMP">Guru SMP</option>
                                <option value="Calon Siswa SMK Wikrama">Calon Siswa SMK Wikrama</option>
                                <option value="Sosial Media">Sosial Media</option>
                                <option value="Referensi Langsung">Referensi Langsung</option>
                            </select>
                        </div>

                        <div class="mt-2 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                2. Alasan ibu/bapak memasukan anaknya ke Wikrama?
                            </label>
                            <x-jet-input id="pertanyaan2_ortu" placeholder="Jawaban....." class="block mt-1 w-full" type="text" name="pertanyaan2_ortu" :value="old('pertanyaan2_ortu')" required />
                        </div>

                        <div class="mt-3">
                            <label class="font-bold font-bold  text-black text-opacity-75 text-md form-check-label">
                                3. Apakah ibu/bapak mengizinkan anaknya untuk merokok?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Diizinkan Merokok" name="pertanyaan3_ortu" id="diizinkan" required>
                                <label class="form-check-label" for="diizinkan">
                                    Diizinkan
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Diizinkan Merokok" name="pertanyaan3_ortu" id="tidak_diizinkan" required>
                                <label class="form-check-label" for="tidak_diizinkan">
                                    Tidak Diizinkan
                                </label>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                4. Pernah Mengkonsumsi Narkoba dan semacamnya?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Pernah - " name="pertanyaan4" id="pernah1" required>
                                <label class="form-check-label" for="pernah1">
                                    Pernah 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan4" id="tidak2" required>
                                <label class="form-check-label" for="tidak2">
                                    Tidak Pernah
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                5. Pernah Pacaran atau tidak?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input my-2" type="radio" value="Pernah" name="pertanyaan5" id="pernah3" required>
                                <label class="form-check-label my-2" for="pernah3">
                                    Pernah 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan5" id="tidak3" required>
                                <label class="form-check-label" for="tidak3">
                                    Tidak Pernah
                                </label>
                            </div>
                        </div>
                    
                        <div class="mt-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                6. Tes Matematika 
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Lancar - " name="pertanyaan6" id="Lancar" required>
                                <label class="form-check-label" for="Lancar">
                                    Lancar 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Kurang Lancar" name="pertanyaan6" id="kurang" required>
                                <label class="form-check-label" for="kurang">
                                    Kurang Lancar
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Tidak Lancar" name="pertanyaan6" id="tidaklancar" required>
                                <label class="form-check-label" for="tidaklancar">
                                    Tidak Lancar
                                </label>
                            </div>
                        </div>

                        <div class="mt-4 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                7. Jurusan yang diminati
                            </label>
                            <select name="pertanyaan7" id="pertanyaan7" class="border-gray-300 sm:rounded-md mt-1 block w-full" :value="old('pertanyaan7')" required>
                                <option class="opacity-50">Pilih</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            </select>
                        </div>

                        <div class="mt-4 mr-3">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                8. Alasan Mengambil Jurusan Tersebut
                            </label>
                            <x-jet-input id="pertanyaan8" placeholder="Jawaban..." class="my-1 w-full" type="text" name="pertanyaan8" :value="old('pertanyaan8')" required />
                        </div>
                    </div>

                        <div class="my-3 mb-6">
                            <label class="font-bold  text-black text-opacity-75 text-md form-check-label">
                                9. Unggulan Atau Reguler?
                            </label>
                            
                            <div class="text-black text-opacity-75 form-check">
                                <input class="form-check-input" type="radio" value="Unggulan" name="pertanyaan9" id="unggulan" required>
                                <label class="form-check-label" for="unggulan">
                                    Unggulan 
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" value="Reguler" name="pertanyaan9" id="reguler" required>
                                <label class="form-check-label" for="reguler">
                                    Reguler
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                        
                        <div class="flex items-center ml-12">
                            <x-jet-button class=" mb-7">
                                {{ __('Kirim') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>

</x-guest-layout>