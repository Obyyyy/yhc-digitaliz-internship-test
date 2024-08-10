<x-layout>
    <ol
        class="flex items-center w-full p-3 mb-4 space-x-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-200 rounded-md dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
        <li class="flex items-center">
            <a class="hover:underline hover:text-blue-500" href="{{ route('courses') }}">List Kursus</a>
            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
        </li>
        <li class="flex items-center">
            <a class="hover:underline hover:text-blue-500"
                href="{{ route('course.detail', $material->course->slug) }}">{{ $material->course->title }}</a>
            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
        </li>
        <li class="flex items-center text-gray-500">
            Edit Materi
        </li>
    </ol>

    <section class="bg-white dark:bg-gray-900 border border-gray-200">
        <div class="py-8 mb-4` px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">Edit materi pada kursus:
                {{ $material->course->title }}</h2>
            <form action="{{ route('material.edit', $material->slug) }}" method="POST">
                @csrf
                @method('PUT')
                @if (request()->query('course'))
                    <input type="hidden" name="course" value="{{ request()->query('course') }}">
                @endif
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Materi</label>
                        <input type="text" name="title" id="title"
                            class="@error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tuliskan judul materi" autocomplete="off" value="{{ $material->title }}">
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
                            placeholder="Masukkan link embed materi" autocomplete="off" value="{{ $material->link }}">
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
                            placeholder="Jelaskan Deskripsi Kursus">{{ $material->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    {{-- <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg> --}}
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit Materi
                </button>
            </form>
        </div>
    </section>
</x-layout>
