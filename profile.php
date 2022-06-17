<?php
include('./util/header.php');


if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) 
{
    header('Location: ./index.php');
}
else
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    
    $result = mysqli_query($conn, "SELECT `user_id` FROM `User` WHERE `user_nickname` = '${username}' AND `user_password` = '${password}'");

    if($result)
    {
        $infos = mysqli_fetch_array($result, MYSQLI_ASSOC);
        @$user_id = $infos['user_id'];
    }
}


$update_field = false;
if(isset($_POST['updateRequest']))
{
    $update_field = true;
    unset($_POST['updateRequest']);
}
elseif(isset($_POST['profile-upd-request']))
{
    unset($_POST['profile-upd-request']);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $security_num = filter_input(INPUT_POST, 'security_num', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_NUMBER_INT);

    $columns = ['`user_password`', '`user_security_num`', '`user_first_name`', '`user_last_name`', '`user_age`', '`user_sex`'];
    $data = [$password, $security_num, $firstname, $lastname, $age, $sex];

    for ($i=0; $i < 6; $i++) 
    {
        if($data[$i] ==  '-1')
        {
            continue;
        }

        if($i > 3)
        {
            $sql_query = <<<"HEREDOC"
            UPDATE `User` SET ${columns[$i]} = ${data[$i]} WHERE `user_id` = ${user_id}; 
            HEREDOC;            
        }
        else
        {
            $sql_query = <<<"HEREDOC"
            UPDATE `User` SET ${columns[$i]} = '${data[$i]}' WHERE `user_id` = ${user_id}; 
            HEREDOC;
        }

        $result = mysqli_query($conn, $sql_query);
    }

    if($password != '-1')
    {
        $_SESSION['password'] = $password;
    }

    header('Location: ./profile.php');
}
else 
{
    $sql_query = <<<"HEREDOC"
    SELECT `user_nickname`, `user_password`, `user_security_num`,`user_first_name`, `user_last_name`, `user_age`, `user_sex` FROM `User` WHERE `user_id` = ${user_id};
    HEREDOC;

    $result = mysqli_query($conn, $sql_query);
    if( $result )
    {
        $user_properties = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}

?>


<!-- WHEN UPDATE PROCESS CHOICED  -->
<?php if($update_field) { ?>

<h1 class="profile-page-title">-- GUNCELLEME SAYFASI --</h1>
<p class="profile-page-info">Güncellemek istemediğiniz kısımlara '-1' (eksi bir) sayısı ile belirtmeniz gerekmektedir</p>
<section id="update-profile-section">
    <form action="./profile.php" method="POST" class="row">


        <!-- profile input elements -->
            <div class="row profile-input-item">
                <div class="col-md-12">
                    <label for="tc_input" class="form-label">TC kimlik no : </label>
                    <input type="text" name="security_num" id="tc_input" class="form-control" required>
                </div>
            </div>

            <div class="row profile-input-item">
                <div class="col-md-12">
                    <label for="firstname_input" class="form-label">Ad :</label>
                    <input type="text" name="firstname" id="firstname_input" class="form-control" required>
                </div>
            </div>

            <div class="row profile-input-item">
                <div class="col-md-12">
                    <label for="lastname_input" class="form-label">Soyad : </label>
                    <input type="text" name="lastname" id="lastname_input" class="form-control" required>
                </div>
            </div>

            <div class="row profile-input-item">
                <div class="col-md-12">
                    <label for="password_input" class="form-label">Şifre : </label>
                    <input type="password" name="password" id="password_input" class="form-control" required>
                </div>
            </div>

            <div class="row profile-input-item">
                <div class="col-md-12">
                    <label for="age_input" class="form-label">Yaş : </label>
                    <input type="text" name="age" id="age_input" class="form-control" required>
                </div>
            </div>

            <div class="row profile-input-item">
                <div class="col-md-6">
                    <label for="male_input" class="form-label radio-label">Erkek: </label>
                    <input type="radio" name="sex" id="male_input" class="form-check-input" value="1" required>
                </div>
                <div class="col-md-6">
                    <label for="female_input" class="form-label radio-label">Kadın: </label>
                    <input type="radio" name="sex" id="female_input" class="form-check-input" value="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 2rem;">
                    <input type="submit" name="profile-upd-request" value="Güncelle" class="btn btn-dark profile-btn btn-lg">
                </div>
            </div>
        </div>

    </form>
</section>

<?php } ?>


<!-- WHEN USER JUST WANT TO VIEW PROFILE INFO -->
<?php if(!$update_field){ ?>
<h1 class="profile-page-title">-- PROFIL SAYFASI --</h1>
<form action="./profile.php" method="POST" id="form-update-requester"></form>
<form action="./logout.php" method="POST" id="form-logout-request"></form>
<section id="profile-section">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <img src="./images/anony.png" class="profile-img" alt="profile photo">
                </div>
            </div>
            <div class="row update-button">
                <div class="col">
                <button type="submit" class="btn btn-outline-success btn-lg" name="updateRequest" value="1" form="form-update-requester">Güncelle</button>
                </div>
                <div class="col">
                <button type="submit" class="btn btn-outline-danger btn-lg" name="logoutRequest" value="2" form="form-logout-request">Çıkış</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row user-property-row">
                Ad: <?php echo $user_properties['user_first_name'] ?>
            </div>
            <div class="row user-property-row">
                Soyad: <?php echo $user_properties['user_last_name'] ?>
            </div>
            <div class="row user-property-row">
                Yaş: <?php echo $user_properties['user_age'] ?>
            </div>
            <div class="row user-property-row">
                Cinsiyet: <?php echo ( ($user_properties['user_sex']) == 1 ? 'Erkek': 'Kadın')?>
            </div>
            <div class="row user-property-row">
                Kullanıcı Adı: <?php echo $user_properties['user_nickname'] ?>
            </div>
            <div class="row user-property-row">
                Şifre: <?php echo $user_properties['user_password'] ?>
            </div>
            <div class="row user-property-row">
                Tc kimlik: <?php echo $user_properties['user_security_num'] ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>


<?php
include './util/footer.php';
?>