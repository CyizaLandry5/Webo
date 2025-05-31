<!DOCTYPE html>
<html lang="en">
<!-- 
======================================================
This code is developed by MPAYIMANA CYIZA Landry
Website: www.cyizalandry.com
======================================================
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="photos/mine.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/certificates.css">
    <title>Portfolio | M CYIZA Landry</title>
</head>

<body>
    <div class="container">
        <!-- -- Navigation Section -- -->
        <nav id="header">
            <div class="nav-logo">
                <!-- <p class="nav-name">S</p> -->
                
                <p class="nav-name">Landry</p>
                <span>.</span>
            </div>
            <div class="nav-menu" id="myNavMenu">
                <ul class="nav_menu_list">
                    <li class="nav_list">
                        <a href="#home" class="nav-link active-link">Home</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#about" class="nav-link">About</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#projects" class="nav-link">Projects</a>
                        <div class="circle"></div>
                    </li>

                    <li class="nav_list">
                        <a href="#contact" class="nav-link">Contact</a>
                        <div class="circle"></div>
                    </li>

                    <li class="nav_list">
                        <a href="#Certificates" class="nav-link">Credentials</a>
                        <div class="circle"></div>
                    </li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn" onclick="confirmViewCV()">Download CV <i class="uil uil-file-alt"></i></button>
            </div>
            <div class="mode">
                <div class="moon-sun" id="toggle-switch">
                    <i class="fa fa-moon" id="moon"></i>
                    <i class="fa fa-sun" id="sun"></i>
                </div>
            </div>
            <div class="nav-menu-btn">
                <i class="uil uil-bars" onclick="myMenuFunction()"></i>
            </div>
        </nav>
        <!-- -- Main -- -->
        <main class="wrapper">
            <!-- -- Hero Section -- -->
            <section class="featured-box" id="home">
                <div class="featured-text">
                    <div class="featured-text-card">
                        <span>MPAYIMANA CYIZA Landry</span>
                    </div>
                    <div class="featured-name">
                        <p>I'm <span class="typedText"></span></p>
                    </div>
                    <div class="featured-text-info">
                        <p>Dedicated to building intelligent solutions, I specialize in Python programming, machine
                            learning, IoT systems, and robust PHP web development. My focus is on crafting innovative
                            technologies that solve real-world problems and drive progress.</p>
                    </div>
                    <div class="featured-text-btn">
                        <button class="btn blue-btn" onclick="location.href='#contact'">Hire Me</button>

                        <button class="btn" onclick="confirmViewCV()">Download CV <i
                                class="uil uil-file-alt"></i></button>
                    </div>
                    <div class="social_icons">
                        <div class="icon"><i class="uil uil-instagram"></i></div>
                        <div class="icon"><i class="uil uil-linkedin-alt"></i></div>
                        <div class="icon"><i class="uil uil-dribbble"></i></div>
                        <div class="icon"><i class="uil uil-github-alt"></i></div>
                    </div>
                </div>
                <div class="featured-image">
                    <div class="image">
                        <img src="photos/mine.jpg" alt="avatar">
                    </div>
                </div>
                <!-- <div class="scroll-icon-box">
                    <a href="#about" class="scroll-btn">
                        <i class="uil uil-mouse-alt"></i>
                        <p>Scroll Down</p>
                    </a>
                </div> -->
            </section>
            <!-- -- About Section -- -->
            <section class="section" id="about">
                <div class="top-header">
                    <h1>About Me and Key Skills</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="about-info">
                            <h3>Who I Am</h3>
                            <p>

                                I am Cyiza Landry Mpayimana, a passionate IT Trainer, Software Engineer, and Innovator.
                                My mission is to empower the next generation of tech leaders by bridging advanced
                                technology with practical education, constantly seeking to develop impactful solutions.
                                I hold an Advanced Diploma in Information Technology from IPRC TUMBA, where I excelled,
                                and am currently pursuing my Bachelor's of Science in IT at the University of Kigali. My
                                professional journey is dedicated to transforming complex challenges into effective,
                                real-world applications and fostering skill development within the tech community.
                            </p>


                            <div class="about-btn">
                                <button class="btn">MORE ABOUT ME<i class="uil uil-import"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="skills-box">
                            <div class="skills-header">
                                <h3>Software Development</h3>
                            </div>
                            <div class="skills-list">
                                <span>Python</span>
                                <span>API Development</span>
                                <span>HTML & CSS</span>
                                <span>JavaScript</span>
                                <span>PHP</span>
                                <span>JAVA</span>
                                <span>Django</span>
                                <span>Laravel</span>
                                <span>Mobile App Development</span>
                                <span>Full-Stack Web Development</span>
                                <span>Object-Oriented Programming</span>
                            </div>
                        </div>

                        <div class="skills-box">
                            <div class="skills-header">
                                <h3>IT Infrastructure & Security</h3>
                            </div>
                            <div class="skills-list">
                                <span>Network Security</span>
                                <span>Cybersecurity</span>
                                <span>Windows Server Admin</span>
                                <span>Linux System Admin</span>
                                <span>Cloud Computing</span>
                                <span>Virtualization</span>
                                <span>Large Networks Admin</span>
                                <span>Installation of IP-Based Devices</span>
                                <span>Firewall Management</span>
                                <span>Ethical Hacking</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="skills-box">
                            <div class="skills-header">
                                <h3>Emerging Tech & Data</h3>
                            </div>
                            <div class="skills-list">
                                <span>Machine Learning</span>
                                <span>Artificial Intelligence (AI)</span>
                                <span>Internet of Things (IoT)</span>
                                <span>Data Analysis</span>
                                <span>Predictive Analytics</span>
                                <span>Database Administration (MySQL, PostgreSQL, MongoDB, Firebase)</span>
                                <span>SQL Optimization</span>
                                <span>IoT Device Configuration</span>
                                <span>Edge Computing</span>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!-- -- Project Section -- -->
            <section class="section" id="projects">
                <div class="top-header">
                    <h1>Projects</h1>
                </div>
                <div class="project-container">
                    <div class="project-box">
                        <i class="uil uil-briefcase-alt"></i>
                        <h3>Completed</h3>
                        <label><?php $projects = 308; echo"$projects"; ?>+ Finished Projects</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-users-alt"></i>
                        <h3>Clients</h3>
                        <label><?php $clients = 450; echo"$clients"; ?>+ Happy Clients</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-award"></i>
                        <h3>Experience</h3>
                        <label><?php $experience = 3; echo"$experience"; ?>+ Years in the field</label>
                    </div>
                </div>
            </section>
            <!-- -- CONTACT BOX -- -->
           <form action="php/save_contact.php" method="POST">
    <section class="section" id="contact">
        <div class="top-header">
            <h1>Get in touch</h1>
            <span>Have an idea for a project? Let&rsquo;s turn it into reality! Contact me here, and let&rsquo;s get started.</span>
        </div>
        <div class="row">
            <div class="col">
                <div class="contact-info">
                    <h2>Find Me <i class="uil uil-corner-right-down"></i></h2>
                    <p><i class="uil uil-envelope"></i> Email: info@cyizalandry.com</p>
                    <p><i class="uil uil-phone"></i> Tel: +250 780 105 612</p>
                </div>
            </div>
            <div class="col">
                <div class="form-control">
                    <div class="form-inputs">
                        <input type="text" class="input-field" name="client_name" placeholder="Name" required>
                        <input type="email" class="input-field" name="client_email" placeholder="Email" required>
                    </div>
                    <div class="text-area">
                        <textarea name="client_message" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-button">
                        <button type="submit" class="btn">Send <i class="uil uil-message"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<!-- -- CERTIFICATES SECTION -- -->

