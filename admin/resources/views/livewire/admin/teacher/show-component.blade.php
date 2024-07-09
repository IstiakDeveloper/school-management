<!-- resources/views/livewire/user/teacher/show-component.blade.php -->

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">{{ $teacher->name_en }}</h2>
    </div>

    <!-- Profile Information Section -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Profile Information</h3>

            


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @if ($teacher->photo)
                <img src="{{ Storage::url($teacher->photo) }}" alt="Teacher Photo" class="w-32 h-32 rounded-full">
            @endif
            <div>
                <p><span class="font-semibold">Name (Bangla):</span> {{ $teacher->name_bn }}</p>
                <p><span class="font-semibold">Gender:</span> {{ $teacher->gender }}</p>
                <p><span class="font-semibold">Date of Birth:</span> {{ $teacher->dob }}</p>
                <p><span class="font-semibold">Mobile Number:</span> {{ $teacher->mobile_number }}</p>
                <p><span class="font-semibold">Email:</span> {{ $teacher->email }}</p>
                <p><span class="font-semibold">Designation:</span> {{ $teacher->designation }}</p>
                <p><span class="font-semibold">First Joining:</span> {{ $teacher->first_joining }}</p>
                <p><span class="font-semibold">Job Status:</span> {{ $teacher->job_status }}</p>
                <p><span class="font-semibold">PIN Number:</span> {{ $teacher->pin_number }}</p>
            </div>
            <div>
                <p><span class="font-semibold">Nationality:</span> {{ $teacher->nationality }}</p>
                <p><span class="font-semibold">Religion:</span> {{ $teacher->religion }}</p>
                <p><span class="font-semibold">Blood Group:</span> {{ $teacher->blood_group }}</p>
            </div>
        </div>
    </div>

    <!-- Address Information Section -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Address Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p><span class="font-semibold">Present Address:</span></p>
                <p>{{ $teacher->present_address }}</p>
                <p>{{ $teacher->present_division }}, {{ $teacher->present_district }}, {{ $teacher->present_upazila }}</p>
                <p>{{ $teacher->present_union }}, {{ $teacher->present_post_office }}, {{ $teacher->present_postal_code }}</p>
            </div>
            <div>
                <p><span class="font-semibold">Permanent Address:</span></p>
                <p>{{ $teacher->permanent_address }}</p>
                <p>{{ $teacher->permanent_division }}, {{ $teacher->permanent_district }}, {{ $teacher->permanent_upazila }}</p>
                <p>{{ $teacher->permanent_union }}, {{ $teacher->permanent_post_office }}, {{ $teacher->permanent_postal_code }}</p>
            </div>
        </div>
    </div>

    <!-- Subjects of Teaching Section -->
    <div class="mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Subjects of Teaching</h3>
        <div class="flex flex-wrap gap-2">
            @foreach ($teacher->subjects_of_teaching as $subject)
                <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $subject }}</span>
            @endforeach
        </div>
    </div>

    <!-- Educational Qualifications Section -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Educational Qualifications</h3>
        <div>
            @foreach ($teacher->educations as $education)
                <div class="mb-2">
                    <p><span class="font-semibold">Degree:</span> {{ $education->degree }}</p>
                    <p><span class="font-semibold">Subject:</span> {{ $education->subject }}</p>
                    <p><span class="font-semibold">Board:</span> {{ $education->board }}</p>
                    <p><span class="font-semibold">Passing Year:</span> {{ $education->passing_year }}</p>
                    <p><span class="font-semibold">Grade:</span> {{ $education->grade }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Training Information Section -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Training Information</h3>
        <div>
            @foreach ($teacher->trainings as $training)
                <div class="mb-2">
                    <p><span class="font-semibold">Training Details:</span> {{ $training->training_details }}</p>
                    <p><span class="font-semibold">Start Date:</span> {{ $training->training_start_date }}</p>
                    <p><span class="font-semibold">End Date:</span> {{ $training->training_end_date }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Signature Section -->
    <div class="mb-6">
        <h3 class="text-lg font-bold mb-2 text-gray-700">Signature</h3>
        <div>
            @if ($teacher->signature)
                <img src="{{ asset('storage/' . $teacher->signature) }}" alt="Teacher Signature" class="w-48 h-auto">
            @else
                <p>No signature uploaded</p>
            @endif
        </div>
    </div>

    <!-- Additional Sections: Add as needed -->

</div>
