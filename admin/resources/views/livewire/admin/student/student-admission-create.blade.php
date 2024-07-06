<div>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Create Student Admission</h2>
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h2 class="text-lg font-semibold my-4 text-center p-4 bg-gray-100 rounded-lg">Student Information</h2>
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">1. Photo<span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="photo" type="file" id="photo" name="photo" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="student_id" class="block text-sm font-medium text-gray-700">2. Student ID<span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="student_id" type="text" id="student_id" name="student_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('student_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="form_number" class="block text-sm font-medium text-gray-700">3. Form Number <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="form_number" type="text" id="form_number" name="form_number" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('form_number') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="school_class_id" class="block text-sm font-medium text-gray-700">4. School Class <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="school_class_id" id="school_class_id" name="school_class_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('school_class_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Branch -->
                    <div class="mb-4">
                        <label for="branch_id" class="block text-sm font-medium text-gray-700">5. Branch <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="branch_id" id="branch_id" name="branch_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @error('branch_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name (Bangla) -->
                    <div class="mb-4">
                        <label for="name_bn" class="block text-sm font-medium text-gray-700">6. Name (Bangla) <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="name_bn" type="text" id="name_bn" name="name_bn" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name (English) -->
                    <div class="mb-4">
                        <label for="name_en" class="block text-sm font-medium text-gray-700">7. Name (English) <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="name_en" type="text" id="name_en" name="name_en" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('name_en') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Birth Certificate Number -->
                    <div class="mb-4">
                        <label for="birth_certificate_number" class="block text-sm font-medium text-gray-700">8. Birth Certificate Number <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="birth_certificate_number" type="text" id="birth_certificate_number" name="birth_certificate_number" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('birth_certificate_number') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Birth Place District -->
                    <div class="mb-4">
                        <label for="birth_place_district" class="block text-sm font-medium text-gray-700">9. Birth Place District (According to birth certifiacate)</label>
                        <input wire:model.live="birth_place_district" type="text" id="birth_place_district" name="birth_place_district" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('birth_place_district') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">9. Date of Birth <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="date_of_birth" type="date" id="date_of_birth" name="date_of_birth" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Gender -->
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">10. Gender <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="gender" id="gender" name="gender" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Nationality -->
                    <div class="mb-4">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">11. Nationality <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="nationality" id="nationality" name="nationality" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Nationality</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Others">Others</option>
                        </select>
                        @error('nationality') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Religion -->
                    <div class="mb-4">
                        <label for="religion" class="block text-sm font-medium text-gray-700">12. Religion <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="religion" id="religion" name="religion" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Christian">Christian</option>
                        </select>
                        @error('religion') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <!-- Blood Group -->
                    <div class="mb-4">
                        <label for="blood_group" class="block text-sm font-medium text-gray-700">13. Blood Group</label>
                        <select wire:model.live="blood_group" id="blood_group" name="blood_group" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Blood Group</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        @error('blood_group') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Class Role -->
                    <div class="mb-4">
                        <label for="class_role" class="block text-sm font-medium text-gray-700">14. Class Role <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="class_role" type="number" id="class_role" name="class_role" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('class_role') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Minorities -->
                    <div class="mb-4">
                        <span class="block text-sm font-medium text-gray-700">15. Minorities <span class="text-red-500 font-bold text-lg">*</span></span>
                        <div class="mt-1">
                            <label class="inline-flex items-center">
                                <input wire:model.live="minorities" wire:click="toggleMinorityNameVisibility(true)" type="radio" value="1" class="form-radio" name="minorities">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input wire:model.live="minorities" wire:click="toggleMinorityNameVisibility(false)" type="radio" value="0" class="form-radio" name="minorities">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                        @error('minorities') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    @if($showMinorityName)
                        <!-- Minority Name -->
                        <div class="mb-4">
                            <label for="minority_name" class="block text-sm font-medium text-gray-700">15-1. Minority Name</label>
                            <input wire:model.live="minority_name" type="text" id="minority_name" name="minority_name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            @error('minority_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    @endif


                    <!-- Handicap -->
                    <div class="mb-4">
                        <label for="handicap" class="block text-sm font-medium text-gray-700">16. Handicap (If Handicap)</label>
                        <select wire:model.live="handicap" id="handicap" name="handicap" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Handicap</option>
                            <option value="Speech impaired">Speech impaired</option>
                            <option value="Visually impaired">Visually impaired</option>
                            <option value="Hearing impaired">Hearing impaired</option>
                            <option value="Physically handicapped">Physically handicapped</option>
                            <option value="Mentally retarded">Mentally retarded</option>
                        </select>
                        @error('handicap') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <h2 class="text-lg font-semibold my-4 text-center p-4 bg-gray-100 rounded-lg">Parents Information</h2>

                    <hr class="w-full h-2">
                    <!-- Mother Information -->
                    <h4 class="font-bold mb-2">17. Mother Information (Acording to NID)</h4>
                    <div class="mb-4">
                        <label for="mother_nid" class="block text-sm font-medium text-gray-700">1. Mother NID / Birth Certificate</label>
                        <input wire:model.live="mother_nid" type="text" id="mother_nid" name="mother_nid" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_nid') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_dob" class="block text-sm font-medium text-gray-700">2. Mother Date of Birth</label>
                        <input wire:model.live="mother_dob" type="date" id="mother_dob" name="mother_dob" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_dob') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_name_bn" class="block text-sm font-medium text-gray-700">3. Mother Name (Bangla)</label>
                        <input wire:model.live="mother_name_bn" type="text" id="mother_name_bn" name="mother_name_bn" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_name_en" class="block text-sm font-medium text-gray-700">4. Mother Name (English)</label>
                        <input wire:model.live="mother_name_en" type="text" id="mother_name_en" name="mother_name_en" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_name_en') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_mobile" class="block text-sm font-medium text-gray-700">5. Mother Mobile Number <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="mother_mobile" type="text" id="mother_mobile" name="mother_mobile" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_mobile') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_occupation" class="block text-sm font-medium text-gray-700">6. Mother Occupation</label>
                        <input wire:model.live="mother_occupation" type="text" id="mother_occupation" name="mother_occupation" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('mother_occupation') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mother_dead" class="block text-sm font-medium text-gray-700">7. Mother Dead or Not <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="mother_dead" id="mother_dead" name="mother_dead" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('mother_dead') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <hr class="w-full h-2">

                    <!-- Father Information -->
                    <h4 class="font-bold mb-2">18. Fother Information (Acording to NID)</h4>
                    <div class="mb-4">
                        <label for="father_nid" class="block text-sm font-medium text-gray-700">1. Father NID / Birth Certificate</label>
                        <input wire:model.live="father_nid" type="text" id="father_nid" name="father_nid" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_nid') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_dob" class="block text-sm font-medium text-gray-700">2. Father Date of Birth</label>
                        <input wire:model.live="father_dob" type="date" id="father_dob" name="father_dob" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_dob') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_name_bn" class="block text-sm font-medium text-gray-700">3. Father Name (Bangla)</label>
                        <input wire:model.live="father_name_bn" type="text" id="father_name_bn" name="father_name_bn" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_name_en" class="block text-sm font-medium text-gray-700">4. Father Name (English)</label>
                        <input wire:model.live="father_name_en" type="text" id="father_name_en" name="father_name_en" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_name_en') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_mobile" class="block text-sm font-medium text-gray-700">5. Father Mobile Number</label>
                        <input wire:model.live="father_mobile" type="text" id="father_mobile" name="father_mobile" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_mobile') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_occupation" class="block text-sm font-medium text-gray-700">6. Father Occupation</label>
                        <input wire:model.live="father_occupation" type="text" id="father_occupation" name="father_occupation" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('father_occupation') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="father_dead" class="block text-sm font-medium text-gray-700">7. Father Dead or Not <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="father_dead" id="father_dead" name="father_dead" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option >Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('father_dead') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <hr class="w-full h-2">

                    <h4 class="font-bold mb-2">19. Present Address</h4>

                    <div class="mb-4">
                        <label for="present_address_division" class="block text-sm font-medium text-gray-700">(i) Division <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="selectedDivision" id="present_address_division" name="present_address_division" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Division</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division }}">{{ $division }}</option>
                            @endforeach
                        </select>
                        @error('present_address_division') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="present_address_district" class="block text-sm font-medium text-gray-700">(ii) District <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="selectedDistrict" id="present_address_district" name="present_address_district" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        </select>
                        @error('present_address_district') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="present_address_upazila" class="block text-sm font-medium text-gray-700">(iii) Upazila / Thana <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="selectedUpazila" id="present_address_upazila" name="present_address_upazila" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Upazila / Thana</option>
                            @foreach ($upazilas as $upazila)
                                <option value="{{ $upazila }}">{{ $upazila }}</option>
                            @endforeach
                        </select>
                        @error('present_address_upazila') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="mb-4">
                        <label for="present_address_city" class="block text-sm font-medium text-gray-700">(iv) City Corporation/ Pourosova/ Union/ Cantonment Board <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="present_address_city" type="text" id="present_address_city" name="present_address_city" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_city') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Present Address Ward -->
                    <div class="mb-4">
                        <label for="present_address_ward" class="block text-sm font-medium text-gray-700">(v) Word Number <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="present_address_ward" type="text" id="present_address_ward" name="present_address_ward" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_ward') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Present Address Village -->
                    <div class="mb-4">
                        <label for="present_address_village" class="block text-sm font-medium text-gray-700">(vi) Village/ Moholla/ Road Name & Number</label>
                        <input wire:model.live="present_address_village" type="text" id="present_address_village" name="present_address_village" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_village') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Present Address House Number -->
                    <div class="mb-4">
                        <label for="present_address_house_number" class="block text-sm font-medium text-gray-700">(vii) House Holding Number</label>
                        <input wire:model.live="present_address_house_number" type="text" id="present_address_house_number" name="present_address_house_number" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_house_number') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Present Address Post -->
                    <div class="mb-4">
                        <label for="present_address_post" class="block text-sm font-medium text-gray-700">(viii) Post</label>
                        <input wire:model.live="present_address_post" type="text" id="present_address_post" name="present_address_post" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_post') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Present Address Post Code -->
                    <div class="mb-4">
                        <label for="present_address_post_code" class="block text-sm font-medium text-gray-700">(ix) Post Code <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="present_address_post_code" type="text" id="present_address_post_code" name="present_address_post_code" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('present_address_post_code') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address Section -->
                    <h4 class="font-bold mb-2">20. Permanent Address</h4>
                    <div class="mb-4">
                        <input wire:model.live="same_as_present" type="checkbox" id="same_as_present" name="same_as_present" class="mr-2">
                        <label for="same_as_present" class="text-sm font-medium text-gray-700">Same as Present Address</label>
                    </div>

                    <!-- Permanent Address Division -->
                    <div class="mb-4">
                        <label for="permanent_address_division" class="block text-sm font-medium text-gray-700">(i) Division <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="permanent_address_division" id="permanent_address_division" name="permanent_address_division" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Division</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division }}">{{ $division }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- District Selection -->
                    <div class="mb-4">
                        <label for="permanent_address_district" class="block text-sm font-medium text-gray-700">(ii) District <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="permanent_address_district" id="permanent_address_district" name="permanent_address_district" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Upazila Selection -->
                    <div class="mb-4">
                        <label for="permanent_address_upazila" class="block text-sm font-medium text-gray-700">(iii) Upazila / Thana <span class="text-red-500 font-bold text-lg">*</span></label>
                        <select wire:model.live="permanent_address_upazila" id="permanent_address_upazila" name="permanent_address_upazila" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Upazila / Thana</option>
                            @foreach ($upazilas as $upazila)
                                <option value="{{ $upazila }}">{{ $upazila }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="permanent_address_city" class="block text-sm font-medium text-gray-700">(iv) City Corporation/ Pourosova/ Union/ Cantonment Board <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="permanent_address_city" type="text" id="permanent_address_city" name="permanent_address_city" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_city') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address Ward -->
                    <div class="mb-4">
                        <label for="permanent_address_ward" class="block text-sm font-medium text-gray-700">(v) Word Number <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="permanent_address_ward" type="text" id="permanent_address_ward" name="permanent_address_ward" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_ward') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address Village -->
                    <div class="mb-4">
                        <label for="permanent_address_village" class="block text-sm font-medium text-gray-700">(vi) Village/ Moholla/ Road Name & Number</label>
                        <input wire:model.live="permanent_address_village" type="text" id="permanent_address_village" name="permanent_address_village" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_village') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address House Number -->
                    <div class="mb-4">
                        <label for="permanent_address_house_number" class="block text-sm font-medium text-gray-700">(vii) House Holding Number</label>
                        <input wire:model.live="permanent_address_house_number" type="text" id="permanent_address_house_number" name="permanent_address_house_number" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_house_number') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address Post -->
                    <div class="mb-4">
                        <label for="permanent_address_post" class="block text-sm font-medium text-gray-700">(viii) Post</label>
                        <input wire:model.live="permanent_address_post" type="text" id="permanent_address_post" name="permanent_address_post" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_post') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Permanent Address Post Code -->
                    <div class="mb-4">
                        <label for="permanent_address_post_code" class="block text-sm font-medium text-gray-700">(ix) Post Code <span class="text-red-500 font-bold text-lg">*</span></label>
                        <input wire:model.live="permanent_address_post_code" type="text" id="permanent_address_post_code" name="permanent_address_post_code" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('permanent_address_post_code') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <hr class="w-full h-2">

                    <h4 class="font-bold mb-2">21. Gurdian (In the absence of parents)</h4>
                    <!-- Guardian NID -->
                    <div class="mb-4">
                        <label for="guardian_nid" class="block text-sm font-medium text-gray-700">1. Guardian NID</label>
                        <input wire:model.live="guardian_nid" type="text" id="guardian_nid" name="guardian_nid" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('guardian_nid') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <!-- Guardian DOB -->
                    <div class="mb-4">
                        <label for="guardian_dob" class="block text-sm font-medium text-gray-700">2. Guardian DOB</label>
                        <input wire:model.live="guardian_dob" type="date" id="guardian_dob" name="guardian_dob" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('guardian_dob') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="guardian_name_bn" class="block text-sm font-medium text-gray-700">3. Guardian Name (Bangla)</label>
                        <input wire:model.live="guardian_name_bn" type="text" id="guardian_name_bn" name="guardian_name_bn" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('guardian_name_bn') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <!-- Guardian Name (English) -->
                    <div class="mb-4">
                        <label for="guardian_name_en" class="block text-sm font-medium text-gray-700">4. Guardian Name (English)</label>
                        <input wire:model.live="guardian_name_en" type="text" id="guardian_name_en" name="guardian_name_en" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('guardian_name_en') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <!-- Guardian Mobile -->
                    <div class="mb-4">
                        <label for="guardian_mobile" class="block text-sm font-medium text-gray-700">5. Guardian Mobile</label>
                        <input wire:model.live="guardian_mobile" type="text" id="guardian_mobile" name="guardian_mobile" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        @error('guardian_mobile') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="guardian_relationship" class="block text-sm font-medium text-gray-700">6. Guardian Relationship</label>
                        <select wire:model.live="guardian_relationship" id="guardian_relationship" name="guardian_relationship" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            <option value="">Select Relationship</option>
                            <option value="Grand Father">Grand Father</option>
                            <option value="Grand Mother">Grand Mother</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Aunty">Aunty</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('guardian_relationship') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <!-- Information Correct -->
                    <div class="mb-4 flex">
                        <input wire:model.live="information_correct" type="checkbox" id="information_correct" name="information_correct" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mr-2">
                        <label for="information_correct" class="block text-sm font-medium text-gray-700">I agree that all information provided is correct. <span class="text-red-500 font-bold text-lg">*</span></label>
                        @error('information_correct') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-span-2 flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
