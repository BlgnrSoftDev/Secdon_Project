<?php
include './util/header.php';

if (!isset($_SESSION['username'])  || !isset($_SESSION['password'])) {
    header('Location: ./index.php');
}

$result_mode = -1;

if (isset($_POST['getCompanyRequest'])) {
    $result_mode = 0;
    $queried_company = $_POST['searched_company'];

    $sql_query = <<<"HEREDOC"
    SELECT * FROM `Company` WHERE `company_name` = '${queried_company}' 
    HEREDOC;

    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        $infos = mysqli_fetch_array($result, MYSQLI_ASSOC);
        @$company_name = ($infos['company_name']) ? $infos['company_name'] : '';
        @$company_desc = ($infos['company_short_desc']) ? $infos['company_short_desc'] : '';
        @$company_pp = ($infos['company_pp']) ? $infos['company_pp'] : '';
    }
} elseif (isset($_POST['listAllRequest'])) {
    $result_mode = 1;

    $sql_query = <<<"HEREDOC"
    SELECT * FROM `Company`;
    HEREDOC;

    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>

<section id="list-company">
    <h1 class="company-list-page-header">
        -- BULUNAN SONUCLAR --
    </h1>

    <form action="./find_company.php" method="POST" id="465"></form>
    <button class="btn btn-lg btn-outline-warning all-company-select-button" form="465" name="listAllRequest" value="1">Tüm Kurumları Listele</button>

    <div class="container-fluid">
        <?php if ($result_mode === 0) { ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card only-card">
                        <div class="card-header">
                            <?php if ($company_pp) { ?>
                                <img src="<?php echo $company_pp ?>" alt="company profile photo" class="company-pp">
                            <?php } ?>
                            <h2 class="company-title"><?php echo $company_name ?></h2>
                        </div>
                        <div class="card-body">
                            <p class="company-desc"><?php echo $company_desc ?></p>
                            <?php if ($company_pp) { ?>
                            <button type="submit" class="btn btn-lg btn-success">Bağış Yap</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if ($result_mode === 1) { ?>
            <?php $counter = 0; ?>
            <?php foreach ($infos as $item) { ?>

                    <?php if ($counter++ % 3 === 0) { ?>
                    <div class="row">
                    <?php } ?>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="<?php echo $item['company_pp'] ?>" alt="company profile photo" class="company-pp">
                                <h2 class="company-title"><?php echo $item['company_name'] ?></h2>
                            </div>
                            <div class="card-body">
                                <p class="company-desc"><?php echo $item['company_short_desc'] ?></p>
                                <button type="submit" class="btn btn-lg btn-success">Bağış Yap</button>
                            </div>
                        </div>
                    </div>

                    <?php if ($counter % 3 === 0) { ?>
                    </div>
                    <?php } ?>

            <?php } ?>
        <?php } ?>

        </div>





</section>


<?php include './util/footer.php' ?>