# Comprehensive System Testing & Evaluation Report
**Project Title:** olevel-books-online-system  
**Developer:** Nasri Jabiri : Registration Number - 14325011/T.24  
**Course Level:** O-Level Web Systems Framework 
## 1. Introduction & Objectives Verification
This evaluation report verifies that the *Online O-Level Book Purchasing System* functions perfectly according to the core scope laid out in the initial project proposal. The platform successfully bridges the gap for Tanzanian students by providing instant access to academic resources without requiring physical bookstore travel.
---
## 2. System Testing Matrix (Test Cases)
To achieve maximum reliability, the following structural testing procedures were executed directly against the codebase:

| Test ID | System Feature Checked | Step-by-Step Action Executed | Expected Functional Result | Actual Outcome | Status |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **TC-01** | Secure Database Connection | Run script background routes via `db_connect.php`. | Seamless connection to `olevel_books_db` with zero errors. | Connection established silently using secure PDO parameters. | **PASSED** |
| **TC-02** | Core Curriculum Datasets | Load database table records via `seed.sql`. | All 9 core subjects and 36 textbooks (Form 1 to 4) load perfectly. | Database successfully populated with real NECTA syllabus materials. | **PASSED** |
| **TC-03** | Public Book Search Engine | Type a specific keyword (e.g., "Biology") into the storefront form. | JavaScript Fetch API grabs text and pulls matching cards from `search_worker.php`. | Grid displays matching textbooks instantly without a page reload. | **PASSED** |
| **TC-04** | Admin Inventory Entry | Fill out the creation form inside `admin-dashboard.html` and hit save. | Form entries pass to `admin_worker.php`, executing secure sql insertions. | Success alert banner pops up and form values reset completely. | **PASSED** |
| **TC-05** | SQL Injection Defense | Attempt to input malicious characters into text search boxes. | System filters input arguments safely via boundary placeholders. | System rejects malicious string execution, keeping the database intact. | **PASSED** |
---
## 3. Scope Boundaries & Out of Scope Check
As dictated by the approved project boundaries:
1. **Physical Logistics:** The system successfully manages online orders and catalogs but does not process shipping tracking routes.
2. **Payment Processing:** Financial ledger items handle local currency calculations (TZS) but do not connect to international gateways, preventing security compliance bloat.
---
## 4. Final Conclusion
The *Online O-Level Book Purchasing System* has been successfully constructed, modularized, and tested. By leveraging modern asynchronous client-side fetch elements alongside a robust relational MySQL data engine, the system delivers a lightweight, reliable solution for secondary school students across Tanzania.
