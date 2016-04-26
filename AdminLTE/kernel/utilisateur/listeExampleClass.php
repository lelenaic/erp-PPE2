<?php
function liste($liste,$nom,$table){
    $deroulant='<select name="'.$nom.'">';
    $taille=sizeof($liste);
    for($i=0;$i<$taille;$i++){
        //mettre un selected si c'est l'attribut de l'utilisateur
        $deroulant.='<option value="'.$liste[$i][$table].'">'.$liste[$i][$table].'</option>';   
    }
    $deroulant.='</select>';
    return($deroulant);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo titreApplication; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="./AdminLTE/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="./AdminLTE/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="./AdminLTE/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="./AdminLTE/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="./AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="./AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo titreApplication; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['utilisateur']['login']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="./.?route=kernel_utilisateur_formProfile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="./.?route=kernel_utilisateur_logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <?php echo menuUtilisateur(); ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Liste des utilisateurs
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <form method="POST" action="?route=kernel_utilisateur_liste">
                                    <?php
                                        $class='table table-bordered table-hover datatable';
                                        $id='example2';
                                        $tablHead=['Login','Mot de passe','Secteur','Entreprise','Modification','Annuler'];
                                        $tablNomColonne=['login','password','label','libelle'];
                                        $tablButton=['<button type="submit" name="modifier" class="btn btn-app"><i class="fa fa-check"></i> Modifier </button>'];
                                        $requeteTable='SELECT login, password, utilisateurtype.label, organisation.libelle
                                                        FROM utilisateur, utilisateurtype, organisation
                                                        WHERE utilisateur.utilisateurtype_id=utilisateurtype.id
                                                        AND utilisateur.entreprise_id=organisation.id';
                                        $tabl=Connexion::table($requeteTable);
                                        $tableau=new Table($tabl,$tablHead,$id,$class,$tablNomColonne);
                                        
                                        if(isset($_POST['login'])){
                                            $tableau->tableModif();
                                            $tableau->affichTable();
                                        }else{
                                            $tableau->creaTableModif();
                                            $tableau->affichTable();
                                        }
                                    ?>
                            </form>
                            <table id="example2" class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Mot de passe</th>
                                        <th>Secteur</th>
                                        <th>Entreprise</th>
                                        <th>Modification</th>
                                        <th>Supression</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    echo '<div id="myModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                      
                                      </div>
                                    </div>';
                                    if(isset($_POST['modifier'])){
                                        $listeEntreprise=Connexion::table('SELECT organisation.libelle FROM organisation');
                                        $listeSecteur=Connexion::table('SELECT utilisateurtype.label FROM utilisateurtype');
                                        //var_dump($listeEntreprise);
                                        //var_dump($_POST['entreprise']);
                                        foreach ($utilisateurs as $u) {
                                            /*echo '$post';
                                            var_dump($_POST['login']);
                                            echo '$u';
                                            var_dump($u['login']);
                                            echo 'fin';*/
                                            if($_POST['login']==$u['login']){
                                                echo '<form method="POST" action="?route=kernel_utilisateur_liste"><tr>'
                                                    .'<td><input type="text" value="'.$u['login'].'"/></td>'
                                                    .'<td><input type="text" value=""/></td>'
                                                    .'<td>'.liste($listeSecteur,"secteur","label").'</td>'
                                                    .'<td>'.liste($listeEntreprise,"entreprise","libelle").'</td>'
                                                    .'<td><input type="hidden" name="login" value="'.$u['login'].'"/><input type="hidden" name="secteur" value="'.$u['secteur'].'"/><input type="hidden" name="entreprise" value="'.$u['entreprise'].'"/><button type="submit" name="valider" class="btn btn-app"><i class="fa fa-check"></i> Valider</button></td>'
                                                    .'<td><button type="submit" name="annuler" class="btn btn-app"><i class="fa fa-check"></i> Annuler </button></td>'
                                                    .'</tr></form>';
                                            }

                                        }

                                            }else{
                                            foreach ($utilisateurs as $u) {
                                                /*echo '$u';
                                                var_dump($u['login']);*/
                                                echo '<form method="POST" action="?route=kernel_utilisateur_liste"><tr>'
                                                    .'<td>'.$u['login'].'</td>'
                                                    .'<td>•••••</td>'
                                                    .'<td>'.$u['secteur'].'</td>'
                                                    .'<td>'.$u['entreprise'].'</td>'
                                                    .'<td><input type="hidden" name="login" value="'.$u['login'].'"/><input type="hidden" name="secteur" value="'.$u['secteur'].'"/><input type="hidden" name="entreprise" value="'.$u['entreprise'].'"/><button type="submit" name="modifier" class="btn btn-app"><i class="fa fa-check"></i> Modifier </button></td>'
                                                    .'<td><button type="submit" name="supprimer" class="btn btn-app"><i class="fa fa-check"></i> Supprimer </button></td>'
                                                    .'</tr></form>';
                                                
                                        }
                                    }
                                    echo '';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <!-- <script src="./AdminLTE/js/plugins/morris/morris.min.js" type="text/javascript"></script> -->
        <!-- Sparkline -->
        <script src="./AdminLTE/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="./AdminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="./AdminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="./AdminLTE/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="./AdminLTE/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="./AdminLTE/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="./AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="./AdminLTE/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- DATA TABES SCRIPT -->
        <script src="./AdminLTE/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="./AdminLTE/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="./AdminLTE/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- <script src="./AdminLTE/js/AdminLTE/dashboard.js" type="text/javascript"></script> -->

        <!-- AdminLTE for demo purposes -->
        <script src="./AdminLTE/js/AdminLTE/demo.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $(".datatable").dataTable();
            });
        </script>
    </body>
</html>
