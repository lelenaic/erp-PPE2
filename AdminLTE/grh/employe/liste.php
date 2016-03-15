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
        <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
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
                        Liste des Employés
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="example2" class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nom</th>
                                        <th>prénom</th>
                                        <th>date de naissance</th>
                                        <th>poste</th>
                                        <th>numéro de téléphone</th>
                                        <th>adresse mail</th>
                                        <th>ville</th>
                                        <th>code postal</th>
                                        <th>adresse</th>
                                        <th>sécurité sociale</th>
                                        <th>entreprise</th>
                                        <th>modification</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $size=sizeof($employe);
                                    for ($i=0;$i<$size;$i++) {
                                        $poste_id=Connexion::table('select libelle from poste where id='.$employe[$i]['poste_id'].'');
                                        $entreprise_id=Connexion::table('select libelle from organisation where id='.$employe[$i]['entreprise_id'].'');
                                        echo '<tr>'
                                            ,'<td>',$employe[$i]['id'],'</td>'
                                            ,'<td>',$employe[$i]['nom'],'</td>'
                                            ,'<td>',$employe[$i]['prenom'],'</td>'
                                            ,'<td>',$employe[$i]['dateNaissance'],'</td>'
                                            ,'<td>',$poste_id[0]['libelle'],'</td>'
                                            ,'<td>',$employe[$i]['numero'],'</td>'
                                            ,'<td>',$employe[$i]['mail'],'</td>'
                                            ,'<td>',$employe[$i]['ville'],'</td>'
                                            ,'<td>',$employe[$i]['codePostal'],'</td>'
                                            ,'<td>',$employe[$i]['adresse'],'</td>'
                                            ,'<td>',$employe[$i]['securiteSociale'],'</td>'
                                            ,'<td>',$entreprise_id[0]['libelle'],'</td>'
                                            ,'<td>','<button type="button" class="btn btn-info" data-toggle="modal" data-target="#'.$employe[$i]['id'].'">Modifier</button>','</td>'
                                            ,'</tr>';
                                            }
                                    ?>
                                </tbody>
                            </table>


                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <?php
        for ($i=0;$i<$size;$i++) {
          $poste_id=Connexion::table('select libelle from poste where id='.$employe[$i]['poste_id'].'');
          $entreprise_id=Connexion::table('select libelle from organisation where id='.$employe[$i]['entreprise_id'].'');
          echo '<div id="'.$employe[$i]['id'].'" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier Client</h4>
                </div>
                <div class="modal-body">';

                  $form=new FormBootstrap();
                  $form->addHidden('route','grh_employe_modifier');
                  $form->addHidden('id',$employe[$i]['id']);
                  $id['value']=$employe[$i]['id'];
                  $nom['value']=$employe[$i]['nom'];
                  $prenom['value']=$employe[$i]['prenom'];
                  $dateNaissance['value']=$employe[$i]['dateNaissance'];
                  $libelleP['value']=$poste_id[0]['libelle'];
                  $numero['value']=$employe[$i]['numero'];
                  $mail['value']=$employe[$i]['mail'];
                  $ville['value']=$employe[$i]['ville'];
                  $codePostal['value']=$employe[$i]['codePostal'];
                  $adresse['value']=$employe[$i]['adresse'];
                  $securiteSociale['value']=$employe[$i]['securiteSociale'];
                  $libelleE['value']=$entreprise_id[0]['libelle'];
                  $form->addText('nom', $nom , 'Nom');
                  $form->addText('prenom', $prenom, 'Prénom');
                  $form->addDate('dateNaissance', $dateNaissance, 'Date de naissance');
                  $poste= Connexion::table('select * from poste');
                  $list=array();
                  foreach ($poste as $p)
                  {
                      $list[$p['id']]=$p['libelle'];
                  }
                  var_dump($list);
                  $form->addSelect('poste', $list, array() , 'poste');
                  $form->addText('numero', $numero, 'Numéro de télephone');
                  $form->addText('mail', $mail, 'E-mail');
                  $form->addText('ville', $ville, 'Ville');
                  $form->addText('codePostal', $codePostal, 'Code postal');
                  $form->addText('adresse', $adresse, 'Adresse');
                  $form->addText('securiteSociale', $securiteSociale, 'Sécurité sociale');
                  $entreprise= Connexion::table('select * from organisation');
                  $list=array();
                  foreach ($entreprise as $e)
                  {
                      $list[$e['id']]=$e['libelle'];
                  }
                  $form->addSelect('organisation', $list , $list, 'organisation');
                  $list=array();
                echo $form->table();
                echo '</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>';
        }
?>

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
