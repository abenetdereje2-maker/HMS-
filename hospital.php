<?php
session_start();
include('database.php');
$result = mysqli_query($conn, "SELECT * FROM patients ");
$result_pharmacy = mysqli_query($conn, 'SELECT * FROM pharmacy');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediCare Plus - Hospital Management System</title>
  <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Main CSS -->
  <link rel="stylesheet" href="hospital.css">
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="spinner"></div>
  </div>

  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-logo">
        <i class="fas fa-hospital-alt"></i>
        <span>MediCare<span class="highlight">Plus</span></span>
        <p name="welcom"></p>
      </div>
      
      <div class="menu-toggle" id="mobile-menu">
        <i class="fas fa-bars"></i>
      </div>
      
      <ul class="nav-menu">
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#patients">Patients</a></li>
        <li><a href="#doctors">Doctors</a></li>
        <li><a href="#pharmacy">Pharmacy</a></li>
        <li class="dropdown">
          <a href="#pages">Pages <i class="fas fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Login</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </li>
      </ul>
      
      <div class="nav-right">
        <div class="search-icon">
          <i class="fas fa-search"></i>
        </div>
        <div class="notification-icon">
          <i class="far fa-bell"></i>
          <span class="badge">0</span>
        </div>
        <div class="user-profile">
          <img src="https://ui-avatars.com/api/?name=John+Doe&background=0B3B5C&color=fff" alt="Profile">
          <span>John Doe</span>
        </div>
      </div>
    </div>
  </nav>

  <!-- Search Overlay -->
  <div class="search-overlay">
    <div class="search-container">
      <i class="fas fa-times close-search"></i>
      <input type="text" placeholder="Search patients, doctors, appointments...">
      <i class="fas fa-search search-btn"></i>
    </div>
  </div>
  <!--Patient Registration Form-->
  
    <div class="registration-card">
        <div class="card-header">
            <div class="icon-circle">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <h2 id="phead">Patient Registration</h2>
            <p>Enter the details to enroll a new patient</p>
        </div>

        <form action="#" method="POST" class="registration-form">
            <div class="form-group">
                <label for="patient_id">Patient ID</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-id-badge input-icon"></i>
                    <input type="text" id="patient_id" name="patient_id" placeholder="PID-00123" required>
                </div>
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user input-icon "></i>
                    <input type="text" id="full_name" name="full_name" placeholder="John Doe" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" placeholder="25" required>
                </div>
                 <div class="form-group">
                    <label for="age">Gender</label>
                    <input type="text" id="Gender" name="gender" placeholder="Male/Female" required>
                </div>
                 <div class="form-group">
                    <label for="age">Department</label>
                      <div class="select-wrapper">
                        <select id="Department" name="department" required>
                             <option value="" disabled selected>Select...</option>
                     <option value="OPD">OPD</option>
                     <option value="Emergency">Emergency</option>
                     <option value="inpatient">IP</option>
                      <option value="ICU">ICU </option>
                       <option value="ot">OT</option>
                     </select>
                      </div>
                      </div>
                <div class="form-group">
                    <label for="doctor">Assigned Doctor</label>
                    <div class="select-wrapper">
                        <select id="doctor" name="doctor" required>
                            <option value="" disabled selected>Select...</option>
                            <option value="Dr_smith">Dr. Smith (General)</option>
                            <option value="Dr_adams">Dr. Adams (Cardio)</option>
                            <option value="Dr_chen">Dr. Chen (Pediatrics)</option>
                            <option value="Dr_Admasu">Dr. Admasu (Orthopedics)</option>
                              <option value="Dr_Dereje">Dr. Dereje (Neurology)</option>
                                <option value="Dr_Mekdelawit">Dr. Mekdelawit (Gynecology)</option>
                        </select>
                    </div>
                </div>
            </div>

            <input  type="submit" id="register_btn" value="Register">
        </form>
       
        <p class="footer-text">Hospital Management System v1.0</p>
    </div>

  <!-- Hero Section -->
  <section id="home" class="hero">
    <div class="hero-content">
      <h1>Welcome to <span class="highlight">MediCare Plus</span></h1>
      <p>Complete Hospital Management Solution for Modern Healthcare</p>
      <div class="hero-buttons">
        <a href="#dashboard" class="btn btn-primary">Go to Dashboard</a>
        <a href="#learn-more" class="btn btn-outline">Learn More</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item">
          <h3>15K+</h3>
          <p>Happy Patients</p>
        </div>
        <div class="stat-item">
          <h3>200+</h3>
          <p>Expert Doctors</p>
        </div>
        <div class="stat-item">
          <h3>24/7</h3>
          <p>Emergency Care</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Dashboard Section -->
  <section id="dashboard" class="dashboard-section">
    <div class="container">
      <div class="section-header">
        <h2>Hospital Dashboard</h2>
        <p>Real-time overview of your hospital operations</p>
      </div>

      <!-- Stats Cards -->
      <div class="stats-container">
        <div class="stat-card primary">
          <div class="stat-icon">
            <i class="fas fa-users"></i>
          </div>
          <div class="stat-details">
            <h3>Total Patients</h3>
            <p id="total-patients">0</p>
            <span class="trend up"><i class="fas fa-arrow-up"></i> 12%</span>
          </div>
        </div>
        
        <div class="stat-card success">
          <div class="stat-icon">
            <i class="fas fa-user-md"></i>
          </div>
          <div class="stat-details">
            <h3>Doctors</h3>
            <p>47</p>
            <span class="trend up"><i class="fas fa-arrow-up"></i> 5%</span>
          </div>
        </div>
        
      
        
        <div class="stat-card danger">
          <div class="stat-icon">
            <i class="fas fa-procedures"></i>
          </div>
          <div class="stat-details">
            <h3>Available Beds</h3>
            <p>100</p>
            <span class="trend down"><i class="fas fa-arrow-down"></i> 8%</span>
          </div>
        </div>
      </div>
