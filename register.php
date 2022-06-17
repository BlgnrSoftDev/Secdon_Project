<?php
include('./util/header.php');

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('Location: ./index.php');
}

if (isset($_POST['register_request'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $security_num = filter_input(INPUT_POST, 'security_num', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_NUMBER_INT);

    $sql_query = <<<"HEREDOC"
        INSERT INTO `User` (`user_nickname`, `user_password`, `user_security_num`,`user_first_name`, `user_last_name`, `user_age`, `user_sex`)
        VALUES ('${username}', '${password}', '${security_num}', '${firstname}', '${lastname}', ${age}, ${sex});
        HEREDOC;

    $result = mysqli_query($conn, $sql_query);
    if ($result) {
        header('Location: ./login.php');
        echo '<h2 style="color:green; font-family: Montserrat; font-weight: bold; margin: 1rem 0 -5rem;">Kayıt Başarılı..</h2>';
    }
}

?>


<!-- REGISTER SECTION  -->
<section id="register">

    <form action="./register.php" method="POST" class="row">


        <!-- register banner  -->
        <div class="register-banner col-md-6">
            <h2 class="register-heading">Kayıt Sayfası</h2>
            <p class="register-desc">Eğer halihazırda hesabınız var ise aşağıdaki link'e tıklayarak giriş yapabilirsiniz </p>
            <button class="btn btn-light"><a href="./login.php" style="text-decoration: none; color:black;">Giriş yap</a></button>
        </div>


        <!-- register input elements -->
        <div class="col-md-6 form-controls">
            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="username_input" class="form-label">Kullanıcı Adı : </label>
                    <input type="text" name="username" id="username_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="password_input" class="form-label">Şifre : </label>
                    <input type="password" name="password" id="password_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="tc_input" class="form-label">TC kimlik no : </label>
                    <input type="text" name="security_num" id="tc_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="firstname_input" class="form-label">Ad :</label>
                    <input type="text" name="firstname" id="firstname_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="lastname_input" class="form-label">Soyad : </label>
                    <input type="text" name="lastname" id="lastname_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-6">
                    <label for="age_input" class="form-label">Yaş : </label>
                    <input type="text" name="age" id="age_input" class="form-control" required>
                </div>
            </div>

            <div class="row register-input-item">
                <div class="col-md-3">
                    <label for="male_input" class="form-label radio-label">Erkek: </label>
                    <input type="radio" name="sex" id="male_input" class="form-check-input" value="1" required>
                </div>
                <div class="col-md-3">
                    <label for="female_input" class="form-label radio-label">Kadın: </label>
                    <input type="radio" name="sex" id="female_input" class="form-check-input" value="0" required>
                </div>
            </div>

            <input type="submit" name="register_request" value="Kayıt Ol" class="btn btn-dark register-btn">
        </div>

    </form>


</section>












<?php
include('./util/footer.php');
?>