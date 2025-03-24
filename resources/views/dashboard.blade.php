<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      display: flex;
      height: 100vh;
      overflow: hidden;
      background-color: #f8f9fa;
      margin: 0;
    }
    /* Sidebar */
    .sidebar {
      width: 250px;
      height: 100vh;
      background: #222;
      color: white;
      position: fixed;
      top: 0;
      left: -250px;
      transition: left 0.4s ease-in-out;
      padding-top: 60px;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
    }
    .sidebar.active {
      left: 0;
    }
    .sidebar ul {
      padding: 0;
      list-style: none;
    }
    .sidebar ul li {
      padding: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
    }
    .sidebar ul li i {
      font-size: 20px;
    }
    .sidebar ul li:hover {
      background: #444;
    }
    /* Hamburger Button */
    .hamburger {
      position: absolute;
      top: 15px;
      left: 15px;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      z-index: 1000;
      transition: color 0.3s ease-in-out;
      color: black;
    }
    .hamburger.active {
      color: white;
    }
    /* Main Content */
    .main-content {
      flex-grow: 1;
      transition: margin-left 0.4s ease-in-out;
      width: 100%;
      padding: 20px;
      overflow-y: auto;
    }
    .main-content.shift {
      margin-left: 250px;
    }
    /* Dashboard Header */
    .dashboard-header {
      text-align: center;
      margin-bottom: 30px;
    }
    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        width: 200px;
        left: -200px;
      }
      .main-content.shift {
        margin-left: 200px;
      }
    }
    @media (max-width: 480px) {
      .main-content.shift {
        margin-left: 0;
      }
      .sidebar {
        width: 100%;
        left: -100%;
      }
      .sidebar.active {
        left: 0;
      }
    }
  </style>
</head>
<body>
  <!-- Hamburger Button -->
  <button class="hamburger" id="menuToggle"><i class="bi bi-list"></i></button>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul>
      <li id="editProfile"><i class="bi bi-person-circle"></i> Profile</li>
      <li><i class="bi bi-gear"></i> Settings</li>
      <li id="logout"><i class="bi bi-box-arrow-right"></i> Logout</li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content" id="mainContent">
    <div class="dashboard-header">
      <h1>Welcome to the Dashboard</h1>
      <p>Enhanced sidebar experience!</p>
    </div>
    <div class="container">
      <div class="row g-3">
        <!-- Sample images -->
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image1.jpg" class="img-fluid rounded" alt="Image 1" />
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image2.jpg" class="img-fluid rounded" alt="Image 2" />
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image3.jpg" class="img-fluid rounded" alt="Image 3" />
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image4.jpg" class="img-fluid rounded" alt="Image 4" />
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image5.jpg" class="img-fluid rounded" alt="Image 5" />
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image6.jpg" class="img-fluid rounded" alt="Image 6" />
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Modal with CRUD functionalities -->
  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="profileForm">
            <div class="mb-3">
              <label for="userName" class="form-label">Name</label>
              <input type="text" class="form-control" id="userName" placeholder="Enter your name" />
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="userEmail" placeholder="Enter your email" />
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <button type="button" id="deleteProfile" class="btn btn-danger">Delete Profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle sidebar and change hamburger color
      $('#menuToggle').click(function() {
        $('#sidebar').toggleClass('active');
        $('#mainContent').toggleClass('shift');
        $(this).toggleClass('active');
      });

      // Logout function
      $('#logout').click(function() {
        var ref = document.referrer;
        if (ref && ref !== window.location.href) {
          window.location.href = ref;
        } else {
          window.location.href = 'index.html';
        }
      });

      // Open profile modal and load existing data
      $('#editProfile').click(function() {
        $('#profileModal').modal('show');
        $('#userName').val(localStorage.getItem('userName') || '');
        $('#userEmail').val(localStorage.getItem('userEmail') || '');
      });

      // Save profile changes (Update/Create)
      $('#profileForm').submit(function(e) {
        e.preventDefault();
        var name = $('#userName').val().trim();
        var email = $('#userEmail').val().trim();
        if(name === '' || email === '') {
          alert('Both name and email are required.');
          return;
        }
        localStorage.setItem('userName', name);
        localStorage.setItem('userEmail', email);
        alert('Profile updated successfully!');
        $('#profileModal').modal('hide');
      });

      // Delete profile (Delete)
      $('#deleteProfile').click(function() {
        if(confirm('Are you sure you want to delete your profile? This action cannot be undone.')) {
          localStorage.removeItem('userName');
          localStorage.removeItem('userEmail');
          // Clear the form fields
          $('#userName').val('');
          $('#userEmail').val('');
          alert('Profile deleted successfully!');
          $('#profileModal').modal('hide');
        }
      });
    });
  </script>
</body>
</html>
