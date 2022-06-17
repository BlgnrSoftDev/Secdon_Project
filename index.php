<?php

include('./util/header.php');

?>
<!-- BANNER SECTION -->
<section id="banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <p class="banner-main-title">Maksimum güvenlik, Kullanıcın kararına göre tam gizlilik ve herkesin kullanabileceği kadar kolaylık sağlayan online bağış sitesi.</p>
                </p>
            </div>
            <div class="col-lg-6">
                <img src="./images/bird.png" alt="A bir picture" class="bird-pic">
            </div>
        </div>
    </div>
</section>

<section id="banner-addition">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <img class="justice-lady-pic" src="./images/lady_justice.png" alt="A lady.">
            </div>
            <div class="col-lg-6">
                <p class="banner-main-title" style="color: #1B2430;">
                    Online platformumuz devletin ilgili kurumları tarafından denetlenmiş ve yasal olarak kullanılması önerilmiştir.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- BANNER SECTION -END -->


<!-- USER COMMENT CAROUSELS -->
<section id="comment-carousel">

    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">

            <!-- CAROUSEL ITEMS -START -->

            <div class="carousel-item active carousel-container">
                <img src="./images/lady-img.jpg" alt="a lady photos" class="carousel-photo">
                <em style="color: #FFFFFFDF; display: block;">Jenny Nolan</em>
                <p class="carousel-text">İlk gördüğümde açıkçası şühelenmiştim ancak sonra araştırdıktan sonra devlet kurumu kadar güvenilir olduğunu öğrendim. İşimi oldukça kolaylaştırdı, Bu uygulamayı Herkese tavsiye ediyorum</p>
            </div>


            <div class="carousel-item carousel-container">
                <img src="./images/lady_2.jpg" alt="a lady photos" class="carousel-photo">
                <em style="color: #FFFFFFDF; display: block;">Natalia Parker</em>
                <p class="carousel-text">Arkadaşım aracılığı ile duymuştum, ilk duyduğumda ise dolandırılıdığını düşündüğüm için arkadaşımla çok dalga geçtim lakin sonradan araştırdıktan sonra artık bu siteden vazgeçemiyorum!!!</p>
            </div>

            <!-- CAROUSEL ITEMS -END  -->
        </div>
    </div>
</section>



<?php
include('./util/footer.php');
?>