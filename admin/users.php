<?php include "includes/admin_header.php"; ?>

 <div id="wrapper">

        <!-- Navigation -->
        
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">
             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>

                        <?php
echo "befor if--";
                        if(isset($_GET['source'])){
                            echo "within if";
                        $source = $_GET['source'];
                         var_dump ("$source");

                        }   else{

                          //  echo "within else";

                            $source =  '';

                          //  var_dump ($_GET);
                        }

                         switch($source){
                             case 'add_user';
                             include "includes/add_user.php";
                             break;

                             case 'edit_user';
                             include "includes/edit_user.php";
                              break;

                             default:
                             include "includes/view_all_users.php";
                            break;
                         }
                         ?>                                        
                    </div>    <!--form-->
                </div>            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>
 