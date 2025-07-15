<div class="font-std mb-10 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-2/3 md:pl-8">
            <h1 class="text-2xl font-bold text-indigo-800 mb-2">{{ $mother->nama }}</h1>
            <p class="text-gray-600 mb-6">Umur : {{ $mother->umur }} Tahun</p>
            <p class="text-gray-700 mb-6">
                Berat Badan : {{ $mother->berat_badan }} KG
            </p>
            <p class="text-gray-700 mb-6">
                Berat Badan : {{ $mother->berat_badan }} KG
            </p>
            <p class="text-gray-700 mb-6">
                Tinggi Badan : {{ $mother->tinggi_badan }} CM
            </p>
            <ul class="space-y-2 text-gray-700">
                <li class="flex items-center my-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                    {{ $mother->no_hp }}
                </li>
            </ul>

            <h2 class="text-xl font-semibold text-indigo-800 my-4">Informasi Bayi</h2>
            <p class="text-gray-700 mb-6">
                Nama : {{ $mother->child->nama }} CM
            </p>
            <p class="text-gray-700 mb-6">
                Jenis kelamin : {{ $mother->child->jenis_kelamin }} CM
            </p>
            <p class="text-gray-700 mb-6">
                Umur : {{ $mother->child->tanggal_lahir }} CM
            </p>
            <p class="text-gray-700 mb-6">
                Berat Badan : {{ $mother->child->berat_badan }} KG
            </p>
            <p class="text-gray-700 mb-6">
                Berat Badan : {{ $mother->child->berat_badan }} KG
            </p>

        </div>
    </div>

</div>
