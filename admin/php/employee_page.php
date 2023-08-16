<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>FlexSpine Clinic | Employee Page</title>
</head>
<body>



    <nav class="py-2 bg-body-tertiary border-bottom mb-5">
        <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2 active" aria-current="page">FlexSpine Clinic | Employee Page</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="../index.html" class="nav-link link-body-emphasis px-2">Log Out</a></li>
        </ul>
        </div>
    </nav>


    
    <center><h3 class="mb-5">List of Appointments for Confirmation</h3></center>

      <?php
        session_start();

        // Database connection details
        $servername = "localhost";
        $username = "lucelle";
        $password = "password_123";
        $dbname = "db_test";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
  
      // Function to fetch data from MySQL
      function fetchContactEntries($conn) {
          $query = "SELECT * FROM contact_entries where status='Pending' LIMIT 10";
          $result = mysqli_query($conn, $query);
          return $result;
      }
  
      $contact_entries = fetchContactEntries($conn);
      ?>
  <div class="container mb-5">
      <table class="table text-center">
          <tr>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">Action</th>
          </tr>
  
          <?php while ($row = mysqli_fetch_assoc($contact_entries)) { ?>
              <tr>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['sname']; ?></td>
                  <td><?php echo $row['uemail']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td><?php echo $row['appdate']; ?></td>
                  <td><?php echo $row['apptime']; ?></td>
                  <td>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['id']; ?>">
                                View Details
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    // Reuse the same $contact_entries variable to loop through the data again for modals
    mysqli_data_seek($contact_entries, 0);
    while ($row = mysqli_fetch_assoc($contact_entries)) { ?>
        <!-- Modal for each row -->
        <div class="modal fade" id="modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel<?php echo $row['id']; ?>">Contact Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>First Name:</strong> <?php echo $row['fname']; ?></p>
                        <p><strong>Last Name:</strong> <?php echo $row['sname']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['uemail']; ?></p>
                        <p><strong>Mobile:</strong> <?php echo $row['mobile']; ?></p>
                        <p><strong>Appointment Date:</strong> <?php echo $row['appdate']; ?></p>
                        <p><strong>Appointment Time:</strong> <?php echo $row['apptime']; ?></p>
                        <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
                        <p><strong>Submission Date:</strong> <?php echo $row['submission_date']; ?></p>
                        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="updateStatus(' . $row['id'] . ', \'Approved\')">Approve</button>
                        <button type="button" class="btn btn-danger" onclick="updateStatus(' . $row['id'] . ', \'Rejected\')">Reject</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Add the Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateStatus(id, status) {
            $.ajax({
                type: 'POST',
                url: 'update_status.php', // Create this file to handle the update
                data: { id: id, status: status },
                success: function(response) {
                    alert(response); // Display the response message (you can customize this part)
                },
                error: function(error) {
                    alert('Error updating status.'); // Display an error message if the update fails
                }
            });
        }
    </script>


<div class="container">
  <footer class="justify-content-between align-items-center py-3 my-4 border-top">
    <center><p class="text-body-secondary">&copy; FlexSpine Clinic</p></center>
  </footer>
</div>

</body>
</html>