<?php session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../index.php');
        exit();
    }
    require '../includes/header.php'; 
    $conn = new PDO("mysql:host=127.0.0.1;dbname=hotel_de_asiana", $_SESSION['user'], $_SESSION['password']);
?>
<?php 
    if (isset($_GET['error'])) {
        $e = $_GET['error'];
?>
<div class="alert alert-danger alert-dismissible fade show sticky-top" role="alert">
  <strong>Error! </strong> <?php echo $e?>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
    }
?>
<div class="row vh-100 w-100">
    <div class="col-2">
        <div class="sticky-top">
            <h4 class="font-sanista text-warning pt-5 p-2 text-center">
                Hotel De Asiana
            </h4>
            <h6 class="text-muted text-center text-capitalize">
                <?php echo $_SESSION['user'] ?> dashboard
            </h6>
            <hr class="mx-5">
            <div class="ml-5">
                <div class="my-1 text-muted-light">
                    <i class="fas fa-cog"></i> &nbsp; Help
                </div>
                <div class="my-1">
                    <a href="../includes/logout.php" 
                        class="text-decoration-none text-muted-light"
                    >
                        <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10 bg-light">
        <div class="my-5 ml-5">
            <div class="row justify-content-center">
                <!-- Print table room -->
                <div class="col-6 bg-white p-4 rounded-xl mr-5">
                    <h4>Rooms</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Room No</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Location</th>
                                <th scope="col">Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM room');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['no'] ?></th>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td><?php echo $row['location'] ?></td>
                                        <td><?php echo $row['rate'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-room=<?php echo $row['no']?>"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard/process.php?delete=true&id=<?php echo $row['no']?>&table=room&field=no"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access room data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- Add/edit table room -->
                <div class="col-4 bg-white p-4 rounded-xl mr-5">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-room'])) {
                                $id = $_GET['edit-room'];
                                $result = $conn->query('SELECT * FROM room WHERE no='.$id);
                                $room = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new room";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                        <?php 
                            if (isset($_GET['edit-room'])) {
                        ?>
                            <label>Room no</label>
                            <input value="<?php echo $_GET['edit-room']?>" type="input" name="id" class="form-control rounded-xl form-input" readonly/>
                        <?php
                            }
                        ?>
                        <label class="mt-1">Room type</label>
                        <div class="form-select">
                            <select name="type" class="form-control select"
                                value="
                                <?php 
                                    if (isset($_GET['edit-room'])) {
                                        echo $room['type'];   
                                    }
                                ?>
                                "
                            >
                                <option value="Single">Single</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>
                        <label class="mt-1">Room status</label>
                        <div class="form-select">
                            <select name="status" class="form-control select">
                                <option value="Vacant">Vacant</option>
                                <option value="Occupied">Occupied</option>
                            </select>
                        </div>
                        <label class="mt-1">Location</label>
                        <div class="form-select">
                            <select name="location" class="form-control select">
                                <option value="Ground Floor">Ground Floor</option>
                                <option value="First Floor">First Floor</option>
                                <option value="Second Floor">Second Floor</option>
                                <option value="Third Floor">Third Floor</option>
                            </select>
                        </div>
                        <label class="mt-1">Rate</label>
                        <input
                            <?php
                                if (isset($_GET['edit-room'])) {
                            ?>
                                value="<?php echo $room['rate']?>"
                            <?php
                                }
                            ?>
                            type="input" name="rate" class="form-control rounded-xl form-input" 
                        />
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-room'])) {
                                    echo 'name="edit-room"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-room"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Add/edit table food -->
                <div class="col-4 bg-white p-4 rounded-xl mt-5 mr-5">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-food'])) {
                                $id = $_GET['edit-food'];
                                $result = $conn->query('SELECT * FROM food WHERE id='.$id);
                                $food = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new dish";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                        <?php 
                            if (isset($_GET['edit-food'])) {
                        ?>
                            <label>Food id</label>
                            <input value="<?php echo $_GET['edit-food']?>" type="input" name="id" class="form-control rounded-xl form-input" readonly/>
                        <?php
                            }
                        ?>
                        <label class="mt-1">Food</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food'])) {
                            ?>
                                value="<?php echo $food['name']?>"
                            <?php
                                }
                            ?>
                            type="input" name="name" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Food type</label>
                        <div class="form-select">
                            <select name="type" class="form-control select"
                                value="
                                <?php 
                                    if (isset($_GET['edit-food'])) {
                                        echo $food['type'];   
                                    }
                                ?>
                                "
                            >
                                <option value="Vegitarian">Vegitarian</option>
                                <option value="American">American</option>
                                <option value="Fast food">Fast food</option>
                            </select>
                        </div>
                        <label class="mt-1">Price</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food'])) {
                            ?>
                                value="<?php echo $food['amount']?>"
                            <?php
                                }
                            ?>
                            type="input" name="amount" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Portion</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food'])) {
                            ?>
                                value="<?php echo $food['portion']?>"
                            <?php
                                }
                            ?>
                            type="input" name="portion" class="form-control rounded-xl form-input" 
                        />
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-food'])) {
                                    echo 'name="edit-food"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-food"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Print table food -->
                <div class="col-6 bg-white p-4 rounded-xl mt-5 mr-5">
                    <h4>Food</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Food id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Portion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM food');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['amount'] ?></td>
                                        <td><?php echo $row['portion'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-food=<?php echo $row['id']?>"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard/process.php?delete=true&id=<?php echo $row['id']?>&table=food&field=id"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access food data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- Show view facility_view -->
                <div class="col-6 bg-white p-4 rounded-xl mt-5 mr-5">
                    <h4>Facilities</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Facility id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Rate</th>
                                <th scope="col">location</th>
                                <th scope="col">manager</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM facility_view');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['rate'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['manager_name'] ?></td>
                                </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access facility_view data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $con = null;
    require '../includes/footer.php';
?>
