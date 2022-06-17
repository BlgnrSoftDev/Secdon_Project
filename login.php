<?php
include('./util/header.php');

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('Location: ./index.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query = "SELECT `user_id` FROM `User` WHERE `user_nickname` = '${username}' AND `user_password` = '${password}'";
    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        $total = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (isset($total['user_id'])) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: ./index.php');
        } else {
            echo '<h2 style="color:red; font-family: Montserrat; font-weight: bold; margin: 1rem 0 -5rem;">Kullanıcı adı veya şifre hatalı!!</h2>';
        }
    }
}


?>


<!-- LOGIN SECTION  -->
<section id="login">

    <form action="./login.php" method="POST" class="row">


        <!-- login banner  -->
        <div class="login-banner col-md-6">
            <h2 class="login-heading">Giriş Sayfası</h2>
            <p class="login-desc">Eğer hesabınız yok ise aşağıdaki link'e tıklayarak kayıt olabilirsiniz.</p>
            <button class="btn btn-light"><a href="./register.php" style="text-decoration: none; color:black;">Kayıt Ol</a></button>
        </div>


        <!-- login input elements -->
        <div class="col-md-6 form-controls">
            <div class="row login-input-item">
                <div class="col-md-6">
                    <label for="username_input" class="form-label">Kullanıcı Adı : </label>
                    <input type="text" name="username" id="username_input" class="form-control" required>
                </div>
            </div>

            <div class="row login-input-item">
                <div class="col-md-6">
                    <label for="password_input" class="form-label">Şifre : </label>
                    <input type="password" name="password" id="password_input" class="form-control" required>
                </div>
            </div>

            <input type="submit" value="Giriş Yap" class="btn btn-dark login-btn">
        </div>

    </form>


</section>












<?php
include('./util/footer.php');
?>