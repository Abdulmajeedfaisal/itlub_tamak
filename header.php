<header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt="" width="18%"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">المطاعم <span class="sr-only"></span></a> </li>
                       


                        <?php
                        if(empty($_COOKIE["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">تسجيل الدخول</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">التسجيل</a> </li>';
							}
						else
							{

									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active"> طلباتي</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">تسجيل الخروج</a> </li>';
							}

						?>

                    </ul>

                </div>
            </div>
        </nav>

    </header>