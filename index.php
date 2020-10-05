<?php require 'includes/header.php'; ?>
<div class="bg-light">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center text-center">
            <div class="col-md-4">
                <div class="shadow-lg rounded-xl p-4 bg-white">
                    <h1 class="font-sanista display-4 text-warning pt-5 pb-4">Hotel De Asiana</h1>
                    <form class="pb-5" action="login-config.php" method="POST">
                        <input type="text" name="user" placeholder="User Type" class="form-control rounded-lg" /><br>
                        <input type="password" name="password" placeholder="Password" class="form-control rounded-lg"/><br>
                        <input 
                            type="submit" 
                            name="submit" 
                            value="Login" 
                            class="btn btn-warning text-white font-weight-bold rounded-xl"
                        />
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
<?php require 'includes/footer.php';?>
