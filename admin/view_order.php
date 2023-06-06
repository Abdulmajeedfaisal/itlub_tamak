<!DOCTYPE html>
<html lang="ar">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>عرض الطلبات</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>
</head>

<body class="fix-header fix-sidebar">


    <div id="main-wrapper">
        <?php include '../components/head_admin.php'; ?>


        <?php include '../components/left_slider_admin.php'; ?>

        <div class="page-wrapper">


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">عرض الطلب</h4>
                                </div>

                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">

                                        <tbody>
                                            <?php
                                            $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='" . $_GET['user_upd'] . "'";
                                            $query = mysqli_query($db, $sql);
                                            $rows = mysqli_fetch_array($query);



                                            ?>


                                            <tr>
                                                <td><strong>اسم المستخدم:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['username']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']); ?>');" title="Update order">
                                                            <button type="button" class="btn btn-primary">تحديث حالة الطلب</button></a>
                                                    </center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>اسم الطلب:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['title']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']); ?>');" title="Update order">
                                                            <button type="button" class="btn btn-primary">عرض تفاصيل المستخدم</button></a>

                                                    </center>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td><strong>الكمية:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['quantity']; ?></center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>السعر:</strong></td>
                                                <td>
                                                    <center>$<?php echo $rows['price']; ?></center>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td><strong>العنوان:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['address']; ?></center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>التاريخ:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['date']; ?></center>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td><strong>الحالة:</strong></td>
                                                <?php
                                                $status = $rows['status'];
                                                if ($status == "" or $status == "NULL") {
                                                ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> مرسل</button></center>
                                                    </td>
                                                <?php
                                                }
                                                if ($status == "in process") { ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>قيد المعالجة</button></center>
                                                    </td>
                                                <?php
                                                }
                                                if ($status == "closed") {
                                                ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span> تم التسليم</button></center>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($status == "rejected") {
                                                ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> ملغي</button> </center>
                                                    </td>
                                                <?php
                                                }
                                                ?>


                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

    <footer class="footer"> © 2023 - نظام طلب الطعام عبر الإنترنت </footer>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>