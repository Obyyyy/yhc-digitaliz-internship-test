<x-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 py-6 px-2  relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0"
                            action="{{ route('courses') }}" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full flex-grow">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari Kursus">
                            </div>
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 px-1">
                                <button type="submit"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Menambahkan Course --}}
                    <div
                        class="w-full md:w-1/2 flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('course.form.add') }}">
                            <button type="button"
                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Kursus
                            </button>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Deskripsi</th>
                                <th scope="col" class="px-4 py-3">Durasi</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $index => $course)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $course->title }}</th>
                                    <td class="px-4 py-3">{{ Str::limit($course->description, 50) }}</td>
                                    <td class="px-4 py-3">{{ $course->duration }} Jam</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="apple-imac-27-dropdown-button"
                                            data-dropdown-toggle="dropdown-{{ $index }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="dropdown-{{ $index }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdown-{{ $index }}">
                                                <li>
                                                    <a href="{{ route('course.detail', ['course' => $course->slug]) }}"
                                                        class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2"
                                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                            <path stroke="currentColor" stroke-width="2"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        Lihat</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('course.form.edit', $course->slug) }}"
                                                        class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                        Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <form id="delete-form-{{ $index }}"
                                                    action="{{ route('course.delete', ['course' => $course->slug]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="delete-button-{{ $index }}" type="button"
                                                        data-modal-target="popup-modal-{{ $index }}"
                                                        class="flex
                                                        items-center w-full text-left py-2 px-4 text-sm text-gray-700
                                                        hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200
                                                        dark:hover:text-white"
                                                        data-modal-toggle="popup-modal-{{ $index }}"><svg
                                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                        </svg> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $courses->links() }}
            </div>

        </div>
    </section>
    {{-- Success Pop Up --}}
    <div id="successModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="successModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div
                    class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Success</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ Session::get('success') }}</p>
                <button data-modal-toggle="successModal" type="button"
                    class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">
                    Continue
                </button>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var successModal = new Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
    @endif

    {{-- Error pop up --}}
    <div id="errorModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="errorModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div
                    class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-red-500 dark:text-red-400" fill="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Success</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ Session::get('error') }}</p>
                <button data-modal-toggle="errorModal" type="button"
                    class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">
                    Continue
                </button>
            </div>
        </div>
    </div>
    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var errorModal = new Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
        </script>
    @endif

    {{-- Confirm Delete Pop Up --}}
    @foreach ($courses as $index => $course)
        <div id="popup-modal-{{ $index }}" tabindex="-1" data-modal-id="popup-modal-{{ $index }}"
            class="hidden overflow-y-auto overflow-x-hidden fixed flex z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" id="close-button-{{ $index }}"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal-{{ $index }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus
                            data
                            ini?</h3>
                        <button id="confirm-delete-{{ $index }}" type="button"
                            data-modal-hide="popup-modal-{{ $index }}"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, lanjutkan
                        </button>
                        <button id="cancel-delete-{{ $index }}" type="button"
                            data-modal-hide="popup-modal-{{ $index }}"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak,
                            kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        {{-- <div id="overlay-{{ $index }}" class="fixed inset-0 bg-red-400 bg-opacity-50 z-40 hidden"></div> --}}
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle all delete buttons with dynamic IDs
            document.querySelectorAll('[id^="delete-button-"]').forEach(button => {
                button.addEventListener('click', function() {
                    const index = this.id.replace('delete-button-', '');
                    const modal = document.getElementById(`popup-modal-${index}`);
                    if (modal) {
                        modal.classList.remove('hidden');
                    }
                });
            });

            // Handle confirmation button for each modal
            document.querySelectorAll('[id^="confirm-delete-"]').forEach(confirmButton => {
                confirmButton.addEventListener('click', function() {
                    const index = this.id.replace('confirm-delete-', '');
                    const form = document.getElementById(`delete-form-${index}`);
                    if (form) {
                        form.submit();
                    }
                });
            });

            // Handle cancel button for each modal
            // document.querySelectorAll('[id^="cancel-delete-"]').forEach(button => {
            //     button.addEventListener('click', function() {
            //         const index = this.id.replace('cancel-delete-', '');
            //         const modal = document.getElementById(`popup-modal-${index}`);
            //         if (modal) {
            //             modal.classList.add('hidden');
            //         }
            //     });
            // });


            // Handle close button for each modal
            // document.querySelectorAll('[id ^= "close-button-"]').forEach(closeButton => {
            //     closeButton.addEventListener('click', function() {
            //         const index = this.id.replace('close-button-', '');
            //         const modal = document.getElementById(`popup-modal-${index}`);
            //         if (modal) {
            //             modal.classList.add('hidden');
            //         }
            //     });
            // });

            // Close modal when clicking outside of it
            // window.addEventListener('click', function(event) {
            //     document.querySelectorAll('[id^="popup-modal-"]').forEach(modal => {
            //         const index = modal.id.split('-').pop();
            //         const overlay = document.getElementById(`overlay-${index}`);
            //         overlay.classList.add('hidden');
            //         // if (!modal.contains(event.target) && !overlay.contains(event.target) && !event
            //         //     .target.matches('[data-modal-toggle]')) {
            //         //     if (modal && overlay) {
            //         //         // modal.classList.add('hidden');
            //         //         // overlay.classList.add('hidden');
            //         //     }
            //         // }
            //     });
            // });
        });
    </script>
</x-layout>
