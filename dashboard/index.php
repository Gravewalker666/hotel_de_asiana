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
    <div class="col-2 bg-dark-blue text-white">
        <div class="sticky-top">
            <h4 class="font-sanista text-warning pt-5 p-2 text-center">
                Hotel De Asiana
            </h4>
            <h6 class="text-center text-capitalize">
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
                            <select name="type" class="form-control select">
                                <option value="Single"
                                    <?php if (isset($_GET['edit-room']) && $room['type'] == 'Single') echo 'selected'?>>
                                    Single
                                </option>
                                <option value="Family"
                                    <?php if (isset($_GET['edit-room']) && $room['type'] == 'Family') echo 'selected'?>>
                                    Family
                                </option>
                            </select>
                        </div>
                        <label class="mt-1">Room status</label>
                        <div class="form-select">
                            <select name="status" class="form-control select">
                                <option value="Vacant" <?php if (isset($_GET['edit-room']) && $room['status'] == 'Vacant') echo 'selected'?>>Vacant</option>
                                <option value="Occupied" <?php if (isset($_GET['edit-room']) && $room['status'] == 'Occupied') echo 'selected'?>>Occupied</option>
                            </select>
                        </div>
                        <label class="mt-1">Location</label>
                        <div class="form-select">
                            <select name="location" class="form-control select">
                                <option value="Ground Floor"    <?php if (isset($_GET['edit-room']) && $room['location'] == 'Ground Floor') echo 'selected'?>>Ground Floor</option>
                                <option value="First Floor" <?php if (isset($_GET['edit-room']) && $room['location'] == 'First Floor') echo 'selected'?>>First Floor</option>
                                <option value="Second Floor"    <?php if (isset($_GET['edit-room']) && $room['location'] == 'Second Floor') echo 'selected'?>>Second Floor</option>
                                <option value="Third Floor" <?php if (isset($_GET['edit-room']) && $room['location'] == 'Third Floor') echo 'selected'?>>Third Floor</option>
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
                <div class="col-4 bg-white p-4 rounded-xl mt-5 mr-5" id="form-food">
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
                            <select name="type" class="form-control select">
                                <option value="Vegitarian" 
                                    <?php if (isset($_GET['edit-food']) && $food['type'] == 'Vegitarian') echo 'selected'?>>
                                    Vegitarian
                                </option>
                                <option value="American"
                                    <?php if (isset($_GET['edit-food']) && $food['type'] == 'American') echo 'selected'?>>
                                    American
                                </option>
                                <option value="Fast food"
                                    <?php if (isset($_GET['edit-food']) && $food['type'] == 'Fast food') echo 'selected'?>>
                                    Fast food
                                </option>
                                <option value="Sri Lankan"
                                    <?php if (isset($_GET['edit-food']) && $food['type'] == 'Sri Lankan') echo 'selected'?>>
                                    Sri Lankan
                                </option>
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
                <div class="col-6 bg-white p-4 rounded-xl mt-5 mr-5" id="table-food">
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
                                                href="../dashboard?edit-food=<?php echo $row['id']?>#form-food"
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
                <!-- Add/edit table food_order -->
                <div class="col-4 bg-white p-4 rounded-xl mt-5 mr-5" id="form-food_order">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-food_order'])) {
                                $id = $_GET['edit-food_order'];
                                $result = $conn->query('SELECT * FROM food_order WHERE id='.$id);
                                $food_order = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new order";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                    <label class="mt-1">Guest ID</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food_order'])) {
                            ?>
                                value="<?php echo $food_order['guest_id']?>"
                            <?php
                                }
                            ?>
                            type="input" name="guest_id" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Food ID</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food_order'])) {
                            ?>
                                value="<?php echo $food_order['food_id']?>"
                            <?php
                                }
                            ?>
                            type="input" name="food_id" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Date</label>
                        <input
                            <?php
                                if (isset($_GET['edit-food_order'])) {
                            ?>
                                value="<?php echo $food_order['date']?>"
                            <?php
                                }
                            ?>
                            type="input" name="date" class="form-control rounded-xl form-input" 
                        />
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-food_order'])) {
                                    echo 'name="edit-food_order"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-food_order"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Print table food_order -->
                <div class="col-6 bg-white p-4 rounded-xl mt-5 mr-5" id="table-food_order">
                    <h4>Food Order</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Guest ID</th>
                                <th scope="col">Food ID</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM food_order');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['guest_id'] ?></th>
                                        <td><?php echo $row['food_id'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-food_order=<?php echo $row['guest_id']?>#form-food_order"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard/process.php?delete=true&guest_id=<?php echo $row['guest_id']?>&food_id=<?php echo $row['food_id']?>&date=<?php echo $row['date']?>&table=food_order&field=guest_id"
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
                <div class="col-9 bg-white p-4 rounded-xl mt-5 mr-5">
                    <h4>Facilities</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Facility id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Location</th>
                                <th scope="col">Manager</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM facility_view ORDER BY id');
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
                <!-- Add/edit table company -->
                <div class="col-3 bg-white p-4 rounded-xl mt-5 mr-5" id="form-company">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-company'])) {
                                $id = $_GET['edit-company'];
                                $result = $conn->query('SELECT * FROM company WHERE id='.$id);
                                $company = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new company guest";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                        <?php 
                            if (isset($_GET['edit-company'])) {
                        ?>
                            <label>Guest id</label>
                            <input value="<?php echo $company['id']?>" type="input" name="id" class="form-control rounded-xl form-input" readonly/>
                            <label>Company id</label>
                            <input value="<?php echo $_GET['edit-company']?>" type="input" name="id" class="form-control rounded-xl form-input" readonly/>
                        <?php
                            }
                        ?>
                        <label class="mt-1">Company</label>
                        <input
                            <?php
                                if (isset($_GET['edit-company'])) {
                            ?>
                                value="<?php echo $company['name']?>"
                            <?php
                                }
                            ?>
                            type="input" name="name" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Billing Address</label>
                        <input
                            <?php
                                if (isset($_GET['edit-company'])) {
                            ?>
                                value="<?php echo $company['billing_address']?>"
                            <?php
                                }
                            ?>
                            type="input" name="billing_address" class="form-control rounded-xl form-input" 
                        />
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-company'])) {
                                    echo 'name="edit-company"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-company"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Add/edit table individual -->
                <div class="col-3 bg-white p-4 rounded-xl mt-5 mr-5" id="form-individual">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-individual'])) {
                                $id = $_GET['edit-individual'];
                                $result = $conn->query('SELECT * FROM individual WHERE guest_id='.$id);
                                $indi = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new individual guest";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                        <?php 
                            if (isset($_GET['edit-individual'])) {
                        ?>
                            <label>Guest id</label>
                            <input value="<?php echo $indi['guest_id']?>" type="input" name="guest_id" class="form-control rounded-xl form-input" readonly/>
                        <?php
                            }
                        ?>
                        <label class="mt-1">NIC</label>
                        <input
                            <?php
                                if (isset($_GET['edit-individual'])) {
                            ?>
                                value="<?php echo $indi['nic']?>"
                            <?php
                                }
                            ?>
                            type="input" name="nic" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Name</label>
                        <input
                            <?php
                                if (isset($_GET['edit-individual'])) {
                            ?>
                                value="<?php echo $indi['name']?>"
                            <?php
                                }
                            ?>
                            type="input" name="name" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Gender</label>
                        <div class="form-select">
                            <select name="gender" class="form-control select">
                                <option value="M" 
                                    <?php if (isset($_GET['edit-individual']) && $indi['gender'] == 'M') echo 'selected'?>>
                                    Male
                                </option>
                                <option value="F"
                                    <?php if (isset($_GET['edit-individual']) && $indi['gender'] == 'F') echo 'selected'?>>
                                    Female
                                </option>
                            </select>
                        </div>
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-individual'])) {
                                    echo 'name="edit-individual"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-individual"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Add/edit table family -->
                <div class="col-3 bg-white p-4 rounded-xl mt-5 mr-5" id="form-family">
                    <h4>
                        <?php 
                            if (isset($_GET['edit-family'])) {
                                $id = $_GET['edit-family'];
                                $result = $conn->query('SELECT * FROM family WHERE guest_id='.$id);
                                $fam = $result->fetch();
                                echo "Edit";
                            } else {
                                echo "Add new family guest";
                            }
                        ?>
                    </h4>
                    <form class="py-2" action="dashboard/process.php" method="POST">
                        <?php 
                            if (isset($_GET['edit-family'])) {
                        ?>
                            <label>Guest id</label>
                            <input value="<?php echo $fam['guest_id']?>" type="input" name="guest_id" class="form-control rounded-xl form-input" readonly/>
                        <?php
                            }
                        ?>
                        <label class="mt-1">Head NIC</label>
                        <input
                            <?php
                                if (isset($_GET['edit-family'])) {
                            ?>
                                value="<?php echo $fam['head_nic']?>"
                            <?php
                                }
                            ?>
                            type="input" name="nic" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Name</label>
                        <input
                            <?php
                                if (isset($_GET['edit-family'])) {
                            ?>
                                value="<?php echo $fam['head_name']?>"
                            <?php
                                }
                            ?>
                            type="input" name="name" class="form-control rounded-xl form-input" 
                        />
                        <label class="mt-1">Gender</label>
                        <div class="form-select">
                            <select name="gender" class="form-control select">
                                <option value="M" 
                                    <?php if (isset($_GET['edit-family']) && $fam['head_gender'] == 'M') echo 'selected'?>>
                                    Male
                                </option>
                                <option value="F"
                                    <?php if (isset($_GET['edit-family']) && $fam['head_gender'] == 'F') echo 'selected'?>>
                                    Female
                                </option>
                            </select>
                        </div>
                        <br>
                        <input
                            type="submit"
                            <?php 
                                if (isset($_GET['edit-family'])) {
                                    echo 'name="edit-family"';
                                    echo 'value="Save"';
                                } else {
                                    echo 'name="add-family"';
                                    echo 'value="Add"';
                                }
                            ?>
                            class="btn btn-warning text-white font-weight-bold rounded-xl py-1"
                        />
                    </form>
                </div>
                <!-- Print table guest -->
                <div class="col-5 bg-white p-4 rounded-xl mt-5 mr-5">
					<h4>Guest</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Guest ID</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM guest');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['type'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard/process.php?delete=true&id=<?php echo $row['id']?>&table=guest&field=id"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access company data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-5 bg-white p-4 rounded-xl mt-5 mr-5" id="table-company">
                    <h4>Company</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Guest ID</th>
                                <th scope="col">Company ID</th>
                                <th scope="col">Company</th>
                                <th scope="col">Billing Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM company');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['guest_id'] ?></th>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['billing_address'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-company=<?php echo $row['id']?>#form-company"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access company data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-5 bg-white p-4 rounded-xl mt-5 mr-5" id="table-individual">
                    <h4>Individual</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Guest Id</th>
                                <th scope="col">NIC</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM individual');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['guest_id'] ?></th>
                                        <td><?php echo $row['nic'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-individual=<?php echo $row['guest_id']?>#form-individual"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access company data";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-5 bg-white p-4 rounded-xl mt-5 mr-5" id="table-family">
					<h4>Family</h4>
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">Guest ID</th>
                                <th scope="col">Head NIC</th>
                                <th scope="col">Head Name</th>
                                <th scope="col">Head Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $conn->query('SELECT * FROM Family');
                            if ($result) {
                                while($row = $result->fetch()) {
                        ?>
                                    <tr>
                                        <th><?php echo $row['guest_id'] ?></th>
                                        <td><?php echo $row['head_nic'] ?></td>
                                        <td><?php echo $row['head_name'] ?></td>
                                        <td><?php echo $row['head_gender'] ?></td>
                                        <td>
                                            <a 
                                                class="text-decoration-none text-muted" 
                                                href="../dashboard?edit-family=<?php echo $row['guest_id']?>#form-family"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else {
                                echo "Bad request, access denied to access company data";
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
