<?php require 'includes/header.php'; ?>
<div class="bg-light">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center text-center">
            <div class="col-md-4">
                <div class="shadow-lg rounded-xl p-4 bg-white">
                    <h1 class="font-sanista display-4 text-warning pt-5 pb-4">
                        Hotel De Asiana
                    </h1>
                    <form class="pb-4" action="config.php" method="POST">
                        <div class="form-select">
                            <select name="user" class="form-control">
                                <option value="manager">Manager</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="chef">Chef</option>
                                <option value="cleaning">Cleaning Staff Member</option>
                                <option value="guest">Guest</option>
                            </select>
                        </div>
                        <br>
                        <input type="password" name="password" placeholder="Password" class="form-control rounded-xl" />
                        <br>
                        <?php 
                            if(isset($_GET['error']) && $_GET['error'] == 422) {
                                echo '<div class="text-danger mb-3">Invalid Credentials</div>';
                            }
                        ?>
                        <input
                            type="submit"
                            name="submit" 
                            value="Login"
                            class="btn btn-warning text-white font-weight-bold rounded-xl w-100 py-2"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'includes/footer.php';?>
