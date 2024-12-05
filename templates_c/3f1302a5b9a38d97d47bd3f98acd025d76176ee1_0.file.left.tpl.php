<?php
/* Smarty version 4.2.1, created on 2023-09-06 21:30:45
  from 'C:\laragon\www\GourmandiseSarl\mvc-goo-12-HistoriqueCommande\public\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64f8ef8589b121_68099770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f1302a5b9a38d97d47bd3f98acd025d76176ee1' => 
    array (
      0 => 'C:\\laragon\\www\\GourmandiseSarl\\mvc-goo-12-HistoriqueCommande\\public\\left.tpl',
      1 => 1694035842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64f8ef8589b121_68099770 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <a href="left.tpl"></a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#A VOUS D'ECRIRE LE LIEN">Gourmandise SARL</a>
                <a class="navbar-brand hidden" href="#A VOUS D'ECRIRE LE LIEN">G</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                    </li>
                    <h3 class="menu-title">ADMINISTRATION</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?gestion=client">Liste</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=client&action=form_ajouter">Nouveau</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Produits</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-product-hunt"></i><a href="index.php?gestion=produit">Liste</a></li>
                            <li><i class="fa fa-calendar"></i><a href="index.php?gestion=produit&action=form_ajouter">Nouveau</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pagelines"></i>Profil</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-paperclip"></i><a href="index.php?gestion=profil&action=form_consulter" > Consulter Mon profil</a></li>
                            <li><i class="fa fa-paper-plane"></i><a href="index.php?gestion=profil&action=form_modifier" >Modifier Mon profil</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">COMMANDES</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Historique</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-paperclip"></i><a href="index.php?gestion=historique&action=listerTT">Toutes les commandes </a></li>
                            <li><i class="fa fa-paper-plane"></i><a href="index.php?gestion=historique&action=listerNV" >commandes non validées</a></li>
                            <li><i class="fa fa-calculator"></i><a href="index.php?gestion=historique&action=listerAN" >commandes annulées</a></li>
                        </ul>
                        
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-email"></i>Passer une commande </a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-email"></i>Panier en cours </a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel --><?php }
}