</section>

<!-- Activity Section
<section>
      
      <div class="charts-row">
        <div class="chart-container"></div>
      </div>
      <div class="activities-row">
        <div class="recent-patients">
          <h3>Recent Patients</h3>
          <div class="patient-list">
            <div class="patient-item">
              <img src="https://ui-avatars.com/api/?name=James+Donovan&background=random" alt="Patient">
              <div class="patient-info">
                <h4 >Abenet dereje</h4>
                <p>Cardiology • Room 412</p>
              </div>
              <span class="status admitted">Admitted</span>
            </div>
            <div class="patient-item">
              <img src="https://ui-avatars.com/api/?name=Maya+Rodriguez&background=random" alt="Patient">
              <div class="patient-info">
                <h4>Maya Rodriguez</h4>
                <p>Pediatrics • Room 307</p>
              </div>
              <span class="status waiting">Waiting</span>
            </div>
            <div class="patient-item">
              <img src="https://ui-avatars.com/api/?name=Robert+Walsh&background=random" alt="Patient">
              <div class="patient-info">
                <h4>Robert Walsh</h4>
                <p>Emergency • Room 105</p>
              </div>
              <span class="status critical">Critical</span>
            </div>
            <div class="patient-item">
              <img src="https://ui-avatars.com/api/?name=Lisa+Kim&background=random" alt="Patient">
              <div class="patient-info">
                <h4>Lisa Kim</h4>
                <p>Maternity • Room 225</p>
              </div>
              <span class="status stable">Stable</span>
            </div>
          </div>
          <a href="#" class="view-all">View All Patients <i class="fas fa-arrow-right"></i></a>
        </div>
</section>
-->
<section>



<!--
  <div class="upcoming-appointments">
          <h3>Today's Appointments</h3>
          <div class="appointment-list">
            <div class="appointment-item">
              <div class="time">09:30 AM</div>
              <div class="appointment-details">
