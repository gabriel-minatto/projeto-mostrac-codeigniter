<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel de Controle</title>

    <?php $this->load->view("mostratec/admin/includes/header_sources");//carregamos arquivos de estilo ?>

</head>

<body>
    
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('admin') ?>">Mostratec - Painel de Controle</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata("user_nome") ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url('admin/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?= base_url('admin/painel')?>">Painel de Controle</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#grupos">Grupos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="grupos" class="collapse">
                            <li>
                                <a data-toggle="modal" data-target="#new_group">
                                    Cadastrar Grupo
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/grupos/meus-grupos') ?>">Meus Grupos</a>
                            </li>
                            <?php if(is_admin()){ ?>
                                <li>
                                    <a href="<?= base_url('admin/grupos/todos') ?>">Ver Todos</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#schools">Escolas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="schools" class="collapse">
                            <?php if(is_admin()){ ?>
                                <li>
                                    <a data-toggle="modal" data-target="#new_school">
                                        Cadastrar Escola
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?= base_url('admin/escolas/minhas-escolas') ?>">Minhas Escolas</a>
                            </li>
                            <?php if(is_admin()){ ?>
                                <li>
                                    <a href="<?= base_url('admin/escolas/todas') ?>">Ver Todas</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper" style="min-height: calc(100vh - 2.5em);">
            <div class="container-fluid">
                
        <?= show_messages(); ?>
        