<section id="Certificates">
    <div class="top-header">
        <h1>My Certifications</h1>
        <p class="subtitle">Professional credentials in Programming, Networking, Soft Skills and more.</p>
    </div>

    <div class="certificate-container">
        <!-- Certificate 1 -->
        <div class="certificate-box">
            <div class="image-wrapper">
                <img src="photos/certificates/Programming_Essentials_in_Python_certificate.jpg" alt="Python" class="certificate-thumbnail">
            </div>
            <div class="certificate-info">
                <h3>Python Programming Essentials</h3>
                <p>Programming Essentials in Python certificate</p>
                <a href="photos/certificates/Programming_Essentials_in_Python_certificate.jpg" class="btn" target="_blank">View Certificate</a>
            </div>
        </div>

        <!-- Certificate 2 -->
        <div class="certificate-box">
            <div class="image-wrapper">
                <img src="photos/certificates/Cybersecurity_Essentials_certificate.jpg" alt="Interaction Design" class="certificate-thumbnail">
            </div>
            <div class="certificate-info">
                <h3>Cybersecurity Essentials</h3>
                <p>Cybersecurity Essentials.</p>
                <a href="photos/certificates/Cybersecurity_Essentials_certificate.jpg" class="btn" target="_blank">View Certificate</a>
            </div>
        </div>

        <!-- Certificate 3 -->
        <div class="certificate-box">
            <div class="image-wrapper">
                <img src="photos/certificates/Network_Security_certificate.jpg" alt="Adobe XD Certificate" class="certificate-thumbnail">
            </div>
            <div class="certificate-info">
                <h3>Network Security</h3>
                <p>Network Security.</p>
                <a href="photos/certificates/Network_Security_certificate.jpg" class="btn" target="_blank">View Certificate</a>
            </div>
        </div>
    </div>
</section>



        </main>
        <!-- -- Footer -- -->
        <footer>
            <div class="top-footer">
                <p>MPAYIMANA CYIZA Landry</p>
            </div>
            <div class="middle-footer">
                <ul class="footer-menu">
                    <li class="footer_menu_list">
                        <a href="#home">Home</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#about">About</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#projects">Projects</a>
                    </li>

                    <li class="footer_menu_list">
                        <a href="#contact">Contact</a>
                    </li>

                    <li class="footer_menu_list">
                        <a href="#Certificates">Credentials</a>
                    </li>
                </ul>
            </div>
            <div class="footer-social-icons">
                <div class="icon"><i class="uil uil-instagram"></i></div>
                <div class="icon"><i class="uil uil-linkedin-alt"></i></div>
                <div class="icon"><i class="uil uil-dribbble"></i></div>
                <div class="icon"><i class="uil uil-github-alt"></i></div>
            </div>
            <div class="bottom-footer">
                <p>Copyright &copy; <a href="#home" style="text-decoration: none; color: rgb(216, 86, 0);">MPAYIMANA
                        CYIZA Landry</a> - All rights reserved</p>
            </div>
        </footer>
    </div>

    <!-- -- JS Link -- -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/script.js"></script>
    <script src="js/cv_actions.js"></script>
    <script src="js/status.js"></script>

</body>

</html>