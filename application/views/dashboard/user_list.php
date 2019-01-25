<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/head') ?>
</head>

<body id="page-top">
    <?php if($this->session->userdata('logged_in')) : ?>
    <?php $this->load->view('dashboard/navbar') ?>

    <div id="wrapper">

    <?php $this->load->view('dashboard/sidebar') ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url() ?>admin/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    Usuários
                </li>
            </ol>

            <!--Flashdatas -->
            <?php $this->load->view('dashboard/flashdata') ?>
            <!--/-->

            <div class="btn btn-primary mb-3 float-right"><i class="fas fa-plus"></i> Cadastrar novo</div>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 60%">Nome</th>
                        <th>Usuários</th>
                        <th style="width: 15%">Acões</th>
                    </tr>

                    <?php foreach((array)$users as $user) : ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>Editar | Remover</td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright © Your Website 2018</span>
                </div>
              </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/js') ?>

    <?php else : ?>
        <?php $this->load->view('dashboard/login'); ?>
    <?php endif ?>

</body>
</html>
