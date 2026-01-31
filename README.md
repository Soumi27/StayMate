# StayMate  
### Role-Based Roommate & Accommodation Matching System

StayMate is a web-based application developed using **PHP and MySQL** that helps users find compatible roommates based on lifestyle preferences and location.  
The system uses **role-based access**, **ranked matching**, and **privacy-controlled contact sharing**, inspired by real-world applications.

---

## 📌 Project Overview

StayMate connects:
- **Owners** – users who already have accommodation
- **Seekers** – users looking for accommodation

The application follows a complete user flow:
**Register → Login → Dashboard → Preferences → Matches → Contact → Account Management**

---

## 🚀 Key Features

### 🔐 Authentication & User Roles
- User registration and login
- Role-based access:
  - **Owner** – has accommodation
  - **Seeker** – looking for accommodation
- Session-based authentication

---

### 🧠 Smart Roommate Matching Algorithm
- Matches are calculated using a **weighted compatibility score**
- **Top 5 matches** are ranked and displayed
- Matching criteria:
  - City / Location
  - Sleep schedule
  - Study habits
  - Food preferences
  - Smoking habits
  - Cleanliness rating

---

### 📍 Location-Based Matching
- Users from the **same city** (e.g., Pune → Pune) are prioritized
- Improves real-world practicality of matches

---

### 📞 Contact Details & Privacy Control
- Users can share:
  - Phone number
  - Email
  - WhatsApp number
- **At least one contact method is mandatory**
- Users control who can view their contact details
- Only **matched users** can see shared contact information

---

### 🏠 Accommodation Module (Owners Only)
- Owners can add or edit accommodation details
- Location field uses clear placeholders  
  *(Area, City – e.g., Kothrud, Pune)*

---

### 📊 User Dashboard
- Personalized welcome message
- Profile completion progress bar
- Information cards:
  - Role
  - City
  - Matches
- Quick action buttons
- Privacy and safety reminders

---

### 🗑️ Account Deletion (User-Controlled)
- Password confirmation required before deletion
- All user-related data is securely removed
- A goodbye page with positive messages is displayed

---

## 🛠️ Technology Stack

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Database Tool:** MySQL Workbench  
- **Server:** XAMPP (Apache & MySQL)  
- **Version Control:** Git & GitHub  

---

## 🗄️ Database Design

| Table | Description |
|------|------------|
| `users` | Stores user credentials and roles |
| `preferences` | Stores lifestyle preferences and city |
| `accommodation` | Stores accommodation details (owners) |
| `contact_details` | Stores contact info with privacy control |

✔ Proper normalization  
✔ One-to-one relationship using `user_id`  
✔ No duplicate records per user  

---

## ▶️ How to Run the Project

1. Install **XAMPP**
2. Copy the project folder to:


C:/xampp/htdocs/StayMate

3. Start **Apache** and **MySQL** from XAMPP Control Panel
4. Create and manage the database using **MySQL Workbench**
5. Open a browser and visit:


http://localhost/StayMate/register.php


---

## 🎓 Academic Relevance

This project demonstrates:
- CRUD operations
- Database normalization
- Role-based access control
- Ranking algorithms
- Privacy-aware system design
- Real-world user flow

✔ Suitable for **BCA / MCA / Final Year Projects**

---

## 🔮 Future Enhancements

- Internal chat system
- Area-level distance matching
- Password hashing and encryption
- Admin moderation panel
- Mobile responsive UI

---

## ⭐ Git Workflow

- **main** → Stable backend version  
- **ui-enhancement** → UI and UX improvements  

Pull Requests are used to merge features safely.

---

## 👩‍💻 Author

Developed as an academic project to demonstrate full-stack PHP development with real-world logic and clean UI/UX.

---

🌱 *Feel free to fork, learn from, or enhance this project.*
