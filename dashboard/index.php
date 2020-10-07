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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
    <div class="col-10 bg-light">
        <div class="mt-5 ml-5">
            <div class="row">
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
                                                href="../dashboard/process.php?delete=true&id=<?php echo $row['no']?>&table=room"
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
                                <option value="single">Single</option>
                                <option value="family">Family</option>
                            </select>
                        </div>
                        <label class="mt-1">Room status</label>
                        <div class="form-select">
                            <select name="status" class="form-control select">
                                <option value="vacant">Vacant</option>
                                <option value="occupied">Occupied</option>
                            </select>
                        </div>
                        <label class="mt-1">Location</label>
                        <div class="form-select">
                            <select name="location" class="form-control select">
                                <option value="1st_floor">First floor</option>
                                <option value="2nd_floor">Second floor</option>
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
            </div>
        </div>
    </div>
</div>
<?php
    $con = null;
    require '../includes/footer.php';
?>
