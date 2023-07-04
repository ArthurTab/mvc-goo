<?php
/* Smarty version 4.2.1, created on 2023-07-04 08:01:39
  from 'C:\laragon\www\gourmandisesarl\mvc-goo-08\mod_profil\vue\profilFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64a3d1e36e72c2_57675548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0163f5a29f109d79c1a55f564d9fca89a6bfe6bc' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandisesarl\\mvc-goo-08\\mod_profil\\vue\\profilFicheVue.tpl',
      1 => 1688457697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_64a3d1e36e72c2_57675548 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\gourmandisesarl\\mvc-goo-08\\include\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
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
    <title><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
">
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

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>


<!-- Left Panel -->


<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- FIN : header -->


    <div class="breadcrumbs">
        <div class="col-sm-8">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb justify-content-left">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=profil">Profil</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div <?php if (profilTable::getMessageErreur() != '') {?> class="alert alert-danger" role="alert"><?php }?>
        <?php echo profilTable::getMessageErreur();?>

    </div>
    <div <?php if (profilTable::getMessageSucces() != '') {?> class="alert alert-success" role="alert"><?php }?>
        <?php echo profilTable::getMessageSucces();?>

    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <form action="index.php" method="POST">

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="profil">
                            <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="codev">
                                        Code vendeur :
                                    </label>
                                    <input type="text"
                                           name="codev" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCodev();?>
"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nom">
                                        Nom :
                                    </label>
                                    <input type="text"
                                           name="nom" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getNom();?>
"
                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">
                                        Prénom :
                                    </label>
                                    <input type="text"
                                           name="prenom" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getPrenom();?>
"
                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="adresse">
                                        Adresse :
                                    </label>
                                    <input type="text"
                                           name="adresse" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getAdresse();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="cp">
                                        Code postal :
                                    </label>
                                    <input type="text"
                                           name="cp" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCp();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="ville">
                                        Ville :
                                    </label>
                                    <input type="text"
                                           name="ville" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getVille();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="telephone">
                                        Téléphone :
                                    </label>
                                    <input type="text"
                                           name="telephone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getTelephone();?>
">
                                </div>
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="button" class="btn btn-danger btn-sm" value="Retour"
                                               onclick="location.href='index.php?gestion=accueil'">
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <input type="submit" class="btn btn-primary btn-sm" value="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
"
                                               name="btn-valider">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <form action="index.php" method="POST">

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="profil">
                            <input type="hidden" name="action" value="modifMDP">
                            <input type="hidden" name="codev" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCodev();?>
">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="motdepasse">
                                        Nouveau mot de passe :
                                    </label>
                                    <input type="text"
                                           name="motdepasse" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="confirmMotDePasse">
                                        Confirmer le mot de passe :
                                    </label>
                                    <input type="text"
                                           name="confirmMotDePasse" class="form-control" value="">
                                </div>
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="button" class="btn btn-danger btn-sm" value="Retour"
                                               onclick="location.href='index.php?gestion=accueil'">
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <input type="submit" class="btn btn-primary btn-sm" value="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
"
                                               name="btn-valider">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/jszip.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/pdfmake.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/vfs_fonts.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.html5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.print.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.colVis.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables-init.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
