<x-layout>
        <div class="p-4 bg-white shadow-md rounded-lg">
            <div>
                <h4 class="text-2xl font-semibold">Tambah Data</h4>
                <div class="p-4">
                    <form
                        action="{{ route('employee.store') }}"
                        method="POST"
                        class="space-y-4"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                            />

                            @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                            />

                            @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('birthdate') border-red-500 @enderror"
                                   name="birthdate"
                                   value="{{ old('birthdate') }}"
                                   required
                            />

                            @error('birthdate')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('position') border-red-500 @enderror"
                                   name="position"
                                   value="{{ old('position') }}"
                                   required
                            />

                            @error('position')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('gender') border-red-500 @enderror"
                                    required
                            >
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                            </select>

                            @error('gender')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file"
                                   name="photo"
                                   id="photo"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('photo') border-red-500 @enderror"
                                   accept="image/*"
                            />
                        
                            @error('photo')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        
                            <div id="photo-preview" class="mt-4">
                                <!-- Image preview will be displayed here -->
                            </div>
                        </div>

                        <!-- <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror"
                            >{{ old('address') }}</textarea>

                            @error('address')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div> -->

                        <!-- Province Field -->
                        <div class="mb-4">
                            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                            <select name="province" id="province" class="js-example-basic-single mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required>
                                <option value="" disabled selected>Select Province</option>
                            </select>
                        </div>

                        <!-- City Field -->
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <select name="city" id="city" class="js-example-basic-single mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required>
                                <option value="" disabled selected>Select City</option>
                            </select>
                        </div>

                        <!-- District Field -->
                        <div class="mb-4">
                            <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                            <select name="district" id="district" class="js-example-basic-single mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required>
                                <option value="" disabled selected>Select District</option>
                            </select>
                        </div>

                        <!-- Subdistrict Field -->
                        <div class="mb-4">
                            <label for="subdistrict" class="block text-sm font-medium text-gray-700">Subdistrict</label>
                            <select name="subdistrict" id="subdistrict" class="js-example-basic-single mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required>
                                <option value="" disabled selected>Select Subdistrict</option>
                            </select>
                        </div>


                        <!-- address -->

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text"
                                   name="address"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror"
                                   value="{{ old('address') }}"
                            />

                            @error('address')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text"
                                   name="phone"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                                   value="{{ old('phone') }}"
                            />

                            @error('phone')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                            <textarea name="notes"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('notes') border-red-500 @enderror"
                            >{{ old('notes') }}</textarea>

                            @error('notes')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <a href="{{ route('employee.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded-md"
                            >Back</a>
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md"
                            >Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
