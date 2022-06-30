<div class="header header-fixed unselectable header-animated">
      <?php echo view('Design/head_brand'); ?>
      <section class="section">
         <div class="hero ">
            <div class="hero-body">
               <div class="content">
                  <div class="text-center">
                     <h1>Créditos</h1>
                     <h5><?php echo $info->app;?> 
                     <?php echo $info->version;?></h5>
                     <h6><?php echo $info->title;?></h6>
                     <?php $people = $info->people; ?>
                     <?php //var_dump($info); ?>
                     <?php $changelog = $info->changelog; ?>

                     <p>Este sistema é de código aberto e os contibuintes para manutenção do mesmo estão listados a seguir:</p>
                     <P>
                     
					 <div class="form-section u-text-left">
                     <div class="m-1 u-inline-block">
                        <div class="r"><h6 class="title">Equipe <span class="tag tag--light text-info">Tecnologia da Informação</span></h6>
                           <div class="r" style="overflow-x:scroll">
                           <table class="table"><thead><tr>
                              <th class="u-text-left "><abbr title="Title2" >Atividade</abbr></th>
                              <th class="u-text-left "><abbr title="Title2" >Contribuição</abbr></th>
                              <th class="u-text-left "><abbr title="Title2" >Nome</abbr></th>
                           </tr>
                              </thead><tfoot><tr>
                              
                           </tr></tfoot>
                           <tbody>
                              
                           <?php foreach( $people as $row ){ ?>
                              <tr>
                                 <th class="u-text-left "><?php echo $row->area; ?></th>
                                 <th class="u-text-left "><?php echo $row->function; ?></th>
                                 <th class="u-text-left "><?php echo $row->name; ?></th>
                              </tr>
                           <?php } ?>
                           </tbody>
                           </table>
                        
                        </div>
                     </div>   
                  </div>
                  



                  <div class="form-section u-text-left">
                     <div class="m-1 u-inline-block">
                        <div class="r"><h6 class="title">Changelog <span class="tag tag--light text-info">Ultimas alterações</span></h6>
                           <div class="r" style="overflow-x:scroll">
                           <table class="table"><thead><tr>
                              <th class="u-text-left "><abbr title="Title2" >Versão</abbr></th>
                              <th class="u-text-left "><abbr title="Title2" >Modulo</abbr></th>
                              <th class="u-text-left "><abbr title="Title2" >Descrição</abbr></th>
                           </tr>
                              </thead><tfoot><tr>
                              
                           </tr></tfoot>
                           <tbody>
                              
                           <?php foreach( $changelog as $row ){ ?>
                              <tr>
                                 <?php if (isset($row->title)) { ?>
                                 <th class="u-text-left "><span class="tag tag--danger"><?php echo $row->title;?></span></th>
                                 <?php } else { ?>
                                 <th class="u-text-left "><?php echo $row->version; ?></th>
                                 <th class="u-text-left "><span class="tag tag--dark"><?php echo $row->module; ?></span></th>
                                 <th class="u-text-left "><?php echo $row->description; ?></th>
                                 <?php } ?>
                              </tr>
                           <?php } ?>
                           </tbody>
                           </table>
                        
                        </div>
                     </div>   
                  </div>



                            </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
</div>
