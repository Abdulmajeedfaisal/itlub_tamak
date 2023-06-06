<!DOCTYPE html>
<html lang="ar">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if (isset($_POST['submit']))           //if upload btn is pressed
{

    if (empty($_POST['d_name']) || empty($_POST['about']) || $_POST['price'] == '' || $_POST['res_name'] == '') {
        $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>يجب ملء كل الحقول!</strong>
															</div>';
    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "Res_img/dishes/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {


                $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>يجب أن يكون حجم الصورة أقل من 1 ميجا!</strong> حاول بصورة أخرى.
															</div>';
            } else {




                $sql = "update dishes set rs_id='$_POST[res_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',img='$fnew' where d_id='$_GET[menu_upd]'";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>تم تحديث السجل!</strong>
															</div>';
            }
        }
    }
}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>تحديث قائمة الطعام</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="fix-header">

    <div class="preloader">

        <div id="main-wrapper">

            <?php include '../components/head_admin.php'; ?>

            <?php include '../components/left_slider_admin.php'; ?>



            <div class="page-wrapper">

                <div class="container-fluid">


                    <?php echo $error;
                    echo $success; ?>

                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">تعديل قائمة الطعم</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post' enctype="multipart/form-data">
                                    <div class="form-body">
                                        <?php $qml = "select * from dishes where d_id='$_GET[menu_upd]'";
                                        $rest = mysqli_query($db, $qml);
                                        $roww = mysqli_fetch_array($rest);
                                        ?>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">اسم الطبق </label>
                                                    <input type="text" name="d_name" value="<?php echo $roww['title']; ?>" class="form-control" placeholder="Morzirella">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">الوصف</label>
                                                    <input type="text" name="about" value="<?php echo $roww['slogan']; ?>" class="form-control form-control-danger" placeholder="slogan">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">سعر </label>
                                                    <input type="text" name="price" value="<?php echo $roww['price']; ?>" class="form-control" placeholder="$">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">صورة</label>
                                                    <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">اختر مطعم</label>
                                                    <select name="res_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--اختر مطعم--</option>
                                                        <?php $ssql = "select * from restaurant";
                                                        $res = mysqli_query($db, $ssql);
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            echo ' <option value="' . $row['rs_id'] . '">' . $row['title'] . '</option>';;
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-primary" value="حفظ">
                                <a href="all_menu.php" class="btn btn-inverse">إلغاء</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php include "include/footer.php" ?>

            </div>

        </div>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>