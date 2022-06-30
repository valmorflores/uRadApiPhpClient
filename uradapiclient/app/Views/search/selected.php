<div class="header header-fixed unselectable header-animated">
      <?php echo view('Design/head_brand'); ?>
      <section class="section">
         <div class="hero ">
            <div class="hero-body">
               <div class="content">

               <div class="placeholder">
    <div class="placeholder-icon"><span class="icon"><i class="fa fa-wrapper fa-user x-large"></i></span></div>
    <h1>Estatística de usuário</h1>
    <div class="placeholder-subtitle">Abaixo você tem as informações específicas sobre o login de usuário selecionado. </div>
    <div class="placeholder-commands u-text-left">
        <div class="form-group">
           <table>
               <tr>
                   <td>Username</td>
                   <td><?php echo $username; ?></td>
                </tr>
                <?php foreach ($userrecord as $row){ ?>
                    <tr>
                    <td>Nome</td>
                    <td><?php echo $row->NM_USUARIO; ?></td>
                    </tr>                    
                    <tr>
                    <td>Usuário ativo</td>
                    <td><?php echo $row->SN_ATIVO; ?></td>
                    </tr>
                    <tr>
                    <td>Alterar senha proximo login</td>
                    <td><?php echo $row->SN_SENHA_PLOGIN; ?></td>
                    </tr>
                <?php } ?>
                    <tr>
                    <td>Existe usuário no MV</td>
                    <td>
                    <?php 
                        if (isset($userrecord)){ 
                            if (count($userrecord)>0){
                                echo 'Sim';
                            } else {
                                echo 'Não';
                            }
                        } else {
                            echo 'Não';
                        }
                         ?></td>
                    </tr>
                    <tr>
                    <td>Existe usuário no pMed</td>
                    <td>
                    <?php 
                        if (isset($userpmedrecord)){ 
                            if (count($userpmedrecord)>0){
                                echo 'Sim';
                            } else {
                                echo 'Não';
                            }
                        } else {
                            echo 'Não';
                        }
                         ?></td>
                    </tr>
                    <tr>
                    <td>Existe usuário na rede</td>
                    <td>
                    <?php 
                        //if ($useractivedirectory['count']>0){ 
                        if ($useractivedirectoryExact){
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                         ?>
                    </td>
                    </tr>
           
                </table>
                
            </div>
            <a href="<?php echo base_url();?>/public/userrequirement/new/<?php echo $username;?>"><button class="btn btn-dark">FAZER NOVO REQUERIMENTO VINCULADO</button></a>
        </div></div>
           
           <?php if (isProfileAdmin()){?>
            
            <h2>Área administrativa</h2>
           <p>Os dados a seguir são sigilosos e visíveis apenas para equipe da informática com habilitação de administração de usuários</p>
           <div class="placeholder">
           <div class="placeholder-commands u-text-left">
           <h6>Dados básicos</h6>    
    
        <div class="form-group">           
           <table><?php foreach ($userrecord as $row){ ?>
                    <tr>
                    <td>CPF</td>
                    <td><?php echo $row->CPF; ?></td>
                    </tr>
                    <tr>                    
                    <tr>
                    <td>Privilégio</td>
                    <td><?php echo $row->TP_PRIVILEGIO; ?></td>
                    </tr>
                    <tr>
                    <td>Prestador</td>
                    <td><?php echo $row->CD_PRESTADOR; ?></td>
                    </tr>                    
                    <tr>
                    <td>Nascimento</td>
                    <td><?php echo $row->DT_NASCIMENTO; ?></td>
                    </tr>
                    <td>Alterar senha proximo login</td>
                    <td><?php echo $row->SN_SENHA_PLOGIN; ?></td>
                    </tr>
                  <?php }  ?>           
           </table>       
           </div>
           </div></div>
           <h3>Usuário MV</h3>
           <?php var_dump($userrecord); ?>
           <h3>Usuário pMed</h3>
           <?php var_dump($userpmedrecord); ?>
           <h3>Active Directory</h3>
           <?php if (! $useractivedirectoryExact){ ?>
           <p>Caso existam nomes semelhantes, dados de outros usuários podem aparecer na relação do Active Directory.
Note que este usuário específico, não possui senha de rede.
           <?php } ?>
           <?php var_dump($useractivedirectory);?>
           </div>
           <?php } ?>
        </div>
           </DIV>
    </selection>
    
</div>