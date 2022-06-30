
<div class="header header-fixed unselectable header-animated">
      <?php echo view('Design/head_brand'); ?>
      <section class="section">
         <div class="hero ">
            <div class="hero-body">
               <div class="content">
                  <div class="text-center">
                     <h1>Tabelas disponíveis</h1>
                     <p>A seguir você pode gerenciar os usuários que desejar ou adicionar um novo clicando no botão</p>
                     <P>
                        <?php echo var_dump($datatable);?>
                     
                     <div class="row u-text-left">
                     <div class="col-11">
                     <div class="btn-group u-pull-left">
                          <div>
                           <a href="<?php echo base_url();?>/public/user/new" class="btn btn-info" title="Registrar novo usuário">Relatório 1</a>
                           </div>
                           <div>
                           <a href="<?php echo base_url();?>/public/user/searchform" class="btn btn-dark" title="Solicitar bloqueio ou ações sobre usuários cadastrados">Relatório 2</a>
                           </div>
                     </div>
                     </div>
                     <div class="col-1">
                              <div class="u-text-right">
                                  <a href="<?php echo base_url();?>/public/search"><icon class="fa fa-search"></icon></a>
                              </div>
                           </div>

					 <div class="form-section u-text-left">
                                <div class="m-1 u-inline-block">
                           <div class="r"><h6 class="title">Usuários<span class="tag tag--light text-info"><?php echo me(); ?></span></h6>

                        <div class="u-text-right">
                           <div class="list-dropdown dropdown-right">
                              <div class="btn-group"><button class="btn-transparent p-0">
