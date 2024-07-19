<x-layout>
    <div
        class="bg-white rounded-md p-4"
        x-data="{ showModal: false, deleteId: null }"
    >
        <div class="flex l md:flex-row justify-between items-center mb-4">
            <h1 class="text-2xl font-bold mb-2 md:mb-0">
                Daftar Data Karyawan
            </h1>
            <a
                href="{{ route('employee.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md flex items-center justify-center space-x-2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 md:h-5 md:w-5"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M7.345 4.017a42.253 42.253 0 0 1 9.31 0c1.713.192 3.095 1.541 3.296 3.26a40.66 40.66 0 0 1 0 9.446c-.201 1.719-1.583 3.068-3.296 3.26a42.245 42.245 0 0 1-9.31 0c-1.713-.192-3.095-1.541-3.296-3.26a40.652 40.652 0 0 1 0-9.445a3.734 3.734 0 0 1 3.295-3.26M12 7.007a.75.75 0 0 1 .75.75v3.493h3.493a.75.75 0 1 1 0 1.5H12.75v3.493a.75.75 0 0 1-1.5 0V12.75H7.757a.75.75 0 0 1 0-1.5h3.493V7.757a.75.75 0 0 1 .75-.75"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="hidden md:inline-block justify-self-end">
                    Tambah Data
                </span>
            </a>
        </div>

        @if (session('message'))
        <div
            class="bg-green-100 border-l-4 border-green-500 text-green-700 rounded-md p-4 mb-4"
            role="alert"
        >
            {{ session("message") }}
        </div>
        @endif

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full">
                <table class="min-w-full leading-normal" id="myTable">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                #
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Nama
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Posisi
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Alamat
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Tanggal Lahir
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp @forelse ($employee as $item)
                        <tr>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $no++ }}
                                </p>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <div class="flex items-center gap-3">
                                    <img
                                        src="{{ $item->photo }}"
                                        alt="Employee Photo"
                                        class="inline-block relative object-cover object-center !rounded-full w-9 h-9 rounded-md"
                                    />
                                    <div class="flex flex-col">
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal"
                                        >
                                            {{ $item->name }}
                                        </p>
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70"
                                        >
                                            {{ $item->email }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->position }}
                                </p>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->address }}
                                </p>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->birthdate }}
                                </p>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <div class="flex space-x-2">
                                    <a
                                        href="{{ route('employee.edit', $item->id) }}"
                                        class="text-black hover:bg-gray-300 py-1 px-1 rounded-md flex items-center"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0zM15 6l3 3m-5 11h8"
                                            />
                                        </svg>
                                    </a>
                                    <button
                                        type="button"
                                        @click="showModal = true; deleteId = {{ $item->id }}; $nextTick(() => { $refs.deleteForm.action = '{{
                                            route('employee.destroy', '')
                                        }}/' + deleteId })"
                                        class="text-black hover:bg-gray-300 py-1 px-1 rounded-md flex items-center"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="currentColor"
                                                fill-rule="evenodd"
                                                d="m18.412 6.5l-.801 13.617A2 2 0 0 1 15.614 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5H3.5v-1A.5.5 0 0 1 4 5h16a.5.5 0 0 1 .5.5v1zM10 2.5h4a.5.5 0 0 1 .5.5v1h-5V3a.5.5 0 0 1 .5-.5M9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td
                                colspan="6"
                                class="px-5 py-5 bg-white text-sm text-gray-900 text-center"
                            >
                                Empty
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div
            x-show="showModal"
            class="fixed inset-0 flex items-center justify-center z-50"
        >
            <div
                class="bg-white rounded-lg p-6 w-96 max-w-full shadow-lg transform transition-all duration-300"
                x-show.transition.opacity="showModal"
            >
                <!-- Modal Header -->
                <div
                    class="flex justify-between items-center border-b-2 border-gray-200 pb-4"
                >
                    <h2 class="text-2xl font-semibold">Confirm Deletion</h2>
                    <button
                        @click="showModal = false"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-x"
                        >
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <!-- Modal Content -->
                <div class="mt-6 space-y-4">
                    <p class="text-lg text-gray-600">
                        Are you sure you want to delete this item?
                    </p>
                    <div class="flex justify-end space-x-4">
                        <form x-ref="deleteForm" method="POST">
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300"
                            >
                                Delete
                            </button>
                        </form>
                        <button
                            @click="showModal = false"
                            class="bg-gray-200 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
