<style>
    body {
        background-color: #f4f7f9;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .resume-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 40px auto;
    }
    .resume-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .resume-header img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
    .resume-header h1 {
        margin: 10px 0 5px;
        font-size: 28px;
    }
    .resume-header h2 {
        margin: 0;
        font-size: 18px;
        color: #666;
    }
    .section-title {
        font-size: 22px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
        color: #007bff;
    }
    .resume-content {
        margin-bottom: 30px;
    }
    .resume-content h4 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }
    .resume-content ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .resume-content ul li {
        margin-bottom: 8px;
        font-size: 16px;
    }
    .resume-content ul li a {
        color: #007bff;
        text-decoration: none;
    }
    .resume-content ul li a:hover {
        text-decoration: underline;
    }
    .skills-list {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        font-size: 16px;
        color: #333;
    }
    .skills-list span {
        margin-right: 5px;
    }
    .skills-list span:last-child {
        margin-right: 0; /* Remove the margin from the last item */
    }
    .download-btn {
        text-align: center;
    }
    .download-btn a {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }
    .download-btn a:hover {
        background-color: #0056b3;
    }
    .declaration-area {
        margin-top: 30px;
    }
    .declaration-area label {
        font-size: 16px;
        color: #333;
    }
    .declaration-area input[type="checkbox"] {
        margin-right: 10px;
    }
</style>
</head>
<body>
<div class="resume-container">
    <!-- Header -->
    <div class="resume-header">
        <img src="https://via.placeholder.com/120" alt="Profile Picture">
        <h1>John Doe</h1>
        <h2>Software Engineer</h2>
    </div>

    <!-- Contact Information -->
    <div class="resume-content">
        <div class="section-title">Contact Information</div>
        <ul>
            <li>Phone: <a href="tel:+1234567890">+1 (234) 567-890</a></li>
            <li>Email: <a href="mailto:john.doe@example.com">john.doe@example.com</a></li>
            <li>Address: 123 Main Street, Hometown, ABC 12345</li>
        </ul>
    </div>

    <!-- Basic Info -->
    <div class="resume-content">
        <div class="section-title">Basic Information</div>
        <ul>
            <li>Date of Birth: January 1, 1990</li>
            <li>Nationality: American</li>
        </ul>
    </div>

    <!-- Education -->
    <div class="resume-content">
        <div class="section-title">Education</div>
        <div>
            <h4>Bachelor of Science in Computer Science</h4>
            <p><strong>Institute:</strong> Example University</p>
            <p><strong>Field of Study:</strong> Computer Science</p>
            <p><strong>Grade:</strong> GPA 3.8</p>
            <p><strong>Start Date:</strong> September 2008</p>
            <p><strong>End Date:</strong> May 2012</p>
        </div>
        <!-- Repeat for additional education -->
    </div>

    <!-- Work Experience -->
    <div class="resume-content">
        <div class="section-title">Work Experience</div>
        <div>
            <h4>Software Engineer at Tech Company</h4>
            <p><strong>Location:</strong> San Francisco, CA</p>
            <p><strong>Start Date:</strong> June 2015</p>
            <p><strong>End Date:</strong> Present</p>
            <p><strong>Responsibilities:</strong> Developing and maintaining web applications, collaborating with cross-functional teams, etc.</p>
        </div>
        <!-- Repeat for additional work experience -->
    </div>

    <!-- Skills -->
    <div class="resume-content">
        <div class="section-title">Skills</div>
        <div class="skills-list">
            <span>JavaScript,</span>
            <span>React,</span>
            <span>Node.js,</span>
            <span>Python,</span>
            <span>SQL</span>
            <!-- Add more skills as needed -->
        </div>
    </div>

    <!-- Declaration -->
    <div class="resume-content declaration-area">
        <div class="section-title">Declaration</div>
        <label>
            <input type="checkbox" id="declaration" required>
            I declare that the information provided is correct to the best of my knowledge.
        </label>
    </div>

    <!-- Download Resume -->
    <div class="download-btn">
        <a href="path/to/resume.pdf" download id="download-btn">Download Resume</a>
        <a href="path/to/resume.pdf" download id="download-btn">Finish</a>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('download-btn').addEventListener('click', function(event) {
        var checkbox = document.getElementById('declaration');
        if (!checkbox.checked) {
            event.preventDefault();
            alert('Please check the declaration checkbox before downloading.');
        }
    });
</script>
