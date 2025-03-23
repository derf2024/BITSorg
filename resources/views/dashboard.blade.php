<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard with Editable Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      display: flex;
      height: 100vh;
      overflow: hidden;
      background-color: #f8f9fa;
      margin: 0;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background: #333;
      color: white;
      position: fixed;
      top: 0;
      left: -250px;
      transition: left 0.3s ease-in-out;
      padding-top: 60px;
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
      text-align: center;
      border-bottom: 1px solid #555;
      cursor: pointer;
    }
    .sidebar ul li:hover {
      background: #444;
    }
    .hamburger {
      position: absolute;
      top: 10px;
      left: 10px;
      background: none;
      border: none;
      color: black;
      font-size: 24px;
      cursor: pointer;
      z-index: 1000;
    }
    .main-content {
      flex-grow: 1;
      transition: margin-left 0.3s ease-in-out;
      width: 100%;
      margin-left: 0;
      padding: 20px;
      overflow-y: auto;
    }
    .main-content.shift {
      margin-left: 250px;
    }
    .dashboard-header {
      text-align: center;
      margin-bottom: 30px;
    }
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
  <button class="hamburger" id="menuToggle">☰</button>
  <div class="sidebar" id="sidebar">
    <ul>
      <li id="editProfile">Profile</li>
      <li>Settings</li>
      <li id="logout">Logout</li>
    </ul>
  </div>
  <div class="main-content" id="mainContent">
    <div class="dashboard-header">
      <h1>Welcome to the Dashboard</h1>
      <p>This is a simple idea.</p>
    </div>
    <div class="container">
      <div class="row g-3">
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image1.jpg" class="img-fluid rounded" alt="Image 1">
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image2.jpg" class="img-fluid rounded" alt="Image 2">
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image3.jpg" class="img-fluid rounded" alt="Image 3">
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image4.jpg" class="img-fluid rounded" alt="Image 4">
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image5.jpg" class="img-fluid rounded" alt="Image 5">
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <img src="assets/images/image6.jpg" class="img-fluid rounded" alt="Image 6">
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Modal -->
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
              <input type="text" class="form-control" id="userName">
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="userEmail">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle sidebar
      $('#menuToggle').click(function() {
        $('#sidebar').toggleClass('active');
        $('#mainContent').toggleClass('shift');
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

      // Open profile modal
      $('#editProfile').click(function() {
        $('#profileModal').modal('show');
        $('#userName').val(localStorage.getItem('userName') || '');
        $('#userEmail').val(localStorage.getItem('userEmail') || '');
      });

      // Save profile changes
      $('#profileForm').submit(function(e) {
        e.preventDefault();
        var name = $('#userName').val();
        var email = $('#userEmail').val();
        localStorage.setItem('userName', name);
        localStorage.setItem('userEmail', email);
        alert('Profile updated successfully!');
        $('#profileModal').modal('hide');
      });

      // Auto-load profile data
      $('#userName').val(localStorage.getItem('userName') || '');
      $('#userEmail').val(localStorage.getItem('userEmail') || '');
    });
  </script>
</body>
</html>
