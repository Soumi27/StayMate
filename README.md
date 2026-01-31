<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StayMate – Roommate & Accommodation Matching System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 40px;
            background: #f9f9f9;
            color: #333;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        code {
            background: #eee;
            padding: 4px 6px;
            border-radius: 4px;
        }
        ul {
            margin-left: 20px;
        }
        .box {
            background: #ffffff;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<h1>StayMate</h1>
<p><strong>Role-Based Roommate & Accommodation Matching System</strong></p>

<div class="box">
    <h2>📌 Project Overview</h2>
    <p>
        StayMate is a web-based application developed using <strong>PHP and MySQL</strong>
        that helps users find compatible roommates based on lifestyle preferences and location.
        The system supports role-based users and provides ranked matches with privacy-controlled
        contact options.
    </p>
</div>

<div class="box">
    <h2>🚀 Features</h2>

    <h3>🔐 Authentication & Roles</h3>
    <ul>
        <li>User registration and login</li>
        <li>Role-based access:
            <ul>
                <li><strong>Owner</strong> – Has accommodation</li>
                <li><strong>Seeker</strong> – Looking for accommodation</li>
            </ul>
        </li>
        <li>Session-based authentication</li>
    </ul>

    <h3>🧠 Smart Matching System</h3>
    <ul>
        <li>Matches calculated using a weighted compatibility score</li>
        <li>Top 5 matches displayed and ranked</li>
        <li>Matching criteria:
            <ul>
                <li>City / Location</li>
                <li>Sleep time</li>
                <li>Study habits</li>
                <li>Food preference</li>
                <li>Smoking habit</li>
                <li>Cleanliness rating</li>
            </ul>
        </li>
    </ul>

    <h3>📍 Location-Based Matching</h3>
    <ul>
        <li>Users from the same city are prioritized (e.g., Pune → Pune)</li>
        <li>Makes matches realistic and practical</li>
    </ul>

    <h3>📞 Contact & Privacy Control</h3>
    <ul>
        <li>Users can share Phone, Email, or WhatsApp</li>
        <li>At least one contact method required</li>
        <li>Users control visibility of contact details</li>
        <li>Only matched users can see contact details</li>
    </ul>

    <h3>🏠 Accommodation Module (Owners Only)</h3>
    <ul>
        <li>Add or edit accommodation details</li>
        <li>Location input with placeholders (Area, City)</li>
    </ul>

    <h3>📊 Dashboard</h3>
    <ul>
        <li>Welcome message with user name</li>
        <li>Profile completion progress bar</li>
        <li>Info cards (Role, City, Matches)</li>
        <li>Quick action buttons</li>
        <li>Privacy reminder</li>
    </ul>

    <h3>🗑️ Account Deletion</h3>
    <ul>
        <li>Password confirmation before deletion</li>
        <li>Deletes all related user data</li>
        <li>Displays a goodbye message with positive quotes</li>
    </ul>
</div>

<div class="box">
    <h2>🛠️ Technology Stack</h2>
    <ul>
        <li><strong>Frontend:</strong> HTML, CSS</li>
        <li><strong>Backend:</strong> PHP</li>
        <li><strong>Database:</strong> MySQL</li>
        <li><strong>Server:</strong> XAMPP (Apache + MySQL)</li>
        <li><strong>Version Control:</strong> Git & GitHub</li>
    </ul>
</div>

<div class="box">
    <h2>🗄️ Database Structure</h2>
    <ul>
        <li><code>users</code> – User credentials and roles</li>
        <li><code>preferences</code> – Lifestyle preferences and city</li>
        <li><code>accommodation</code> – Accommodation details (owners)</li>
        <li><code>contact_details</code> – Contact info with privacy control</li>
    </ul>
    <p>
        All related tables follow a <strong>one-to-one relationship</strong>
        with the users table using <code>user_id</code>.
    </p>
</div>

<div class="box">
    <h2>▶️ How to Run the Project</h2>
    <ol>
        <li>Install <strong>XAMPP</strong></li>
        <li>Copy project folder to:
            <br><code>C:/xampp/htdocs/StayMate</code>
        </li>
        <li>Start Apache and MySQL from XAMPP</li>
        <li>Import database using phpMyAdmin</li>
        <li>Open browser and visit:
            <br><code>http://localhost/StayMate/register.php</code>
        </li>
    </ol>
</div>

<div class="box">
    <h2>🎓 Academic Value</h2>
    <p>
        This project demonstrates CRUD operations, database normalization,
        role-based access control, ranking algorithms, privacy-aware design,
        and real-world user flow.
    </p>
    <p>
        Suitable for <strong>BCA / MCA / Final Year Projects</strong>.
    </p>
</div>

<div class="box">
    <h2>🔮 Future Enhancements</h2>
    <ul>
        <li>Internal chat system</li>
        <li>Area-level distance matching</li>
        <li>Password hashing</li>
        <li>Admin moderation panel</li>
        <li>Mobile responsive UI</li>
    </ul>
</div>

<div class="box">
    <h2>👩‍💻 Author</h2>
    <p>
        Developed as an academic project to demonstrate full-stack PHP development
        with real-world logic and clean UI/UX.
    </p>
</div>

<div class="box">
    <h2>⭐ Git Workflow</h2>
    <ul>
        <li><strong>main</strong> – Stable backend version</li>
        <li><strong>ui-enhancement</strong> – UI and UX improvements</li>
    </ul>
</div>

<p style="text-align:center; margin-top:40px; color:#666;">
    🌱 Feel free to use, learn from, or enhance this project.
</p>

</body>
</html>
