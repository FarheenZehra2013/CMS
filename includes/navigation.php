 <!-- Navigation -->
 <body>
 <html>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

            <?php
            //lets make query

            $query = "SELECT * FROM catogories";

            $select_all_catogories_query = mysqli_query($connection,$query);
            while($row= mysqli_fetch_assoc($select_all_catogories_query))
            {
                $cat_title= $row['cat_title'];

                echo "<li><a href='#'>$cat_title</a></li>";
            }
//e are displaying dynamic data from our database
                    ?>
                    
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                  <!--  <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    </body>
    </html>