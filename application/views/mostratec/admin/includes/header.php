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
                <a class="navbar-brand" href="index.html">Mostratec - Painel de Controle</a>
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
                        <a href="<?= base_url('admin/painel')?>"><i class="fa fa-fw fa-dashboard"></i>Painel de Controle</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#alunos"><i class="fa fa-fw fa-arrows-v"></i> Alunos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="alunos" class="collapse">
                            <li>
                                <a href="<?= base_url('admin/meus-alunos') ?>">Meus Alunos</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/alunos') ?>">Todos os Alunos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#grupos"><i class="fa fa-fw fa-arrows-v"></i> Grupos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="grupos" class="collapse">
                            <li>
                                <a href="<?= base_url('admin/meus-alunos') ?>">Meus Grupos</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/alunos') ?>">Todos os Grupos</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?= show_messages(); ?>