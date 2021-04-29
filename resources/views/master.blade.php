<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="">

    <title>@yield('title')</title>
    
    <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

    </head>
    <body class="sb-nav-fixed bg-dark">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="user-list">Bazil Books</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->fName}} {{Auth::user()->lName}}   <i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
<!--header two and three still available for accordion nav bar-->
                             <!--  HOME NAV HEADER  -->
                            <!-- <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Home
                            </a> -->

                            <!--  Customers NAV HEADER  -->
                             <div class="sb-sidenav-menu-heading">Store Management</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Customers 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseCustomer" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="customer-list">Customer List</a>
                                    <a class="nav-link" href="customer">Add Customer</a>
                                </nav>
                            </div>

                            <!--  Invoice NAV HEADER  -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice" aria-expanded="false" aria-controls="collapseInvoice">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Invoice 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseInvoice" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link" href="invoice">Invoice</a>
                                    <a class="nav-link" href="payment-list">Payment List</a>
                                    <a class="nav-link" href="payment">Add Payment</a>
                                </nav>
                            </div>

                             <!--  Books NAV HEADER  -->                  
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBooks" aria-expanded="false" aria-controls="collapseBooks">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Books 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseBooks" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="books-list">Book List</a>
                                    <a class="nav-link" href="books">Add Books</a>
                                    
                                </nav>
                            </div>
                            <!--  Publishers NAV HEADER  -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePublishers" aria-expanded="false" aria-controls="collapsePublishers">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Publishers 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapsePublishers" aria-labelledby="headingFive" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="publisher-list">Publisher List</a>
                                    <a class="nav-link" href="publisher">Add Publisher</a>
                                    
                                </nav>
                            </div>
                            <!--  Authors NAV HEADER  -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthors " aria-expanded="false" aria-controls="collapseAuthors">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Authors 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseAuthors" aria-labelledby="headingSix" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="author-list"> Authors  List</a>
                                    <a class="nav-link" href="author">Add  Authors </a>
                                    <a class="nav-link" href="country-list"> Country  List</a>
                                    <a class="nav-link" href="country">Add  Country </a>
                                    
                                </nav>
                            </div>
                            <!--  Genres NAV HEADER  -->                    
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGenres" aria-expanded="false" aria-controls="collapseGenres">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Genres 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseGenres" aria-labelledby="headingSeven" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="genre-list">Genres List</a>
                                    <a class="nav-link" href="genre">Add Genres</a>
                                    
                                </nav>
                            </div>

                            <!--  Users NAV HEADER  -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-book-open"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
        
                                    <nav class="sb-sidenav-menu-nested nav"> 

                                       <a class="nav-link" href="user-list">User List</a>

                                       <a class="nav-link" href="login">Login</a>
                                       <a class="nav-link" href="register">Register</a>
                                    
                                   </nav>

                                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                         
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                           
                        </div>
                    </div>
                    
                    <div class="py-2 bg-dark mt-auto sb-sidenav-footer">
                        <div class="small">Logged in as:   {{Auth::user()->username}}</div>                   
                    </div>                
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    @yield('content')
              
                </main>
                <footer class="py-2 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Bazil Books by Matthew Lavigueur 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