<h4>James Donovan</h4>
                <p>Dr. Sarah Park</p>
              </div>
              <span class="badge confirmed">Confirmed</span>
            </div>
            <div class="appointment-item">
              <div class="time">10:15 AM</div>
              <div class="appointment-details">
                <h4>Maya Rodriguez</h4>
                <p>Dr. Raj Gupta</p>
              </div>
              <span class="badge waiting">Waiting</span>
            </div>
            <div class="appointment-item">
              <div class="time">11:00 AM</div>
              <div class="appointment-details">
                <h4>Robert Walsh</h4>
                <p>Dr. Emily Chen</p>
              </div>
              <span class="badge urgent">Urgent</span>
            </div>
            <div class="appointment-item">
              <div class="time">11:45 AM</div>
              <div class="appointment-details">
                <h4>Lisa Kim</h4>
                <p>Dr. Sarah Park</p>
              </div>
              <span class="badge confirmed">Confirmed</span>
            </div>
          </div>
          <a href="#" class="view-all">View Schedule <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
-->
  </section>

  <!-- Patients Section -->
  <section id="patients" class="patients-section">
    <div class="container">
      <div class="section-header">
        <h2>Patient Management</h2>
        <p>Comprehensive patient records and management</p>
      </div>
<form action="hospital.php" methode="get">

      <div class="patient-controls">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search patients by name, ID, or condition..." name="search">
        </div>
      
      </div>
</form>
<?php
$search_id = $_GET['search_id'];

