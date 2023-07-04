<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$titreVue}</title>
    <meta name="description" content="{$titreVue}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="public/favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="template/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file='public/header.tpl'}

    <!-- FIN : header -->


    <div class="breadcrumbs">
        <div class="col-sm-8">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb justify-content-left">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=profil">Profil</a></li>
                        <li class="active">{$titreVue}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div {if profilTable::getMessageErreur() neq ''} class="alert alert-danger" role="alert">{/if}
        {profilTable::getMessageErreur()}
    </div>
    <div {if profilTable::getMessageSucces() neq ''} class="alert alert-success" role="alert">{/if}
        {profilTable::getMessageSucces()}
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong>{$titrePage}</strong></div>
                        <form action="index.php" method="POST">

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="profil">
                            <input type="hidden" name="action" value="{$action}">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="codev">
                                        Code vendeur :
                                    </label>
                                    <input type="text"
                                           name="codev" class="form-control" value="{$unProfil->getCodev()}"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nom">
                                        Nom :
                                    </label>
                                    <input type="text"
                                           name="nom" class="form-control" value="{$unProfil->getNom()}"
                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">
                                        Prénom :
                                    </label>
                                    <input type="text"
                                           name="prenom" class="form-control" value="{$unProfil->getPrenom()}"
                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="adresse">
                                        Adresse :
                                    </label>
                                    <input type="text"
                                           name="adresse" class="form-control" value="{$unProfil->getAdresse()}">
                                </div>

                                <div class="form-group">
                                    <label for="cp">
                                        Code postal :
                                    </label>
                                    <input type="text"
                                           name="cp" class="form-control" value="{$unProfil->getCp()}">
                                </div>

                                <div class="form-group">
                                    <label for="ville">
                                        Ville :
                                    </label>
                                    <input type="text"
                                           name="ville" class="form-control" value="{$unProfil->getVille()}">
                                </div>

                                <div class="form-group">
                                    <label for="telephone">
                                        Téléphone :
                                    </label>
                                    <input type="text"
                                           name="telephone" class="form-control" value="{$unProfil->getTelephone()}">
                                </div>

                                <div class="form-group">
                                    <label for="motdepasse">
                                        Nouveau mot de passe :
                                    </label>
                                    <input type="text"
                                           name="motdepasse" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="ConfirmMotdepasse">
                                        Confirmer le mot de passe :
                                    </label>
                                    <input type="text"
                                           name="ConfirmMotdepasse" class="form-control" value="">
                                </div>

                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="button" class="btn btn-danger btn-sm" value="Retour"
                                               onclick="location.href='index.php?gestion=accueil'">
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <input type="submit" class="btn btn-primary btn-sm" value="{$action|capitalize}"
                                               name="btn-valider">
                                    </div>
                                </div>
                            </div>
                        </form>

                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-four">
                                <div class="stat-icon dib">
                                    <i class="ti-stats-up text-muted"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-heading">Chiffre d'affaire</div>
                                        <div class="stat-text">Total: {$unProfil->getTotal_Ht()}€</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>
</html>
