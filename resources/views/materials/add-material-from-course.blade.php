<x-layout>
    <section class="bg-white dark:bg-gray-900 border border-gray-200">
        <div class="py-8 mb-4` px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">Tambah Materi pada Kursus:
                {{ $course->title }}</h2>
            <form action="{{ route('course.add.material', $course->slug) }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:cool-span-2">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="title" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Materi</label>
                        <input type="text" name="title" id="title"
                            class="@error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tuliskan judul materi" autocomplete="off">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="link"
                            class="block my-2 my text-sm font-medium text-gray-900 dark:text-white">Link Embed
                            Materi</label>
                        <input type="text" name="link" id="link"
                            class="@error('link') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan link embed materi" autocomplete="off">
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                            Materi</label>
                        <textarea id="description" rows="8" name="description"
                            class="@error('description') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Jelaskan Deskripsi Kursus"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah Kursus
                </button>
            </form>
        </div>
    </section>
</x-layout>
