<?php include "includes/admin_header.php"?>
<body>

    <div id="wrapper">

    <!--database connection to admin-->
    <?php
    if($connection) echo "connected;" ?>

        <!-- Navigation -->


        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin

                              <small><?php var_dump ($_SESSION);
                               echo $_SESSION['username']; ?></small>
                              
                           
                            
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>
</body>