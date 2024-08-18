<div class="mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Teacher</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <!-- Personal Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block">Name (Bangla)*</label>
                <input type="text" wire:model.live="name_bn" class="w-full p-2 border rounded" >
                @error('name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Name (English)*</label>
                <input type="text" wire:model.live="name_en" class="w-full p-2 border rounded" >
                @error('name_en') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Gender*</label>
                <select wire:model.live="gender" class="w-full p-2 border rounded" >
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">DOB*</label>
                <input type="date" wire:model.live="dob" class="w-full p-2 border rounded" >
                @error('dob') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Mobile Number*</label>
                <input type="text" wire:model.live="mobile_number" class="w-full p-2 border rounded" >
                @error('mobile_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Email</label>
                <input type="email" wire:model.live="email" class="w-full p-2 border rounded">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Designation*</label>
                <input type="text" wire:model.live="designation" class="w-full p-2 border rounded" >
                @error('designation') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">First Joining*</label>
                <input type="date" wire:model.live="first_joining" class="w-full p-2 border rounded" >
                @error('first_joining') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Job Status*</label>
                <input type="text" wire:model.live="job_status" class="w-full p-2 border rounded" >
                @error('job_status') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Pin Number*</label>
                <input type="text" wire:model.live="pin_number" class="w-full p-2 border rounded" >
                @error('pin_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality*</label>
                <select id="nationality" wire:model.live="nationality" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nationality') border-red-500 @enderror">
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Others">Others</option>
                </select>
                @error('nationality') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
    
            @if ($nationality === 'Others')
                <div>
                    <label for="customNationality" wire:model.live="religion" class="block text-sm font-medium text-gray-700">Nationality Name*</label>
                    <input id="customNationality" type="text" wire:model="customNationality" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customNationality') border-red-500 @enderror">
                    @error('customNationality') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            @endif    


            <div>
                <label for="religion" class="block text-sm font-medium text-gray-700">Religion*</label>
                <select id="religion" wire:model.live="religion" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('religion') border-red-500 @enderror">
                    <option value="">Select Religion</option>
                    <option value="Islam" @if(old('religion', $religion) === 'Islam') selected @endif>Islam</option>
                    <option value="Hindu" @if(old('religion', $religion) === 'Hindu') selected @endif>Hindu</option>
                </select>
                @error('religion') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            

            <div>
                <label class="block">Blood Group*</label>
                <input type="text" wire:model.live="blood_group" class="w-full p-2 border rounded" >
                @error('blood_group') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label class="block">Signature</label>
                <input type="file" wire:model.live="signature" class="w-full p-2 border rounded">
                @error('signature') <span class="text-red-500">{{ $message }}</span> @enderror

                @if ($signature)
                    <img src="{{ $signature->temporaryUrl() }}" alt="Signature Preview" class="mt-2 w-32 h-32 rounded">
                @endif

                <!-- Loading spinner -->
                <div wire:loading wire:target="signature" class="mt-2 flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291l1.712-1.712a4.978 4.978 0 01-.29-1.579H4.065a8.032 8.032 0 002.935 3.291zM12 20a8 8 0 008-8h4c0 6.627-5.373 12-12 12v-4zm5.291-6l-1.712 1.712a4.978 4.978 0 01.29 1.579h2.482a8.032 8.032 0 00-3.061-3.291z"></path>
                    </svg>
                    Uploading Signature...
                </div>
            </div>
     

            <div>
                <label class="block">Photo</label>
                <input type="file" wire:model.live="photo" class="w-full p-2 border rounded">
                @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror

                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview" class="mt-2 w-32 h-32 rounded">
                @endif

                <!-- Loading spinner -->
                <div wire:loading wire:target="photo" class="mt-2 flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291l1.712-1.712a4.978 4.978 0 01-.29-1.579H4.065a8.032 8.032 0 002.935 3.291zM12 20a8 8 0 008-8h4c0 6.627-5.373 12-12 12v-4zm5.291-6l-1.712 1.712a4.978 4.978 0 01.29 1.579h2.482a8.032 8.032 0 00-3.061-3.291z"></path>
                    </svg>
                    Uploading...
                </div>
            </div>
        </div>
        

        
        <div>
            <h2 class="text-xl font-bold mb-2">Present Address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block">Division*</label>
                    <select wire:model.live="present_division" class="w-full p-2 border rounded">
                        <option value="">Select Division</option>
                        @foreach ($locations['divisions'] as $division)
                            <option value="{{ $division }}">{{ $division }}</option>
                        @endforeach
                    </select>
                    @error('present_division') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">District*</label>
                    <select wire:model.live="present_district" class="w-full p-2 border rounded">
                        <option value="">Select District</option>
                        @if (isset($locations['districts'][$present_division]))
                            @foreach ($locations['districts'][$present_division] as $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('present_district') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Upazila*</label>
                    <select wire:model.live="present_upazila" class="w-full p-2 border rounded">
                        <option value="">Select Upazila</option>
                        @if (isset($locations['upazilas'][$present_district]))
                            @foreach ($locations['upazilas'][$present_district] as $upazila)
                                <option value="{{ $upazila }}">{{ $upazila }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('present_upazila') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Union</label>
                    <input type="text" wire:model.live="present_union" class="w-full p-2 border rounded">
                    @error('present_union') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Post Office*</label>
                    <input type="text" wire:model.live="present_post_office" class="w-full p-2 border rounded">
                    @error('present_post_office') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Postal Code</label>
                    <input type="text" wire:model.live="present_postal_code" class="w-full p-2 border rounded">
                    @error('present_postal_code') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Address*</label>
                    <textarea wire:model.live="present_address" class="w-full p-2 border rounded"></textarea>
                    @error('present_address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" wire:model.live="same_address" id="same_address" class="mr-2">
                <label for="same_address">Same as Permanent Address</label>
            </div>
        
            <h2 class="text-xl font-bold">Permanent Address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block">Division*</label>
                    <select wire:model.live="permanent_division" class="w-full p-2 border rounded">
                        <option value="">Select Division</option>
                        @foreach ($locations['divisions'] as $division)
                            <option value="{{ $division }}">{{ $division }}</option>
                        @endforeach
                    </select>
                    @error('permanent_division') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">District*</label>
                    <select wire:model.live="permanent_district" class="w-full p-2 border rounded">
                        <option value="">Select District</option>
                        @if (isset($locations['districts'][$permanent_division]))
                            @foreach ($locations['districts'][$permanent_division] as $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('permanent_district') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Upazila*</label>
                    <select wire:model.live="permanent_upazila" class="w-full p-2 border rounded">
                        <option value="">Select Upazila</option>
                        @if (isset($locations['upazilas'][$permanent_district]))
                            @foreach ($locations['upazilas'][$permanent_district] as $upazila)
                                <option value="{{ $upazila }}">{{ $upazila }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('permanent_upazila') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Union</label>
                    <input type="text" wire:model.live="permanent_union" class="w-full p-2 border rounded">
                    @error('permanent_union') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Post Office*</label>
                    <input type="text" wire:model.live="permanent_post_office" class="w-full p-2 border rounded">
                    @error('permanent_post_office') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Postal Code</label>
                    <input type="text" wire:model.live="permanent_postal_code" class="w-full p-2 border rounded">
                    @error('permanent_postal_code') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
        
                <div>
                    <label class="block">Address*</label>
                    <textarea wire:model.live="permanent_address" class="w-full p-2 border rounded"></textarea>
                    @error('permanent_address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        

        <!-- Subjects of Teaching -->
        <h2 class="text-xl font-bold mb-2">Subjects of Teaching</h2>
        <div class="mb-4">
            <label class="block mb-2">Subjects (optional)</label>
            <div class="flex flex-wrap gap-2">
                @foreach(['বাংলা', 'ইংরেজি', 'গণিত', 'প্রাথমিক বিজ্ঞান', 'বাংলাদেশ ও বিশ্বপরিচয়', 'ইসলাম ধর্ম ও নৈতিক শিক্ষা', 'হিন্দুধর্ম ও নৈতিক শিক্ষা'] as $subject)
                <label class="inline-flex items-center">
                    <input type="checkbox" value="{{ $subject }}" wire:model.live="subjects_of_teaching" class="form-checkbox h-5 w-5 text-green-600">
                    <span class="ml-2">{{ $subject }}</span>
                </label>
                @endforeach
            </div>
            @error('subjects_of_teaching') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <!-- Educational Qualifications -->
        <h2 class="text-xl font-bold mb-2">Educational Qualifications</h2>
        @foreach ($this->educational_qualifications as $index => $qualification)
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <div>
                    <label class="block">Degree*</label>
                    <input type="text" wire:model.live="educational_qualifications.{{ $index }}.degree" class="w-full p-2 border rounded" >
                    @error('educational_qualifications.' . $index . '.degree') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Subject*</label>
                    <input type="text" wire:model.live="educational_qualifications.{{ $index }}.subject" class="w-full p-2 border rounded" >
                    @error('educational_qualifications.' . $index . '.subject') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Board*</label>
                    <input type="text" wire:model.live="educational_qualifications.{{ $index }}.board" class="w-full p-2 border rounded" >
                    @error('educational_qualifications.' . $index . '.board') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Passing Year*</label>
                    <input type="text" wire:model.live="educational_qualifications.{{ $index }}.passing_year" class="w-full p-2 border rounded" >
                    @error('educational_qualifications.' . $index . '.passing_year') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Grade*</label>
                    <input type="text" wire:model.live="educational_qualifications.{{ $index }}.grade" class="w-full p-2 border rounded" >
                    @error('educational_qualifications.' . $index . '.grade') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" wire:click.prevent="removeEducationalQualification({{ $index }})" class="bg-red-500 text-white px-4 py-2 rounded mt-4">Remove</button>
                </div>
            </div>
        @endforeach
        <button type="button" wire:click.prevent="addEducationalQualification()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Add Educational Qualification</button>

        <!-- Training Information -->
        <h2 class="text-xl font-bold mb-2">Training Information</h2>
        @foreach ($this->training_information as $index => $training)
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block">Training Details*</label>
                    <input type="text" wire:model.live="training_information.{{ $index }}.training_details" class="w-full p-2 border rounded" >
                    @error('training_information.' . $index . '.training_details') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Training Start Date*</label>
                    <input type="date" wire:model.live="training_information.{{ $index }}.training_start_date" class="w-full p-2 border rounded" >
                    @error('training_information.' . $index . '.training_start_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block">Training End Date*</label>
                    <input type="date" wire:model.live="training_information.{{ $index }}.training_end_date" class="w-full p-2 border rounded" >
                    @error('training_information.' . $index . '.training_end_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" wire:click.prevent="removeTrainingInformation({{ $index }})" class="bg-red-500 text-white px-4 py-2 rounded mt-4">Remove</button>
                </div>
            </div>
        @endforeach
        <button type="button" wire:click.prevent="addTrainingInformation()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Add Training Information</button>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Teacher</button>
    </form>
</div>
