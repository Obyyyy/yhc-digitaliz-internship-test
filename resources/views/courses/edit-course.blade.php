<x-layout>
    <section class="bg-white dark:bg-gray-900 border border-gray-200">
        <div class="py-8 mb-4` px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">Edit Kursus</h2>
            <form action="{{ route('course.edit', $course->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label for="title" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Kursus</label>
                        <input type="text" name="title" id="title"
                            class="@error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketikkan Judul Kursus" autocomplete="off" value="{{ $course->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="duration"
                            class="block my-2 my text-sm font-medium text-gray-900 dark:text-white">Durasi
                            Kursus</label>
                        {{-- <input type="text" name="duration" id="duration"
                            class="@error('duration') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tentukan Durasi Kursus (Jam)" value="{{ $course->duration }}"> --}}
                        <div class="flex flex-col">
                            <div class="flex">
                                <input type="number" name="duration" id="duration"
                                    class="@error('duration') is-invalid @enderror rounded-s-md bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tentukan Durasi Kursus (Jam)" value="{{ $course->duration }}">
                                <span
                                    class="inline-flex font-bold items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300  rounded-none rounded-e-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">Jam
                                </span>
                            </div>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="sm:col-span-2">
                        <label for="website-admin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <div class="flex">
                            <input type="text" id="website-admin"
                                class="rounded-s-md bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Bonnie Green">
                            <span
                                class="inline-flex font-bold items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300  rounded-none rounded-e-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">Jam
                            </span>
                        </div>
                    </div> --}}

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                            Kursus</label>
                        <textarea id="description" rows="8" name="description"
                            class="@error('description') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Jelaskan Deskripsi Kursus">{{ $course->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-6 h-6 me-1 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                    Edit Kursus
                </button>
            </form>
        </div>
    </section>
</x-layout>