$stmt=("SELECT *FROM patirnts WHERE FULL_NAME LIKE '%seacrch_id%' OR ID LIKE '%serch_id%'");
?>
      <div class="patients-table">
        <table id="tbody" border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
          <thead>
            <tr>
              <th>Patient ID</th>
              <th>Name</th>
              <th>Gender</th>
                <th>Age</th>
              <th>Doctor</th>
              <th>Departement</th>
                 <th> Registration Date
                 </th>
            </tr>
            <tbody>
               <?php if($result && mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['ID']; ?></td>
                                <td><?= htmlspecialchars($row['FULL_NAME']); ?></td>
                                <td><?= $row['Age']; ?></td>
                                <td><?= $row['Gender']; ?></td>
                                <td><?= $row['Doctor']; ?></td>
                                <td><?= $row['DEPT']; ?></td>
                                <td><?= isset($row['reg_date']) ? $row['reg_date'] : 'N/A'; ?></td>
                            </tr>
                        <?php endwhile; ?>
                   
                    <?php else: ?>
                        <tr><td colspan="7">No patients found.</td></tr>
                    <?php endif; ?>
                                </tbody>
</thead>
        </table>
                    </div>

    
      </div>
      <div class="pagination">
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <span>...</span>
        <a href="#">10</a>
      </div>
    </div>
  </section>


  <!-- Doctors Section -->
  <section id="doctors" class="doctors-section">
    <div class="container">
      <div class="section-header">
        <h2>Our Medical Team</h2>
        <p>Expert doctors dedicated to your health</p>
      </div>

      <div class="doctors-grid">
        <div class="doctor-card">
          <div class="doctor-image">
            <img src="https://ui-avatars.com/api/?name=Sarah+Park&background=0B3B5C&color=fff&size=128" alt="Dr. Sarah Park">
            <div class="doctor-status online"></div>
          </div>
          <h3>Dr. Sarah Park</h3>
          <p class="specialty">Cardiologist</p>
          <div class="doctor-stats">
            <span><i class="fas fa-user-friends"></i> 1,234 patients</span>
            <span><i class="fas fa-star"></i> 4.9</span>
          </div>
          <div class="doctor-schedule">
            <p><i class="far fa-clock"></i> Mon, Wed, Fri</p>
            <p><i class="far fa-calendar"></i> 9:00 AM - 5:00 PM</p>
          </div>
        
        </div>

        <div class="doctor-card">
          <div class="doctor-image">
            <img src="https://ui-avatars.com/api/?name=Raj+Gupta&background=0B3B5C&color=fff&size=128" alt="Dr. Raj Gupta">
            <div class="doctor-status online"></div>
          </div>
          <h3>Dr. Raj Gupta</h3>
          <p class="specialty">Pediatrician</p>
          <div class="doctor-stats">
            <span><i class="fas fa-user-friends"></i> 2,567 patients</span>
            <span><i class="fas fa-star"></i> 4.8</span>
          </div>
          <div class="doctor-schedule">
            <p><i class="far fa-clock"></i> Tue, Thu, Sat</p>
            <p><i class="far fa-calendar"></i> 10:00 AM - 6:00 PM</p>
          </div>
         
        </div>

        <div class="doctor-card">
          <div class="doctor-image">
            <img src="https://ui-avatars.com/api/?name=Emily+Chen&background=0B3B5C&color=fff&size=128" alt="Dr. Emily Chen">
            <div class="doctor-status offline"></div>
          </div>
          <h3>Dr. Emily Chen</h3>
          <p class="specialty">Emergency Medicine</p>
          <div class="doctor-stats">
            <span><i class="fas fa-user-friends"></i> 1,892 patients</span>
            <span><i class="fas fa-star"></i> 4.7</span>
          </div>
          <div class="doctor-schedule">
            <p><i class="far fa-clock"></i> Mon, Wed, Fri</p>
            <p><i class="far fa-calendar"></i> 2:00 PM - 10:00 PM</p>
          </div>
        
        </div>

        <div class="doctor-card">
          <div class="doctor-image">
            <img src="https://ui-avatars.com/api/?name=Maria+Garcia&background=0B3B5C&color=fff&size=128" alt="Dr. Maria Garcia">
            <div class="doctor-status online"></div>
          </div>
          <h3>Dr. Maria Garcia</h3>
          <p class="specialty">Obstetrician</p>
          <div class="doctor-stats">
            <span><i class="fas fa-user-friends"></i> 1,456 patients</span>
            <span><i class="fas fa-star"></i> 4.9</span>
          </div>
          <div class="doctor-schedule">
            <p><i class="far fa-clock"></i> Mon - Fri</p>
            <p><i class="far fa-calendar"></i> 8:00 AM - 4:00 PM</p>
          </div>
      
        </div>
      </div>
    </div>
  </section>

  <!-- 
  <section id="appointments" class="appointments-section">
    <div class="container">
      <div class="section-header">
        <h2>Appointment Scheduling</h2>
        <p>Book and manage patient appointments</p>
      </div>

      <div class="appointment-booking">
        <div class="calendar-view">
          <div class="calendar-header">
            <button class="month-nav"><i class="fas fa-chevron-left"></i></button>
            <h3>March 2026</h3>
            <button class="month-nav"><i class="fas fa-chevron-right"></i></button>
          </div>
          <div class="calendar-grid">
            <div class="weekdays">
              <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
            </div>
            <div class="days-grid">
               Days will be generated by JavaScript 
            </div>
          </div>
        </div>
Appointment Booking Form 
        <div class="booking-form">
          <h3>Book New Appointment</h3>
          <form>
            <div class="form-group">
              <label>Patient Name</label>
              <input type="text" placeholder="Enter patient name" id="patient_name">
            </div>
            <div class="form-group">
              <label>Select Doctor</label>
              <select id="doctor_select">
                <option>Dr. Sarah Park (Cardiology)</option>
                <option>Dr. Raj Gupta (Pediatrics)</option>
                <option>Dr. Emily Chen (Emergency)</option>
                <option>Dr. Maria Garcia (Maternity)</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Date</label>
                <input type="date" id="appointment_date">
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time" id="appointment_time">
              </div>
            </div>
            <div class="form-group">
              <label>Reason for Visit</label>
              <textarea rows="3" placeholder="Describe symptoms or reason..." id="visit_reason"></textarea>
            </div>
            <button type="submit" class="btn-book">Book Appointment</button>
          </form>
        </div>
      </div>

      <div class="upcoming-appointments-full">
        <h3>Upcoming Appointments</h3>
        <div class="appointments-list">
          <div class="appointment-card">
            <div class="appointment-time">
              <span class="date">Mar 15</span>
              <span class="time">09:30 AM</span>
            </div>
            <div class="appointment-info">
              <h4>James Donovan</h4>
              <p>Dr. Sarah Park - Cardiology</p>
            </div>
            <div class="appointment-status">Confirmed</div>
            <div class="appointment-actions">
              <button class="btn-reschedule">Reschedule</button>
              <button class="btn-cancel">Cancel</button>
            </div>
          </div>
          <div class="appointment-card">
            <div class="appointment-time">
              <span class="date">Mar 15</span>
              <span class="time">10:15 AM</span>
            </div>
            <div class="appointment-info">
              <h4>Maya Rodriguez</h4>
              <p>Dr. Raj Gupta - Pediatrics</p>
            </div>
            <div class="appointment-status waiting">Waiting</div>
            <div class="appointment-actions">
              <button class="btn-reschedule">Reschedule</button>
              <button class="btn-cancel">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
                    -->

  <!-- Pharmacy Section -->
  <section id="pharmacy" class="pharmacy-section">
    <div class="container">
      <div class="section-header">
        <h2>Pharmacy Inventory</h2>
        <p>Manage medications and prescriptions</p>
      </div>

      <div class="pharmacy-dashboard">
      

        <div class="inventory-table">
          <table>
            <thead>
              <tr>
                <th>Medication</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            <tbody>
               <?php if($result_pharmacy && mysqli_num_rows($result_pharmacy) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result_pharmacy)): ?>
                            <tr>
                                <td><?= $row['Medicene_name']; ?></td>
                                <td><?= htmlspecialchars($row['Catagory']); ?></td>
                                <td><?= $row['Quantity']; ?></td>
                                <td><?php echo '$' . number_format($row['Price'], 2); ?></td>
                                <td><?= $row['Expiry_Date']; ?></td>
                                <td><span class="stock-status">In Stock</span></td>
                                <td>
                                
                               <button class="btn-update"> <span class="text">Ordered</span>  </button>   
                        </td>
                               
                            </tr>
                        <?php endwhile; ?>
                   
                    <?php else: ?>
                        <tr><td colspan="7">No patients found.</td></tr>
                    <?php endif; ?>
        
            </tbody>
                    </thead>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Billing Section 
  <section id="billing" class="billing-section">
    <div class="container">
      <div class="section-header">
        <h2>Billing & Insurance</h2>
        <p>Manage payments, invoices, and insurance claims</p>
      </div>

      <div class="billing-summary">
        <div class="summary-card">
          <h3>Today's Collection</h3>
          <p id="today-collection" class="amount">$45,280</p>
          <span class="trend up">+12% from yesterday</span>
        </div>
        <div class="summary-card">
          <h3>Pending Payments</h3>
          <p id="pending-payments" class="amount">$23,450</p>
          <span class="trend down">45 invoices</span>
        </div>
        <div class="summary-card">
          <h3>Insurance Claims</h3>
          <p id="insurance-claims" class="amount">$67,890</p>
          <span class="trend">32 pending</span>
        </div>
      </div>

      <div class="recent-invoices">
        <h3>Recent Invoices</h3>
        <table class="invoices-table">
          <thead>
            <tr>
              <th>Invoice #</th>
              <th>Patient</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>INV-2026-001</td>
              <td>James Donovan</td>
              <td>2026-03-14</td>
              <td>$1,250.00</td>
              <td><span class="payment-badge paid"class="billing-status">Paid</span></td>
              <td><button class="btn-view"><i class="fas fa-download"></i></button></td>
            </tr>
            <tr>
              <td>INV-2026-002</td>
              <td>Maya Rodriguez</td>
              <td>2026-03-14</td>
              <td>$850.50</td>
              <td><span class="payment-badge pending" class="billing-status">Pending</span></td>
              <td><button class="btn-view" id="view-button"><i class="fas fa-download"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
                    -->

  <!-- FAQ Section -->
  <section id="faq" class="faq-section">
    <div class="container">
      <div class="section-header">
        <h2>Frequently Asked Questions</h2>
        <p>Find answers to common questions</p>
      </div>

      <div class="faq-grid">
        <div class="faq-item">
          <div class="faq-question">
            <h3>How do I book an appointment?</h3>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>You can book an appointment through our online portal, mobile app, or by calling our reception at +251944110494 OR</p><br><p>0942408344</p></p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>What insurance plans do you accept?</h3>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>We accept most major insurance plans including Ethiopian Insurance Corporation(EIC), Awash Insurance,Nyala Insurance, Nile Insurance, and Zemen Insurance.</p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>What are your visiting hours?</h3>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Visiting hours are from 8:00 AM to 8:00 PM daily. ICU has special visiting hours from 2:00 PM to 4:00 PM.</p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>How can I access my medical records?</h3>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>You can access your medical records through our patient portal. Request access at the reception desk.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">
    <div class="container">
      <div class="section-header">
        <h2 name="contactus">Contact Us</h2>
        <p>Get in touch with our team</p>
      </div>

      <div class="contact-container">
        <div class="contact-info">
          <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <h3>Address</h3>
              <p>Addis Ababa City,Ethiopia , Bole Sub-city,In front of Bole Medhanealem Church.
              </p>
            </div>
          </div>
          <div class="info-item">
            <i class="fas fa-phone"></i>
            <div>
              <h3>Phone</h3>
              <p>Emergency:0900003344</p>
              <p>Reception:+251943328344</p>
            </div>
          </div>
          <div class="info-item">
            <i class="fas fa-envelope"></i>
            <div>
              <h3>Email</h3>
              <p>info@medicareplus.com</p>
              <p>support@medicareplus.com</p>
            </div>
          </div>
          <div class="info-item">
            <i class="fas fa-clock"></i>
            <div>
              <h3>Hours</h3>
              <p>24/7 Emergency Services</p>
              <p>Mon-Fri: 8:00 AM - 8:00 PM</p>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <form>
            <div class="form-row">
              <input type="text" placeholder="Your Name">
              <input type="email" placeholder="Your Email">
            </div>
            <input type="text" placeholder="Subject">
            <textarea rows="5" placeholder="Your Message"></textarea>
            <button type="submit" id="send-message">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3><i class="fas fa-hospital-alt"></i> MediCarePlus</h3>
          <p>Providing exceptional healthcare with compassion and innovation.</p>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="footer-section">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#patients">Patients</a></li>
            <li><a href="#doctors">Doctors</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Services</h4>
          <ul>
            <li><a href="#">Emergency Care</a></li>
            <li><a href="#">Outpatient Services</a></li>
            <li><a href="#">Pharmacy</a></li>
            <li><a href="#">Lab Services</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Newsletter</h4>
          <p>Subscribe for health tips and updates</p>
          <div class="newsletter-form">
            <input type="email" placeholder="Your Email">
            <button><i class="fas fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2026 MediCarePlus. All rights reserved.</p>
        <div class="footer-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
          <a href="#">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <button class="back-to-top">
    <i class="fas fa-arrow-up"></i>
  </button>
       <?php
                        $total=mysqli_num_rows($result);
                        echo "<script>document.getElementById('total-patients').innerHTML='$total';</script>";
                        ?>
 <script src="js.js"></script>


</body>
</html>