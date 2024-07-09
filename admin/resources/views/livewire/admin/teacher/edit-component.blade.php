<div>
    <form wire:submit.prevent="updateTeacher">
        <!-- Name (Bangla) -->
        <div class="mb-4">
            <label for="name_bn" class="block">Name (Bangla)*</label>
            <input id="name_bn" type="text" wire:model.defer="name_bn" class="w-full p-2 border rounded">
            @error('name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Name (English) -->
        <div class="mb-4">
            <label for="name_en" class="block">Name (English)*</label>
            <input id="name_en" type="text" wire:model.defer="name_en" class="w-full p-2 border rounded">
            @error('name_en') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Gender -->
        <div class="mb-4">
            <label for="gender" class="block">Gender*</label>
            <select id="gender" wire:model.defer="gender" class="w-full p-2 border rounded">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Date of Birth -->
        <div class="mb-4">
            <label for="dob" class="block">Date of Birth*</label>
            <input id="dob" type="date" wire:model.defer="dob" class="w-full p-2 border rounded">
            @error('dob') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Mobile Number -->
        <div class="mb-4">
            <label for="mobile_number" class="block">Mobile Number*</label>
            <input id="mobile_number" type="text" wire:model.defer="mobile_number" class="w-full p-2 border rounded">
            @error('mobile_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input id="email" type="email" wire:model.defer="email" class="w-full p-2 border rounded">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Designation -->
        <div class="mb-4">
            <label for="designation" class="block">Designation*</label>
            <input id="designation" type="text" wire:model.defer="designation" class="w-full p-2 border rounded">
            @error('designation') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- First Joining -->
        <div class="mb-4">
            <label for="first_joining" class="block">First Joining*</label>
            <input id="first_joining" type="date" wire:model.defer="first_joining" class="w-full p-2 border rounded">
            @error('first_joining') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Job Status -->
        <div class="mb-4">
            <label for="job_status" class="block">Job Status</label>
            <input id="job_status" type="text" wire:model.defer="job_status" class="w-full p-2 border rounded">
            @error('job_status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- PIN Number -->
        <div class="mb-4">
            <label for="pin_number" class="block">PIN Number*</label>
            <input id="pin_number" type="text" wire:model.defer="pin_number" class="w-full p-2 border rounded">
            @error('pin_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Nationality -->
        <div class="mb-4">
            <label for="nationality" class="block">Nationality</label>
            <input id="nationality" type="text" wire:model.defer="nationality" class="w-full p-2 border rounded">
            @error('nationality') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Religion -->
        <div class="mb-4">
            <label for="religion" class="block">Religion</label>
            <input id="religion" type="text" wire:model.defer="religion" class="w-full p-2 border rounded">
            @error('religion') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Blood Group -->
        <div class="mb-4">
            <label for="blood_group" class="block">Blood Group</label>
            <input id="blood_group" type="text" wire:model.defer="blood_group" class="w-full p-2 border rounded">
            @error('blood_group') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Signature -->
        <div>  
            <label class="block">Signature</label>
            <input type="file" wire:model.live="signature" class="w-full p-2 border rounded">
            @error('signature') <span class="text-red-500">{{ $message }}</span> @enderror
            
            @if ($signature)
            <img src="{{ Storage::url($teacher->signature) }}" alt="Signature" class="mt-2 w-32 h-32 rounded">
            @elseif ($teacher->signature)
                <img src="{{ $signature->temporaryUrl() }}" alt="Signature Preview" class="mt-2 w-32 h-32 rounded">
            @endif
        </div>

        <!-- Present Address -->
        <div class="mb-4">
            <label class="block">Present Address*</label>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="present_division" class="block">Division*</label>
                    <input id="present_division" type="text" wire:model.defer="present_address['division']" class="w-full p-2 border rounded">
                    @error('present_address.division') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_district" class="block">District*</label>
                    <input id="present_district" type="text" wire:model.defer="present_address['district']" class="w-full p-2 border rounded">
                    @error('present_address.district') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_upazila" class="block">Upazila*</label>
                    <input id="present_upazila" type="text" wire:model.defer="present_address['upazila']" class="w-full p-2 border rounded">
                    @error('present_address.upazila') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_union" class="block">Union/Word</label>
                    <input id="present_union" type="text" wire:model.defer="present_address['union']" class="w-full p-2 border rounded">
                    @error('present_address.union') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_post_office" class="block">Post Office</label>
                    <input id="present_post_office" type="text" wire:model.defer="present_address['post_office']" class="w-full p-2 border rounded">
                    @error('present_address.post_office') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_postal_code" class="block">Postal Code</label>
                    <input id="present_postal_code" type="text" wire:model.defer="present_address['postal_code']" class="w-full p-2 border rounded">
                    @error('present_address.postal_code') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="present_address_detail" class="block">Address Detail*</label>
                    <textarea id="present_address_detail" wire:model.defer="present_address['address_detail']" class="w-full p-2 border rounded"></textarea>
                    @error('present_address.address_detail') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Permanent Address -->
        <div class="mb-4">
            <label class="block">Permanent Address*</label>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="permanent_division" class="block">Division*</label>
                    <input id="permanent_division" type="text" wire:model.defer="permanent_address['division']" class="w-full p-2 border rounded">
                    @error('permanent_address.division') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_district" class="block">District*</label>
                    <input id="permanent_district" type="text" wire:model.defer="permanent_address['district']" class="w-full p-2 border rounded">
                    @error('permanent_address.district') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_upazila" class="block">Upazila*</label>
                    <input id="permanent_upazila" type="text" wire:model.defer="permanent_address['upazila']" class="w-full p-2 border rounded">
                    @error('permanent_address.upazila') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_union" class="block">Union/Word</label>
                    <input id="permanent_union" type="text" wire:model.defer="permanent_address['union']" class="w-full p-2 border rounded">
                    @error('permanent_address.union') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_post_office" class="block">Post Office</label>
                    <input id="permanent_post_office" type="text" wire:model.defer="permanent_address['post_office']" class="w-full p-2 border rounded">
                    @error('permanent_address.post_office') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_postal_code" class="block">Postal Code</label>
                    <input id="permanent_postal_code" type="text" wire:model.defer="permanent_address['postal_code']" class="w-full p-2 border rounded">
                    @error('permanent_address.postal_code') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="permanent_address_detail" class="block">Address Detail*</label>
                    <textarea id="permanent_address_detail" wire:model.defer="permanent_address['address_detail']" class="w-full p-2 border rounded"></textarea>
                    @error('permanent_address.address_detail') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Subjects of Teaching -->
        <div class="mb-4">
            <label class="block mb-2">Subjects*</label>
            <div class="flex flex-wrap gap-2">
                @foreach(['ইংরেজি', 'গণিত', 'প্রাথমিক বিজ্ঞান', 'বাংলাদেশ ও বিশ্বপরিচয়', 'ইসলাম ধর্ম ও নৈতিক শিক্ষা', 'হিন্দুধর্ম ও নৈতিক শিক্ষা'] as $subject)
                <label class="inline-flex items-center">
                    <input type="checkbox" value="{{ $subject }}" wire:model.live="subjects_of_teaching" class="form-checkbox h-5 w-5 text-green-600">
                    <span class="ml-2">{{ $subject }}</span>
                </label>
                @endforeach
            </div>
            @error('subjects_of_teaching') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Educations -->
        <div class="mb-4">
            <label class="block">Educations</label>
            @foreach ($educations as $index => $education)
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="education_degree_{{ $index }}" class="block">Degree*</label>
                        <input id="education_degree_{{ $index }}" type="text" wire:model.defer="educations.{{ $index }}.degree" class="w-full p-2 border rounded">
                        @error('educations.'.$index.'.degree') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="education_subject_{{ $index }}" class="block">Subject*</label>
                        <input id="education_subject_{{ $index }}" type="text" wire:model.defer="educations.{{ $index }}.subject" class="w-full p-2 border rounded">
                        @error('educations.'.$index.'.subject') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="education_board_{{ $index }}" class="block">Board*</label>
                        <input id="education_board_{{ $index }}" type="text" wire:model.defer="educations.{{ $index }}.board" class="w-full p-2 border rounded">
                        @error('educations.'.$index.'.board') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="education_passing_year_{{ $index }}" class="block">Passing Year*</label>
                        <input id="education_passing_year_{{ $index }}" type="text" wire:model.defer="educations.{{ $index }}.passing_year" class="w-full p-2 border rounded">
                        @error('educations.'.$index.'.passing_year') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="education_grade_{{ $index }}" class="block">Grade</label>
                        <input id="education_grade_{{ $index }}" type="text" wire:model.defer="educations.{{ $index }}.grade" class="w-full p-2 border rounded">
                        @error('educations.'.$index.'.grade') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endforeach
            <button wire:click.prevent="addEducation" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Education</button>
        </div>

        <!-- Trainings -->
        <div class="mb-4">
            <label class="block">Trainings</label>
            @foreach ($trainings as $index => $training)
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="training_details_{{ $index }}" class="block">Training Details*</label>
                        <input id="training_details_{{ $index }}" type="text" wire:model.defer="trainings.{{ $index }}.training_details" class="w-full p-2 border rounded">
                        @error('trainings.'.$index.'.training_details') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="training_start_date_{{ $index }}" class="block">Training Start Date*</label>
                        <input id="training_start_date_{{ $index }}" type="date" wire:model.defer="trainings.{{ $index }}.start_date" class="w-full p-2 border rounded">
                        @error('trainings.'.$index.'.start_date') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="training_end_date_{{ $index }}" class="block">Training End Date*</label>
                        <input id="training_end_date_{{ $index }}" type="date" wire:model.defer="trainings.{{ $index }}.end_date" class="w-full p-2 border rounded">
                        @error('trainings.'.$index.'.end_date') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endforeach
            <button wire:click.prevent="addTraining" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Training</button>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Teacher</button>
        </div>
    </form>
</div>
