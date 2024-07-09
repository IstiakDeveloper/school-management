<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Mousumi Biddyniketon | Admin Panel</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{asset('logo.jpg')}}">
                    <h2>Mousumi<span class="text-green-500">Admin</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Home</h3>
                </a>

                <div id="school-dropdown" class="dropdown {{ request()->is('classes', 'admissions', 'subjects.index', 'student-results.index', 'student.attendance') ? 'active' : '' }}">
                    <a href="#" id="school-toggle" class="flex items-center cursor-pointer dropdown-toggle">
                        <span class="material-icons-sharp  text-sm">
                            school
                        </span>
                        <h3 class="">School</h3>
                        <span class="material-icons-sharp   icon-rotate  text-sm {{ request()->is('classes', 'admissions', 'subjects.index', 'student-results.index', 'student.attendance') ? 'rotate-180' : '' }}">
                            expand_more
                        </span>
                    </a>
                    <div id="school-content" class="dropdown-content {{ request()->is('classes', 'admissions', 'subjects.index', 'student-results.index', 'student.attendance') ? 'active' : '' }}">
                        <a href="{{ route('classes') }}" class="block p-2 {{ request()->routeIs('classes') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('classes') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Class
                        </a>
                        <a href="{{ route('admissions') }}" class="block p-2 {{ request()->routeIs('admissions') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('admissions') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Student
                        </a>
                        <a href="{{ route('subjects.index') }}" class="block p-2 {{ request()->routeIs('subjects.index') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('subjects.index') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Subjects
                        </a>
                        <a href="{{ route('student-results.index') }}" class="block p-2 {{ request()->routeIs('student-results.index') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('student-results.index') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Results
                        </a>
                        <a href="{{ route('student.attendance') }}" class="block p-2 {{ request()->routeIs('student.attendance') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('student.attendance') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Attendance
                        </a>
                    </div>
                </div>

                <div id="websites-dropdown" class="dropdown {{ request()->is('admin.header', 'admin.hero-section', 'admin.video-section', 'smart.learn-section', 'student.review-section', 'admin.blogs') ? 'active' : '' }}">
                    <a href="#" id="websites-toggle" class="flex items-center cursor-pointer dropdown-toggle">
                        <span class="material-icons-sharp  text-sm">
                            laptop
                        </span>
                        <h3 class="">Websites</h3>
                        <span class="material-icons-sharp   icon-rotate  text-sm {{ request()->is('admin.header', 'admin.hero-section', 'admin.video-section', 'smart.learn-section', 'student.review-section', 'admin.blogs') ? 'rotate-180' : '' }}">
                            expand_more
                        </span>
                    </a>
                    <div id="websites-content" class="dropdown-content {{ request()->is('admin.header', 'admin.hero-section', 'admin.video-section', 'smart.learn-section', 'student.review-section', 'admin.blogs') ? 'active' : '' }}">
                        <a href="{{ route('admin.header') }}" class="block p-2 {{ request()->routeIs('admin.header') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('admin.header') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Header
                        </a>
                        <a href="{{ route('admin.hero-section') }}" class="block p-2 {{ request()->routeIs('admin.hero-section') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('admin.hero-section') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Hero Section
                        </a>
                        <a href="{{ route('admin.video-section') }}" class="block p-2 {{ request()->routeIs('admin.video-section') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('admin.video-section') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Video Class
                        </a>
                        <a href="{{ route('smart.learn-section') }}" class="block p-2 {{ request()->routeIs('smart.learn-section') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('smart.learn-section') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Smarter Learner
                        </a>
                        <a href="{{ route('student.review-section') }}" class="block p-2 {{ request()->routeIs('student.review-section') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('student.review-section') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Student Reviews
                        </a>
                        <a href="{{ route('admin.blogs') }}" class="block p-2 {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('admin.blogs') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Blogs
                        </a>
                    </div>
                </div>

                <div id="teacher-dropdown" class="dropdown {{ request()->is('teachers.index', 'teachers.create', 'teacher.edit') ? 'active' : '' }}">
                    <a href="#" id="teacher-toggle" class="flex items-center cursor-pointer dropdown-toggle">
                        <span class="material-icons-sharp text-sm">person</span>
                        <h3 class="">Teacher</h3>
                        <span class="material-icons-sharp icon-rotate text-sm {{ request()->is('teachers.index', 'teachers.create', 'teacher.edit') ? 'rotate-180' : '' }}">expand_more</span>
                    </a>
                    <div id="teacher-content" class="dropdown-content {{ request()->is('teachers.index', 'teachers.create', 'teacher.edit') ? 'active' : '' }}">
                        <a href="{{ route('teachers.index') }}" class="block p-2 {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
                            <span class="material-icons-sharp text-sm">
                                {{ request()->routeIs('teachers.index') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Teacher List
                        </a>
                        <a href="{{ route('teachers.create') }}" class="block p-2 {{ request()->routeIs('teachers.create') ? 'active' : '' }}">
                            <span class="material-icons-sharp text-sm">
                                {{ request()->routeIs('teachers.create') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Add Teacher
                        </a>
                    </div>
                </div>

                <div id="roles-dropdown" class="dropdown {{ request()->is('roles', 'permissions', 'users') ? 'active' : '' }}">
                    <a href="#" id="roles-toggle" class="flex items-center cursor-pointer dropdown-toggle">
                        <span class="material-icons-sharp  text-sm">
                            security
                        </span>
                        <h3 class="">Role & Permission</h3>
                        <span class="material-icons-sharp   icon-rotate  text-sm {{ request()->is('roles', 'permissions', 'users') ? 'rotate-180' : '' }}">
                            expand_more
                        </span>
                    </a>
                    <div id="roles-content" class="dropdown-content {{ request()->is('roles', 'permissions', 'users') ? 'active' : '' }}">
                        <a href="{{ route('roles') }}" class="block p-2 {{ request()->routeIs('roles') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('roles') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Roles
                        </a>
                        <a href="{{ route('permissions') }}" class="block p-2 {{ request()->routeIs('permissions') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('permissions') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Permission
                        </a>
                        <a href="{{ route('users') }}" class="block p-2 {{ request()->routeIs('users') ? 'active' : '' }}">
                            <span class="material-icons-sharp  text-sm">
                                {{ request()->routeIs('users') ? 'radio_button_checked' : 'radio_button_unchecked' }}
                            </span>
                            Assign Role
                        </a>
                    </div>
                </div>

                

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                </form>
            </div>
        </aside>


        <!-- Main Content -->
        <main>
            <div class="right-section">
                <div class="nav">
     
                    <button id="menu-btn">
                        <span class="material-icons-sharp">
                            menu
                        </span>
                    </button>
    
                    <div class="dark-mode">
                        <span class="material-icons-sharp active">
                            light_mode
                        </span>
                        <span class="material-icons-sharp">
                            dark_mode
                        </span>
                    </div>
                    @livewire('admin.top-bar')
                </div>
            </div>  
            {{ $slot }}
        </main>
        <!-- End of Main Content -->

       


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{asset('index.js')}}"></script>
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const dropdownContent = item.nextElementSibling;
                dropdownContent.classList.toggle('active');
                const icon = item.querySelector('.icon-rotate');
                icon.classList.toggle('rotate-180');
            });
        });

        // Add active-link class to the current link
        document.querySelectorAll('.sidebar a').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active-link');
                // Expand dropdown if the link is inside it
                if (link.closest('.dropdown-content')) {
                    link.closest('.dropdown-content').classList.add('active');
                    link.closest('.dropdown').querySelector('.icon-rotate').classList.add('rotate-180');
                }
            }
        });

    </script>
</body>

</html>