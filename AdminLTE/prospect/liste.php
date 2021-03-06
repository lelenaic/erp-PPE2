<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo titreApplication; ?></title>
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
                        Liste des Prospects
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="example2" class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse</th>
                                        <th>Code Postal</th>
                                        <th>Ville</th>
                                        <th>Mail</th>
                                        <th>Téléphone</th>
                                        <th>Entreprise</th>
                                        <th>Modification</th>
                                        <th>Suppression</th>
                                        <th>Mise en Clientèle</th>
                                        
                                    </tr>
                                        
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($prospect as $u) {
                                        echo '<tr>'
                                            ,'<td>',$u['nom'],'</td>'
                                            ,'<td>',$u['prenom'],'</td>'
                                            ,'<td>',$u['adresse'],'</td>'    
                                            ,'<td>',$u['codePostal'],'</td>'    
                                            ,'<td>',$u['ville'],'</td>'    
                                            ,'<td>',$u['mail'],'</td>'  
                                            ,'<td>',$u['numTelephone'],'</td>'    
                                           ,'<td>',$u['libelle'],'</td>'
                                            ,'<td>','<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#'.$u['id'].'">Modifier</button>','</td>'
                                            ,'<td>','<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#'.$u['id'].'supprimer">Supprimer</button>','</td>'
                                            ,'<td>','<a href="index.php?route=client_listeIndex_passageClient&id='.$u['id'].'"><i class="fa fa-sign-in fa-3x"></i></a>','</td>'   
                                            ,'</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        Vers la liste des clients : <br/>
                            <a href="index.php?route=client_listeIndex_index"><i class="fa fa-arrow-circle-left fa-4x"></i></a><br/>
                        Vers l'ajout d'un prospect : <br/>
                            <a href="index.php?route=prospect_ajoutIndex_index"><i class="fa fa-plus-square fa-4x"></i></a><br/>

                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <?php
        foreach ($prospect as $u) {
         // $poste_id=Connexion::table('select libelle from poste where id='.$employe[$i]['poste_id'].'');
         // $entreprise_id=Connexion::table('select libelle from organisation where id='.$employe[$i]['entreprise_id'].'');
          echo '<div id="'.$u['id'].'" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier Prospect</h4>
                </div>
                <div class="modal-body">';
                    $nom['value']=$u['nom'];
                    $prenom['value']=$u['prenom'];
                    $adresse['value']=$u['adresse'];
                    $codePostal['value']=$u['codePostal'];
                    $ville['value']=$u['ville'];
                    $mail['value']=$u['mail'];
                    $num['value']=$u['numTelephone'];
                    $form = new FormBootstrap('Client');
                    $form->addHidden('route', 'prospect_listeIndex_validModif');
                    $form->addHidden('id', $u['id']);
                    $form->addText('nom',$nom, 'Nom');
                    $form->addText('prenom',$prenom, 'Prénom');
                    $form->addText('adresse',$adresse, 'Adresse');
                    $form->addText('codePostal',$codePostal, 'Code Postal');
                    $form->addText('ville',$ville, 'Ville');
                    $form->addEmail('mail', $mail,'Adresse Mail');
                    $form->addNumeric('numTel',$num,'Numéro de Téléphone');
                    echo $form->table(); 

          
          
      
                echo '</div>
                    
               <div class="modal-footer">
                
                  <button type="button" class="btn btn-info btn" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
            <i class="fa fa-thumbs-o-up fa-3x"></i>
          </div>';
        }
        foreach ($prospect as $u) {
         // $poste_id=Connexion::table('select libelle from poste where id='.$employe[$i]['poste_id'].'');
         // $entreprise_id=Connexion::table('select libelle from organisation where id='.$employe[$i]['entreprise_id'].'');
          echo '<div id="'.$u['id'].'supprimer" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Supprimer Prospect</h4>
                </div>
                <div class="modal-body">';
                    $nom['value']=$u['nom'];
                    $prenom['value']=$u['prenom'];
                    $adresse['value']=$u['adresse'];
                    $codePostal['value']=$u['codePostal'];
                    $ville['value']=$u['ville'];
                    $mail['value']=$u['mail'];
                    $num['value']=$u['numTelephone'];
                    echo '<b>Nom :</b> <center>', $nom['value'], '</center><br />';
                    echo '<b>Prénom :</b> <center>', $prenom['value'], '</center><br />';
                    echo '<b>Adresse :</b> <center>', $adresse['value'], '</center><br />';
                    echo '<b>Code Postal :</b> <center>', $codePostal['value'], '</center><br />';
                    echo '<b>Ville :</b> <center>', $ville['value'], '</center><br />';
                    echo '<b>Adresse Mail :</b> <center>', $mail['value'], '</center><br />';
                    echo '<b>Numéro de Téléphone :</b> <center>', $num['value'], '</center><br />';
                    echo '<a href="index.php?route=prospect_listeIndex_deleteProspect&id='.$u['id'].'"><button type="button" class="btn btn-info btn">Supprimer</button></a>';

          
          
      
                echo '</div>
                    
               <div class="modal-footer">
                
                  <button type="button" class="btn btn-info btn" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
            <i class="fa fa-thumbs-o-up fa-3x"></i>
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
