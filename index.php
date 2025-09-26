<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYIZA Landry MPAYIMANA</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- IconScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Font Awesome for Dark Mode Toggle -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="photos/mine.jpg" type="image/x-icon">

    <script>
    // Basic configuration for Tailwind CSS dark mode
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
    </script>
    <style>
    /* Custom styles for active nav link and dark mode transition */
    .active-link {
        position: relative;
        color: #db6a00;
        font-weight: 600;
    }

    .active-link .circle {
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 8px;
        height: 8px;
        background-color: #db6a00;
        border-radius: 50%;
    }

    /* Smooth transition for dark mode */
    body,
    .bg-white,
    .bg-gray-100,
    .bg-gray-800,
    .bg-gray-900,
    .text-gray-800,
    .text-gray-200 {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    </style>
</head>

<body class="font-sans bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    <!-- Container -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- -- Navigation Section -- -->
        <nav id="header"
            class="fixed top-0 left-0 right-0 z-50 bg-gray-100/80 dark:bg-gray-900/80 backdrop-blur-sm shadow-md">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
                <div class="nav-logo">
                    <a href="#" class="text-2xl font-bold text-gray-900 dark:text-white">Landry<span
                            class="text-orange-600">.</span></a>
                </div>

                <div class="nav-menu hidden lg:flex items-center" id="myNavMenu">
                    <ul class="flex space-x-8">
                        <li><a href="#home" class="nav-link active-link">Home<div class="circle"></div></a></li>
                        <li><a href="#about" class="nav-link hover:text-orange-600 transition-colors">About<div
                                    class="circle hidden"></div></a></li>
                        <li><a href="#projects" class="nav-link hover:text-orange-600 transition-colors">Projects<div
                                    class="circle hidden"></div></a></li>
                        <li><a href="#Certificates" class="nav-link hover:text-orange-600 transition-colors">Credentials
                                <div class="circle hidden"></div>
                            </a></li>
                        <!-- <li><a href="#" class="nav-link hover:text-orange-600 transition-colors"
                                onclick="confirmRedirect(event)">SkillUp<div class="circle hidden"></div></a></li> -->

                        <li><a href="#contact" class="nav-link hover:text-orange-600 transition-colors">Contact<div
                                    class="circle hidden"></div></a></li>
                    </ul>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="hidden sm:block">
                        <button
                            class="bg-orange-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-orange-700 transition-colors"
                            onclick="confirmViewCV()">Download CV <i class="uil uil-file-alt"></i></button>
                    </div>

                    <!-- Dark Mode Toggle -->
                    <div class="mode cursor-pointer" id="toggle-switch">
                        <i class="fa fa-moon text-xl text-gray-800 dark:hidden" id="moon"></i>
                        <i class="fa fa-sun text-xl text-yellow-400 hidden dark:inline" id="sun"></i>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="lg:hidden">
                        <i class="uil uil-bars text-2xl cursor-pointer" onclick="myMenuFunction()"></i>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="lg:hidden hidden" id="mobileNavMenu">
                <ul class="flex flex-col items-center py-4 space-y-4 bg-gray-200 dark:bg-gray-800">
                    <li><a href="#home" class="nav-link active-link" onclick="myMenuFunction()">Home<div class="circle">
                            </div></a></li>
                    <li><a href="#about" class="nav-link hover:text-orange-600 transition-colors"
                            onclick="myMenuFunction()">About<div class="circle hidden"></div></a></li>
                    <li><a href="#projects" class="nav-link hover:text-orange-600 transition-colors"
                            onclick="myMenuFunction()">Projects<div class="circle hidden"></div></a></li>
                    <li><a href="#Certificates" class="nav-link hover:text-orange-600 transition-colors"
                            onclick="myMenuFunction()">Credentials<div class="circle hidden"></div></a></li>
                    <li><a href="#" class="nav-link hover:text-orange-600 transition-colors"
                            onclick="confirmRedirect(event); myMenuFunction();">SkillUp<div class="circle hidden"></div>
                        </a></li>
                    <li><a href="#contact" class="nav-link hover:text-orange-600 transition-colors"
                            onclick="myMenuFunction()">Contact<div class="circle hidden"></div></a></li>
                </ul>
            </div>
        </nav>

        <!-- -- Main Content -- -->
        <main class="pt-24">

            <!-- -- Hero Section -- -->
            <section class="min-h-screen flex items-center" id="home">
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div class="text-center lg:text-left">
                        <span class="font-bold text-lg text-orange-600">MPAYIMANA CYIZA Landry</span>
                        <h1 class="text-4xl md:text-5xl font-extrabold my-4 text-gray-900 dark:text-white">I'm <span
                                class="typedText text-orange-600"></span></h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300">

                            I develop intelligent solutions that simplify processes, solve real-world problems, and
                            drive meaningful progress for clients, students, and organizations.
                        </p>
                        <div class="mt-8 flex justify-center lg:justify-start gap-4">
                            <button
                                class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition-colors"
                                onclick="location.href='#contact'">Hire Me</button>
                            <button
                                class="bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-orange-700 transition-colors"
                                onclick="confirmViewCV()">Download CV <i class="uil uil-file-alt"></i></button>
                        </div>
                        <div class="mt-8 flex justify-center lg:justify-start space-x-6">
                            <a href="https://www.instagram.com/landry_cyiza/" class="text-2xl hover:text-orange-600"><i
                                    class="uil uil-instagram"></i></a>
                            <a href="www.linkedin.com/in/landry-cyiza-mpayimana-595a85262"
                                class="text-2xl hover:text-orange-600"><i class="uil uil-linkedin-alt"></i></a>
                            <a href="https://x.com/cyizalandry" class="text-2xl hover:text-orange-600"><i
                                    class="uil uil-twitter"></i></a>
                            <a href="https://github.com/CyizaLandry5" class="text-2xl hover:text-orange-600"><i
                                    class="uil uil-github-alt"></i></a>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div
                            class="w-72 h-72 md:w-96 md:h-96 rounded-full overflow-hidden shadow-2xl border-8 border-white dark:border-gray-700">
                            <img src="photos/mine.jpg" alt="avatar" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </section>

            <!-- -- About Section -- -->
            <section class="py-20" id="about">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">About Me and Key Skills</h1>
                </div>
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Who I Am</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            I am <strong>Cyiza Landry Mpayimana</strong>, an IT Trainer, Software Engineer, and
                            Innovator.
                            I enjoy helping students by combining advanced technology with practical learning while
                            creating
                            solutions that make a real difference.
                        </p>

                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mt-4">
                            I hold an <strong>Advanced Diploma in Information Technology</strong> from
                            <a href="https://www.iprctumba.rp.ac.rw/"
                                class="text-blue-600 hover:underline dark:text-blue-400">IPRC TUMBA</a>,
                            and I am currently pursuing my <strong>Bachelor of Science in IT</strong> at the
                            <a href="https://uok.ac.rw"
                                class="text-blue-600 hover:underline dark:text-blue-400">University of Kigali</a>.
                            My journey is about turning challenges into practical applications and supporting growth
                            in the tech community.
                        </p>

                        <div class="mt-6">
                            <button
                                class="bg-orange-600 text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:bg-orange-700 transition-colors">MORE
                                ABOUT ME <i class="uil uil-import"></i></button>
                        </div>
                    </div>
                    <div class="space-y-8">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
                            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Software Development</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="skill-tag">Python</span><span class="skill-tag">API Development</span><span
                                    class="skill-tag">HTML & CSS</span><span class="skill-tag">JavaScript</span><span
                                    class="skill-tag">PHP</span><span class="skill-tag">JAVA</span><span
                                    class="skill-tag">Django</span><span class="skill-tag">Laravel</span><span
                                    class="skill-tag">Mobile App Development</span><span class="skill-tag">Full-Stack
                                    Web Development</span>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
                            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">IT Infrastructure &
                                Security</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="skill-tag">Network Security</span><span
                                    class="skill-tag">Cybersecurity</span><span class="skill-tag">Windows Server
                                    Admin</span><span class="skill-tag">Linux System Admin</span><span
                                    class="skill-tag">Cloud Computing</span><span class="skill-tag">Ethical
                                    Hacking</span>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
                            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Emerging Tech & Data</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="skill-tag">Machine Learning</span><span class="skill-tag">AI</span><span
                                    class="skill-tag">IoT</span><span class="skill-tag">Data Analysis</span><span
                                    class="skill-tag">Database Admin</span><span class="skill-tag">SQL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- -- Project Section -- -->
            <section class="py-20" id="projects">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Projects</h1>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl text-center transform hover:scale-105 transition-transform">
                        <i class="uil uil-briefcase-alt text-5xl text-orange-600 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Completed</h3>
                        <p class="text-3xl font-semibold mt-2"><?php $projects = 308; echo"$projects"; ?>+</p>
                        <label class="text-gray-500 dark:text-gray-400">Finished Projects</label>
                    </div>
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl text-center transform hover:scale-105 transition-transform">
                        <i class="uil uil-users-alt text-5xl text-orange-600 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Clients</h3>
                        <p class="text-3xl font-semibold mt-2"><?php $clients = 450; echo"$clients"; ?>+</p>
                        <label class="text-gray-500 dark:text-gray-400">Happy Clients</label>
                    </div>
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl text-center transform hover:scale-105 transition-transform">
                        <i class="uil uil-award text-5xl text-orange-600 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Experience</h3>
                        <p class="text-3xl font-semibold mt-2"><?php $experience = 3; echo"$experience"; ?>+</p>
                        <label class="text-gray-500 dark:text-gray-400">Years in the field</label>
                    </div>
                </div>
            </section>

            <!-- -- Certificates Section -- -->
            <section class="py-20" id="Certificates">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Some of my Credentials</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">Professional credentials in Programming,
                        Networking, Soft Skills and more.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <!-- Certificate Items -->
                    <?php
                    $certificates = [
                        ["img" => "photos/certificates/Linux_Essentials.jpg", "title" => "Linux Essentials", "desc" => "From University of Kigali and NDG."],
                        ["img" => "photos/certificates/Programming_Essentials_in_Python_certificate.jpg", "title" => "Python Programming Essentials", "desc" => "From Python Institute and OPEN EDG."],
                        ["img" => "photos/certificates/Cybersecurity_Essentials_certificate.jpg", "title" => "Cybersecurity Essentials", "desc" => "From Networking Academy."],
                        ["img" => "photos/certificates/Network_Security_certificate.jpg", "title" => "Network Security", "desc" => "From Network Academy."],
                        ["img" => "photos/certificates/SCAD-1/SCAD 1_page-0001.jpg", "title" => "Soft Skills and Career Development", "desc" => "From KEPLER University and IPRC TUMBA."],
                        ["img" => "photos/certificates/English_for_IT_2_certificate.jpg", "title" => "English for IT", "desc" => "From OPEN EDG."],
                        ["img" => "photos/certificates/CCNA_Switching_Routing_and_Wireless_Essentials_certificate.jpg", "title" => "Switching Routing & Wireless", "desc" => "From Networking Academy."],
                        ["img" => "photos/certificates/CCNA_Introduction_to_Networks_certificate.jpg", "title" => "Networks Introduction", "desc" => "From Networking Academy."]
                       
                    ];
                    foreach ($certificates as $cert):
                    ?>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden group">
                        <div class="overflow-hidden h-48">
                            <img src="<?= htmlspecialchars($cert['img']) ?>"
                                alt="<?= htmlspecialchars($cert['title']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                <?= htmlspecialchars($cert['title']) ?></h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">
                                <?= htmlspecialchars($cert['desc']) ?></p>
                            <a href="<?= htmlspecialchars($cert['img']) ?>" target="_blank"
                                class="inline-block mt-4 bg-orange-600 text-white font-semibold text-sm px-4 py-2 rounded-md hover:bg-orange-700 transition-colors">View
                                Certificate</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- -- Contact Section -- -->
            <section class="py-20" id="contact">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Get in touch</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">Have an idea for a project? Let’s turn it
                        into reality! Contact me here.</p>
                </div>
                <div class="grid lg:grid-cols-2 gap-12">
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                            Click & Find Me <i class="uil uil-corner-right-down"></i>
                        </h2>
                        <!-- Email -->
                        <p class="flex items-center text-lg mb-2">
                            <i class="uil uil-envelope text-2xl text-orange-600 mr-3"></i>
                            Email me at →
                            <a href="mailto:info@cyizalandry.com" class="text-orange-600 underline">
                                info@cyizalandry.com
                            </a>
                        </p>

                        <!-- Phone -->
                        <p class="flex items-center text-lg mb-2">
                            <i class="uil uil-phone text-2xl text-orange-600 mr-3"></i>
                            Call me →
                            <a href="tel:+250780105612" class="text-orange-600 underline">
                                +250 780 105 612
                            </a>
                        </p>

                        <p class="flex items-center text-lg">
                            <i class="uil uil-whatsapp text-2xl text-green-600 mr-3"></i>
                            Chat me →
                            <a href="https://wa.me/250780105612" target="_blank" class="ml-2 text-orange-600 underline">
                                Online via WhatsApp
                            </a>
                        </p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                        <form action="php/save_contact.php" method="POST">
                            <div class="grid sm:grid-cols-2 gap-6 mb-6">
                                <input type="text" name="client_name" placeholder="Your Name" required
                                    class="w-full p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <input type="email" name="client_email" placeholder="Your Email" required
                                    class="w-full p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div class="mb-6">
                                <textarea name="client_message" placeholder="Your Message" required rows="5"
                                    class="w-full p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full bg-orange-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-orange-700 transition-colors">Send
                                    <i class="uil uil-message"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </main>

        <!-- -- Footer -- -->
        <footer class="py-12 border-t border-gray-200 dark:border-gray-700 mt-12">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-900 dark:text-white">MPAYIMANA CYIZA Landry</p>
                <ul class="flex justify-center flex-wrap gap-6 my-6">
                    <li><a href="#home" class="hover:text-orange-600">Home</a></li>
                    <li><a href="#about" class="hover:text-orange-600">About</a></li>
                    <li><a href="#projects" class="hover:text-orange-600">Projects</a></li>
                    <li><a href="#Certificates" class="hover:text-orange-600">Credentials</a></li>
                    <li><a href="#" class="hover:text-orange-600" onclick="confirmRedirect(event)">Skill Up</a></li>
                    <li><a href="#contact" class="hover:text-orange-600">Contact</a></li>
                </ul>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="https://www.instagram.com/landry_cyiza/" class="text-2xl hover:text-orange-600"><i
                            class="uil uil-instagram"></i></a>
                    <a href="www.linkedin.com/in/landry-cyiza-mpayimana-595a85262"
                        class="text-2xl hover:text-orange-600"><i class="uil uil-linkedin-alt"></i></a>
                    <a href="https://x.com/cyizalandry" class="text-2xl hover:text-orange-600"><i
                            class="uil uil-twitter"></i></a>
                    <a href="https://github.com/CyizaLandry5" class="text-2xl hover:text-orange-600"><i
                            class="uil uil-github-alt"></i></a>
                </div>
                <p class="text-gray-500 dark:text-gray-400">Copyright &copy; <a href="#home"
                        class="text-orange-600 font-semibold">MPAYIMANA CYIZA Landry</a> - All rights reserved</p>
            </div>
        </footer>

    </div>

    <!-- Custom CSS for skill tags to avoid repetition -->
    <style>
    .skill-tag {
        @apply bg-orange-100 text-orange-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark: bg-orange-900 dark:text-orange-300;
    }
    </style>

    <!-- JS Libraries -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Your Custom JS files -->
    <!-- !! I MUST make sure these files exist and are correctly linked -->
    <script src="js/cv_actions.js"></script>
    <script src="js/status.js"></script>
    <script src="js/studentconf.js"></script>

    <!-- Main script for animations and interactions -->
    <script>
    // -- Typed.js Animation --
    var typingEffect = new Typed(".typedText", {
        strings: ["a Trainer,", "a Software Engineer,", "an Innovator,", "Tech Enthusiast,", "AI Expert."],
        loop: true,
        typeSpeed: 100,
        backSpeed: 80,
        backDelay: 2000
    });

    // -- ScrollReveal Animation --
    const sr = ScrollReveal({
        origin: 'top',
        distance: '80px',
        duration: 2000,
        reset: true
    });

    // Animate different sections
    sr.reveal('section', {
        interval: 200
    });
    sr.reveal('.featured-text-card', {});
    sr.reveal('.featured-name', {
        delay: 100
    });
    sr.reveal('.featured-text-info', {
        delay: 200
    });
    sr.reveal('.featured-text-btn', {
        delay: 200
    });
    sr.reveal('.social_icons', {
        delay: 200
    });
    sr.reveal('.featured-image', {
        delay: 300
    });
    sr.reveal('.project-box', {
        interval: 200
    });
    sr.reveal('.certificate-box', {
        interval: 200
    });


    // -- Active Nav Link on Scroll --
    const sections = document.querySelectorAll('section[id]');

    function scrollActive() {
        const scrollY = window.pageYOffset;
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 150; // Adjusted offset
            let sectionId = current.getAttribute('id');
            let navLink = document.querySelector('.nav-menu a[href*=' + sectionId + ']');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active-link');
                    link.querySelector('.circle').classList.add('hidden');
                });
                if (navLink) {
                    navLink.classList.add('active-link');
                    navLink.querySelector('.circle').classList.remove('hidden');
                }
            }
        });
    }
    window.addEventListener('scroll', scrollActive);


    // -- Mobile Menu Toggle --
    function myMenuFunction() {
        const mobileMenu = document.getElementById('mobileNavMenu');
        mobileMenu.classList.toggle('hidden');
    }

    // -- Dark Mode Toggle --
    const toggleSwitch = document.getElementById('toggle-switch');
    const html = document.documentElement;

    // On page load, check for saved theme
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
    }

    toggleSwitch.addEventListener('click', () => {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
    </script>
</body>

</html>
