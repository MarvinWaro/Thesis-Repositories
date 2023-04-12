<?php
//resume session here to fetch session values
session_start();
/*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
        if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], ['Admin', 'Cashier', 'Reservation Specialist'])){
            header('location: ../login/login.php');
        }

require_once '../tools/variables.php';
$page_title = 'Azzura | Hotel Rooms';
$hotelrooms = 'active';

require_once '../includes/header.php';
?>
</head>
<body>
    <?php require_once '../includes/sidebar.php'; ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Hotel Rooms</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-line"><span class="position-absolute top-30 start-20 translate-middle p-2 bg-danger border border-light rounded-circle"></i>
                    </div>
                <?php require_once '../includes/topnav.php'; ?>
            </nav>
        </div>
            <!-- end: Navbar -->

                <?php require_once 'addhotelrooms.php'; ?>

                <!-- View Hotel Rooms Modal -->
                <div class="modal fade" id="hotelroomsVIEWModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hotel Room Information</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="hotelrooms_viewing_data">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Hotel Rooms Modal -->


                <?php require_once 'edithotelrooms.php'; ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <form id="dynamic-form" action="add_hotelroom_type.php" method="post" class="border p-3 mb-3" style="height: 19rem;">
                    <br>
                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="addOption" id="addRoomType" value="addRoomType" checked>
                            <label class="form-check-label" for="addRoomType">
                                <h6>Add Room Type</h6>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="addOption" id="addInclusion" value="addInclusion">
                            <label class="form-check-label" for="addInclusion">
                                <h6>Add Inclusion</h6>
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label for="room_type" id="input-label">Room Type</label>
                        <input type="text" name="room_type" id="room_type" class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" name="add_room_type" class="btn btn-primary" style="float: right; background-color: #0B6623;">Add Room Type</button>
                </form>
            </div>
            <div class="col-md-4">
                <h5>ROOM TYPE TABLE</h5>
                <div class="border p-3" style="font-size: 0.7rem;">
                    <table class="table" id="hotelroom_types_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once '../../classes/acc_type.class.php';

                            $acct = new Acc_type();
                            //We will now fetch all the records in the array using loop
                            //use as a counter, not required but suggested for the table
                            $i = 1;
                            //loop for each record found in the array
                            foreach ($acct->hotel_acc_type_show() as $row){ //start of loop
                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['acc_type_name']; ?></td>
                                        <td style="white-space: nowrap;">
                                                <a href="#"><i class="fas fa-edit edit_btn"style="color: #3F704D; font-size: 1.0rem;"></i></a>
                                                <a href=""><i class="fa-solid fa-trash-can delete_btn" style="color: #C21807; font-size: 1.0rem;"></i></a>
                                        </td>
                                    </tr>
                        <?php
                        $i++;
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <h5>ROOM INCLUSION</h5>
                <div class="border p-3" style="font-size: 0.7rem;">
                    <table class="table" id="room_inclusion_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Inclusion</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once '../../classes/inclusion.class.php';

                            $inc = new Inclusion();
                            //We will now fetch all the records in the array using loop
                            //use as a counter, not required but suggested for the table
                            $i = 1;
                            //loop for each record found in the array
                            foreach ($inc->hotel_inc_show() as $row){ //start of loop
                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['acc_inc_name']; ?></td>
                                        <td style="white-space: nowrap;">
                                                <a href="#"><i class="fas fa-edit edit_btn"style="color: #3F704D; font-size: 1.0rem;"></i></a>
                                                <a href=""><i class="fa-solid fa-trash-can delete_btn" style="color: #C21807; font-size: 1.0rem;"></i></a>
                                        </td>
                                    </tr>
                        <?php
                        $i++;
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

                <div>
                    <br>
                </div>
                <div>
                    <br>
                </div>
            <div class="col-md-12">
                <div class="card">
                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Success!</strong><?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-header">
                        <h3 style="position: absolute;"> Manage Hotel Rooms </h3>
                        <!-- Button trigger modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float: right; background-color: #0B6623;" data-bs-toggle="modal" data-bs-target="#hotelroomModal">
                            Add New Room
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table"  id="hotelrooms_table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col" style="white-space: pre-wrap; max-width: 200px;">Room Description </th>
                                    <th scope="col">Room Capacity</th>
                                    <th scope="col">Room Free Entrance</th>
                                    <th scope="col" style="white-space: pre-wrap; max-width: 200px;">Room Inclusion</th>
                                    <th scope="col">Room Price</th>
                                    <th scope="col">Room Status</th>
                                    <th scope="col" style="white-space: nowrap;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once '../../classes/accommodation.class.php';

                                $hotel = new Accommodation();
                                //We will now fetch all the records in the array using loop
                                //use as a counter, not required but suggested for the table
                                $i = 1;
                                //loop for each record found in the array
                                foreach ($hotel->hotel_show() as $row){ //start of loop
                                ?>
                                        <tr>
                                            <input type="hidden" class="htlroom_id" value="<?php echo $row['id']; ?>">
                                            <td><?php echo $i; ?></td>
                                            <td><img height="100rem" width="100rem" src="../image/photos/<?php echo $row['image']?>"></td>
                                            <td><?php echo $row['acc_name']; ?></td>
                                            <td style="white-space: pre-wrap; max-width: 200px;"><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['capacity']; ?></td>
                                            <td><?php echo $row['free_entrance']; ?></td>
                                            <td style="white-space: pre-wrap; max-width: 200px;"><?php echo $row['inclusion']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td style="white-space: nowrap;">
                                                <a href="#"><i class="fa-solid fa-eye view_btn" style="color: #00308F; font-size: 1.3rem;"></i></a>
                                                <a href="#" class="edith_btn" data-id="<?php echo $row['id']; ?>"><i class="fas fa-edit"style="color: #3F704D; font-size: 1.3rem;"></i></a>
                                                <a href="#" class="delete-linkz" data-id="<?php echo $row['id']; ?>"><i class="fa-solid fa-trash-can deleteh_btn" style="color: #C21807; font-size: 1.3rem;"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                $i++;
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



    <?php require_once '../includes/accommodation_footer.php'; ?>
    <?php require_once '../includes/footer.php'; ?>
    <!--  script content -->
    <script>
        
        $(document).ready(function() {

            $('#hotelrooms_table').DataTable();

// When the delete link is clicked
$('.delete-linkz').click(function(e) {
  e.preventDefault();
  
  // Get the ID of the item to delete
  var id = $(this).data('id');
  
  // Show a SweetAlert2 confirmation dialog

  Swal.fire({
  title: 'Are you sure?',
  text: "Deleted file will be save in the archived folder.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      // User clicked the "Yes, delete it!" button
      // Send the ID to the server for deletion 
      $.ajax({
        url: 'hotelrooms_CRUD/delhotel.php',
        method: 'POST',
        data: { 'hotel_id': id },
        success: function(response) {
          // Handle success
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ).then(function() {
            // Reload the page after the SweetAlert2 is closed
            location.reload();
        });
    },

      });
    }
  });
});



function createEditPreviewImage(file, previewContainer) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        const previewImage = $('<div class="preview-image"></div>');
        previewImage.append(`
            <img src="${reader.result}">
            <div class="remove-image remove_img">X</div>
        `);
        previewContainer.append(previewImage);
    };
}


$(document).on('click', '.remove_img', function(e) {
    e.preventDefault();
    
    // Get the index of the item to delete
    var index = $(this).data('index');
  
    // Remove image
    images.splice(index, 1);
    $('#edit_preview').find('.preview-image').eq(index).remove();
  
    // Delete image from database
    var id = $(this).data('id');
    var file = $(this).siblings('img').attr('src').split('/').pop(); // Get the file name
    var imageName = $(this).siblings('img').data('name');
    $.ajax({
        type: 'POST',
        url: 'hotelrooms_CRUD/deledit_img.php',
        data: {
            'file': file, // Use the file name instead of image
            'hotelrooms_id': id,
            'image_name': imageName, // Add image name to the data
        },
        success: function(response) {
            console.log(response);
        }
    });
});




var images = [];

$('.edith_btn').click(function(e) {
  // Get the ID of the item to edit
  var id = $(this).data('id');
    // Edit Hotelrooms
    $.ajax({
        type: "POST",
        url: "hotelrooms_CRUD/edithotel.php",
        data: {
            'checking_edit_btn': true,
            'hotelrooms_id': id,
        },
        success: function(response) {
            $.each(response, function(key, value) {
                $('#edit_hotelroom_id').val(value['id']);
                $('#edit_description').val(value['description']);
                $('#edit_capacity').val(value['capacity']);
                $('#edit_free_entrance').val(value['free_entrance']);
                $('#edit_price').val(value['price']);
                $('#edit_statusavail').prop('checked', value['status'] === 'Available');
                $('#edit_statusunavail').prop('checked', value['status'] === 'Unavailable');
                $('#edit_vill_type').val(value['acc_name']);

                // Set up preview for existing images
                images = value['images'].split(',');
                const editPreview = $('#edit_preview');
                editPreview.html('');

                images.forEach((image) => {
                    const previewImage = $('<div class="preview-image"></div>');
                    previewImage.append(`
                        <img src="../image/photos/${image}">
                        <div class="remove-image remove_img" data-name="${image}">X</div>`);
                    editPreview.append(previewImage);
                });

                // Set selected value for vill type select input
                // Add event listener to the file input field
                $('#edit_image').on('change', function() {
                    const files = this.files;
                    editPreview.html('');

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        createEditPreviewImage(file, editPreview);
                    }
                });

                // Set up inclusion checkboxes
                const inclusions = value['inclusion'].split(',');
                $('input[type="checkbox"][name="edit_inclusions[]"]').each(function() {
                    const inclusionName = $(this).val();
                    $(this).prop('checked', inclusions.indexOf(inclusionName) !== -1);
                });
            });

            $('#editHotelroomModal').modal('show');
        }
    });
});










            $('.view_btn').click(function(e) {
                e.preventDefault();

                var htlroom_id = $(this).closest('tr').find('.htlroom_id').text();
                // console.log(htlroom_id);

                $.ajax({
                    type: "POST",
                    url: "code.php ",
                    data: {
                        'checking_viewbtn': true,
                        'hotelrooms_id': htlroom_id,
                    },
                    success: function(response) {
                        // console.log(response);
                        $('.hotelrooms_viewing_data').html(response);
                        $('#hotelroomsVIEWModal').modal('show');

                    }
                });
            });

            
        });
        
        $(document).ready(function() {
        $('#hotelroom_types_table').DataTable({
        "lengthMenu": [ [3, 10, 20, -1], [3, 10, 20, "All"] ]
        });
        });

        $(document).ready(function() {
        $('#room_inclusion_table').DataTable({
        "lengthMenu": [ [4, 10, 20, -1], [4, 10, 20, "All"] ]
        });
        });

        
    </script>
<script>
		const input = document.getElementById('image-input');
		const preview = document.getElementById('preview');

		input.addEventListener('change', () => {
			preview.innerHTML = '';
			const files = input.files;
			for (let i = 0; i < files.length; i++) {
				const file = files[i];
				createPreviewImage(file);
			}
		});

		function createPreviewImage(file) {
			const reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = () => {
				const previewImage = document.createElement('div');
				previewImage.classList.add('preview-image');
				previewImage.innerHTML = `
					<img src="${reader.result}">
					<div class="remove-image" onclick="removeImage(this.parentNode)">X</div>
				`;
				preview.appendChild(previewImage);
			};
		}

    function removeImage(previewImage) {
  const input = document.getElementById('image-input');
  const files = Array.from(input.files);
  const index = Array.from(preview.children).indexOf(previewImage);
  if (index !== -1) {
    files.splice(index, 1);
    const newFileList = new DataTransfer();
    files.forEach(file => newFileList.items.add(file));
    input.files = newFileList.files;
  }
  previewImage.remove();
}
	</script>

<script>
const addOptionRadios = document.querySelectorAll('input[name="addOption"]');
const form = document.querySelector('#dynamic-form');
const inputLabel = document.querySelector('#input-label');
const submitButton = form.querySelector('button[type="submit"]');

addOptionRadios.forEach(radio => {
  radio.addEventListener('change', () => {
    if (radio.value === 'addInclusion') {
      form.action = 'add_hotel_inc.php';
      inputLabel.textContent = 'Inclusion';
      submitButton.textContent = 'Add Inclusion';
    } else {
      form.action = 'add_hotelroom_type.php';
      inputLabel.textContent = 'Room Type';
      submitButton.textContent = 'Add Room Type';
    }
  });
});

</script>

</body>

</html>