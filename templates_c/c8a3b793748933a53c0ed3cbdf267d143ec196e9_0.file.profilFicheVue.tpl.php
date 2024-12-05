<?php
/* Smarty version 4.2.1, created on 2023-07-11 07:47:32
  from 'C:\laragon\www\GourmandiseSarl\mvc-goo-12-HistoriqueCommande\mod_profil\vue\profilFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64ad0914bc37a0_51944074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8a3b793748933a53c0ed3cbdf267d143ec196e9' => 
    array (
      0 => 'C:\\laragon\\www\\GourmandiseSarl\\mvc-goo-12-HistoriqueCommande\\mod_profil\\vue\\profilFicheVue.tpl',
      1 => 1689014610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_64ad0914bc37a0_51944074 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\GourmandiseSarl\\mvc-goo-12-HistoriqueCommande\\include\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

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
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>La gourmandise, ça se partage !</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=profil&action=form_consulter">Profil</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">


                <div class="col-md-6">

                    <div <?php if (ProfilTable::getMessageErreur() != '') {?> class="alert alert-danger" role="alert" <?php }?> >
                        <?php echo ProfilTable::getMessageErreur();?>

                    </div>
                    <div <?php if (ProfilTable::getMessageSucces() != '') {?> class="alert alert-success" role="alert" <?php }?> >
                        <?php echo ProfilTable::getMessageSucces();?>

                    </div>

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <form action="index.php" method="POST">

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->

                            <input type="hidden" name="gestion" value="profil">

                            <input type="hidden" name="action" value="modifier">


                            <div class="card-body card-block">

                                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                                    <div class="form-group">
                                        <label for="text" class=" form-control">
                                            Code vendeur :
                                        </label>
                                        <input type="text" name="codev" class="form-control"
                                               value="<?php echo $_smarty_tpl->tpl_vars['codev']->value;?>
"
                                               readonly>
                                    </div>
                                <?php }?>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Nom <sup>*</sup>:
                                    </label>
                                    <input type="text" name="nom" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getNom();?>
"

                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Prenom :
                                    </label>
                                    <input type="text" name="prenom" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getPrenom();?>
"
                                           readonly>
                                </div>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Adresse <sup>*</sup>:
                                    </label>
                                    <input type="text" name="adresse" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getAdresse();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Code postal <sup>*</sup>:
                                    </label>
                                    <input type="text" name="cp" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCp();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Ville <sup>*</sup>:
                                    </label>
                                    <input type="text" name="ville" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getVille();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>

                                <div class="form-group">
                                    <label for="text" class=" form-control">
                                        Telephone :
                                    </label>
                                    <input type="text" name="telephone" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getTelephone();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>

                                <div class="card-body card-block">

                                    <div class="col-md-6">

                                        <input type="button" class="btn btn-submit" value="Retour"
                                               onclick="location.href='index.php?'">

                                    </div>

                                    <div class="col-md-6">
                                        <?php if ($_smarty_tpl->tpl_vars['action']->value != 'consulter') {?>
                                            <input type="submit"
                                                   class="btn btn-submit"
                                                   name="btn-valider"
                                                   value="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
">
                                        <?php }?>

                                    </div>
                                    <br>
                                </div>


                        </form>
                    </div>
                </div>

            </div><!-- .animated -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><strong>Statistiques</strong></div>
                    <div class="card-body">
                        <div class="card-group">
                            Montant total de mes commandes : <?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCA();?>
 €
                        </div>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'consulter') {?>
                <div class="card">
                    <div class="card-header"><strong>Mot de Passe</strong></div>
                    <div class="card-body">
                        <div class="card-group">
                            <form action="index.php" method="POST">

                                <input type="hidden" name="gestion" value="profil">

                                <input type="hidden" name="action" value="modifier">

                                <input type="hidden" name="codev" value="<?php echo $_smarty_tpl->tpl_vars['codev']->value;?>
">

                                <input type="hidden" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getNom();?>
">
                                <input type="hidden" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getPrenom();?>
">
                                <input type="hidden" name="adresse" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getAdresse();?>
">
                                <input type="hidden" name="cp" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCp();?>
">
                                <input type="hidden" name="ville" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getVille();?>
">
                                <input type="hidden" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getTelephone();?>
">
                                <input type="hidden" name="CA" value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCA();?>
">

                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="text" class="form-control">
                                            Nouveau Mot De passe <sup>*</sup>:
                                        </label>
                                        <input type="password" name="nouveau_motdepasse" class="form-control" value=""
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="form-control">
                                            Confirmation Mot de passe <sup>*</sup>:
                                        </label>
                                        <input type="password" name="confirmation_motdepasse" class="form-control"
                                               value="" required>
                                    </div>
                                        <input type="submit"
                                               class="btn btn-submit"
                                               name="btn-valider-mdp"
                                               value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                                        <?php }?>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

</html><?php }
}
