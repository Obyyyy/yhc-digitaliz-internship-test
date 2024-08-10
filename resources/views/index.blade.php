<x-layout>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <a href="{{ route('courses') }}" class="hover:cursor-pointer">
            <div
                class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-blue-100 border-blue-300 dark:border-blue-600 shadow-lg">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
                        <svg class="w-10 h-10 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            {{-- <path fill-rule="evenodd" stroke-width="2"
                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                            clip-rule="evenodd" /> --}}
                            <path fill-rule="evenodd" stroke-width="1.5"
                                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-blue-800">Kursus</h2>
                    <p class="text-4xl font-bold text-blue-600">{{ $courseCount }}</p>
                </div>
            </div>
        </a>
        <a href="{{ route('materials') }}" class="hover:cursor-pointer">
            <div
                class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-green-100 border-green-300 dark:border-green-600 shadow-lg">

                <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
                        <svg class="w-10 h-10 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                        </svg>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-green-800">Materi</h2>
                    <p class="text-4xl font-bold text-green-600">{{ $materialCount }}</p>
                </div>
            </div>
        </a>
    </div>
</x-layout>
