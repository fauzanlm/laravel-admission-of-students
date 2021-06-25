<x-app-layout>
@section('title', 'Dokumen - SMK Wikrama 1 Garut')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form class="ml-4 mt-4" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                    
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="mt-2">
                            <x-jet-label for="kk" value="{{ __('Kartu Keluarga') }}" />
                            <x-jet-input id="kk" class="block mt-1" type="file" name="kk" :value="old('kk')" required autofocus autocomplete="kk" />
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="mt-2">
                            <x-jet-label for="akte" value="{{ __('Akte') }}" />
                            <x-jet-input id="akte" class="block mt-1 " type="file" name="akte" :value="old('akte')" required autofocus autocomplete="akte" />
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="mt-2">
                            <x-jet-label for="skhun" value="{{ __('SKHUN') }}" />
                            <x-jet-input id="skhun" class="block mt-1 " type="file" name="skhun" :value="old('skhun')" required autofocus autocomplete="skhun" />
                        </div>
                    </div>
                </div>
                
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="mt-2">
                            <x-jet-label for="ijazah" value="{{ __('Ijazah') }}" />
                            <x-jet-input id="ijazah" class="block mt-1 " type="file" name="ijazah" :value="old('ijazah')" required autofocus autocomplete="ijazah" />
                        </div>
                    </div>
                </div>

                    <div class="flex items-center mt-3">
                    <x-jet-input id="nisn" class="block mt-1 w-full invisible" type="hidden" name="nisn" value="{{ Auth::user()->nisn }}"/>
                        <x-jet-button class=" mb-3 mr-10" type="submit">
                            {{ __('Kirim') }}
                        </x-jet-button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>