<div>
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200">
            <h1 class="text-2xl font-semibold mb-4">Student Admission Details</h1>
            <div class="grid grid-cols-2 gap-4">
                <!-- Student Information -->
                <div class=" p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Student Information</h2>
                    <div class="grid grid-cols-2 justify-center items-center">
                        <div>
                            <div>
                                <p class="font-semibold">Student Photo:</p>
                                @if($studentAdmission->photo)
                                    <img src="{{ asset('storage/' . $studentAdmission->photo) }}" alt="Student Photo" class="h-40 w-auto mb-4">
                                @else
                                    <span class="text-gray-400">No photo</span>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold">Student ID:</p>
                                <p>{{ $studentAdmission->student_id }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Form Number:</p>
                                <p>{{ $studentAdmission->form_number }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Name (Bangla):</p>
                                <p>{{ $studentAdmission->name_bn }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Name (English):</p>
                                <p>{{ $studentAdmission->name_en }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Birth Certificate Number:</p>
                                <p>{{ $studentAdmission->birth_certificate_number }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Birth Place (District):</p>
                                <p>{{ $studentAdmission->birth_place_district }}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <p class="font-semibold">Date of Birth:</p>
                                <p>{{ $studentAdmission->date_of_birth }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Gender:</p>
                                <p>{{ $studentAdmission->gender }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Nationality:</p>
                                <p>{{ $studentAdmission->nationality }}</p>
                            </div>
                            @if($studentAdmission->nationality == 'Others')
                            <div>
                                <p class="font-semibold">Country Name:</p>
                                <p>{{ $studentAdmission->country_name }}</p>
                            </div>
                            @endif
                            <div>
                                <p class="font-semibold">Religion:</p>
                                <p>{{ $studentAdmission->religion }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Blood Group:</p>
                                <p>{{ $studentAdmission->blood_group }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Class:</p>
                                <p>{{ $studentAdmission->schoolClass->name }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Class Role:</p>
                                <p>{{ $studentAdmission->class_role }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Class Branch:</p>
                                <p>{{ $studentAdmission->branch->name }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Minorities:</p>
                                <p>{{ $studentAdmission->minorities ? 'Yes' : 'No' }}</p>
                                @if($studentAdmission->minorities)
                                <p class="font-semibold">Minority Name:</p>
                                <p>{{ $studentAdmission->minority_name }}</p>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold">Handicap:</p>
                                <p>{{ $studentAdmission->handicap }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Parents Information -->
                <div class="p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Mother Information</h2>
                    <div>
                        <p class="font-semibold">Mother NID or DOB Certificate Number:</p>
                        <p>{{ $studentAdmission->mother_nid }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Mother Date of Birth:</p>
                        <p>{{ $studentAdmission->mother_dob }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Mother Name (Bangla):</p>
                        <p>{{ $studentAdmission->mother_name_bn }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Mother Name (English):</p>
                        <p>{{ $studentAdmission->mother_name_en }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Mother Mobile Number:</p>
                        <p>{{ $studentAdmission->mother_mobile }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Mother Occupation:</p>
                        <p>{{ $studentAdmission->mother_occupation }}</p>
                    </div>
                </div>

                <div class="p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Father Information</h2>
                    <div>
                        <p class="font-semibold">Father NID or DOB Certificate Number:</p>
                        <p>{{ $studentAdmission->father_nid }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Father Date of Birth:</p>
                        <p>{{ $studentAdmission->father_dob }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Father Name (Bangla):</p>
                        <p>{{ $studentAdmission->father_name_bn }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Father Name (English):</p>
                        <p>{{ $studentAdmission->father_name_en }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Father Mobile Number:</p>
                        <p>{{ $studentAdmission->father_mobile }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Father Occupation:</p>
                        <p>{{ $studentAdmission->father_occupation }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Is the father dead?</p>
                        <p>{{ $studentAdmission->father_dead ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
                <!-- Present Address -->
                <div class="p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Present Address</h2>
                    <div>
                        <p class="font-semibold">Division:</p>
                        <p>{{ $studentAdmission->present_address_division }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">District:</p>
                        <p>{{ $studentAdmission->present_address_district }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Upozila / Police Station:</p>
                        <p>{{ $studentAdmission->present_address_upazila }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">City Corporation / Municipality / Union:</p>
                        <p>{{ $studentAdmission->present_address_city }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Word Number:</p>
                        <p>{{ $studentAdmission->present_address_ward }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Gram / Moholla / Rastar Name / Number:</p>
                        <p>{{ $studentAdmission->present_address_village }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Basar Holding Number:</p>
                        <p>{{ $studentAdmission->present_address_house_number }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Post:</p>
                        <p>{{ $studentAdmission->present_address_post }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Post Code:</p>
                        <p>{{ $studentAdmission->present_address_post_code }}</p>
                    </div>
                </div>
                <!-- Permanent Address -->
                <div class="p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Permanent Address</h2>
                    <div>
                        <p class="font-semibold">Division:</p>
                        <p>{{ $studentAdmission->permanent_address_division }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">District:</p>
                        <p>{{ $studentAdmission->permanent_address_district }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Upozila / Police Station:</p>
                        <p>{{ $studentAdmission->permanent_address_upazila }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">City Corporation / Municipality / Union:</p>
                        <p>{{ $studentAdmission->permanent_address_city }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Word Number:</p>
                        <p>{{ $studentAdmission->permanent_address_ward }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Gram / Moholla / Rastar Name / Number:</p>
                        <p>{{ $studentAdmission->permanent_address_village }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Basar Holding Number:</p>
                        <p>{{ $studentAdmission->permanent_address_house_number }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Post:</p>
                        <p>{{ $studentAdmission->permanent_address_post }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Post Code:</p>
                        <p>{{ $studentAdmission->permanent_address_post_code }}</p>
                    </div>
                </div>
                <!-- Guardian Information -->
                <div class="p-6 rounded-lg">
                    <h2 class="text-lg font-semibold my-4 text-center p-4  border rounded-lg">Gurdian Information</h2>
                    <div>
                        <p class="font-semibold">Guardian NID or DOB Certificate Number:</p>
                        <p>{{ $studentAdmission->guardian_nid }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Guardian Date of Birth:</p>
                        <p>{{ $studentAdmission->guardian_dob }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Guardian Name (Bangla):</p>
                        <p>{{ $studentAdmission->guardian_name_bn }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Guardian Name (English):</p>
                        <p>{{ $studentAdmission->guardian_name_en }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Guardian Mobile Number:</p>
                        <p>{{ $studentAdmission->guardian_mobile }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Relationship with Guardian:</p>
                        <p>{{ $studentAdmission->guardian_relationship }}</p>
                    </div>
                    @if($studentAdmission->guardian_relationship == 'Other')
                    <div>
                        <p class="font-semibold">Name of the Relation:</p>
                        <p>{{ $studentAdmission->relation_name }}</p>
                    </div>
                    @endif
                </div>
                <!-- Agreement -->
                <div class="col-span-2 p-6 rounded-lg">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" disabled {{ $studentAdmission->information_correct ? 'checked' : '' }}>
                        <span class="ml-2">I agree with all information is correct</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
