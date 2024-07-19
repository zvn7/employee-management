<x-layout>
    <div class="min-h-screen">
        <div class="p-4 bg-white shadow-md rounded-lg overflow-hidden">
            <div>
                <h4 class="text-2xl font-semibold">Edit Data</h4>
                <div class="p-4">
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name', $employee->name) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                                   required
                            />
                            @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email', $employee->email) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                   required
                            />
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                            <input type="date"
                                   name="birthdate"
                                   id="birthdate"
                                   value="{{ old('birthdate', $employee->birthdate) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('birthdate') border-red-500 @enderror"
                                   required
                            />
                            @error('birthdate')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text"
                                   name="position"
                                   id="position"
                                   value="{{ old('position', $employee->position) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('position') border-red-500 @enderror"
                                   required
                            />
                            @error('position')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender"
                                    id="gender"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('gender') border-red-500 @enderror"
                                    required
                            >
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $employee->gender) === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $employee->gender) === 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                            <div id="currentPhoto" class="mb-2">
                                @if ($employee->photo)
                                    <p>Current Photo:</p>
                                    <img src="{{ $employee->photo }}" alt="Current Photo" class="max-w-xs h-auto"/>
                                @else
                                    <p>No current photo available</p>
                                @endif
                            </div>

                            <input type="file"
                                   name="photo"
                                   id="photo"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('photo') border-red-500 @enderror"
                                   accept="image/*"
                            />
                            <div id="photo-preview" class="mt-4">
                                <!-- Image preview will be displayed here -->
                            </div>
                            @error('photo')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        

                         <!-- Province Field -->
                         <div class="mb-4">
                            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                            <input type="text"
                                   name="province"
                                   id="province"
                                   value="{{ old('province', $employee->province) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('province') border-red-500 @enderror"
                                   disabled
                            />
                            @error('province')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- City Field -->
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text"
                                   name="city"
                                   id="city"
                                   value="{{ old('city', $employee->city) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('city') border-red-500 @enderror"
                                   disabled
                            />
                            @error('city')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- District Field -->
                        <div class="mb-4">
                            <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                            <input type="text"
                                   name="district"
                                   id="district"
                                   value="{{ old('district', $employee->district) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('district') border-red-500 @enderror"
                                   disabled
                            />
                            @error('district')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Subdistrict Field -->
                        <div class="mb-4">
                            <label for="subdistrict" class="block text-sm font-medium text-gray-700">Subdistrict</label>
                            <input type="text"
                                   name="subdistrict"
                                   id="subdistrict"
                                   value="{{ old('subdistrict', $employee->subdistrict) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('subdistrict') border-red-500 @enderror"
                                   disabled
                            />
                            @error('subdistrict')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text"
                                   name="address"
                                   id="address"
                                   value="{{ old('address', $employee->address) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror"
                                   disabled
                            />
                            @error('address')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text"
                                   name="phone"
                                   id="phone"
                                   value="{{ old('phone', $employee->phone) }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                            />
                            @error('phone')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                            <textarea name="notes"
                                      id="notes"
                                      rows="3"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('notes') border-red-500 @enderror"
                            >{{ old('notes', $employee->notes) }}</textarea>
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
                            >Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
