<!DOCTYPE html>


<html lang="ar">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>لوحةالمسؤول</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>


    <body class="fix-header">

        <div id="main-wrapper">
            <?php include '../components/head_admin.php'; ?>


            <?php include '../components/left_slider_admin.php'; ?>



            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">لوحة تحكم المسؤول</h4>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-home f-s-40 "></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from restaurant";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">مطاعم</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from dishes";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">أطباق</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-users f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from users";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">المسخدمون</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from users_orders";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">إجمالي الطلبات</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-th-large f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from res_category";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">فئات المطاعم</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from users_orders WHERE status = 'in process' ";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">معالجة الطلبات</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from users_orders WHERE status = 'closed' ";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">الطلبات المسلمة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php $sql = "select * from users_orders WHERE status = 'rejected' ";
                                                    $result = mysqli_query($db, $sql);
                                                    $rws = mysqli_num_rows($result);

                                                    echo $rws; ?></h2>
                                                <p class="m-b-0">الطلبات الملغاة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-usd f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php
                                                    $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"');
                                                    $row = mysqli_fetch_assoc($result);
                                                    $sum = $row['value_sum'];
                                                    echo $sum;
                                                    ?></h2>
                                                <p class="m-b-0">الأرباح الكلية</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include "include/footer.php" ?>

                <script src="js/lib/jquery/jquery.min.js"></script>
                <script src="js/lib/bootstrap/js/popper.min.js"></script>
                <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                <script src="js/jquery.slimscroll.js"></script>
                <script src="js/sidebarmenu.js"></script>
                <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                <script src="js/custom.min.js"></script>

    </body>

</html>
<?php
}
?>