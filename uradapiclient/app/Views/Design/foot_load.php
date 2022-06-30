<div class="row">
    <div class="col-12">
                    <div class="tile tile--center" style="box-shadow: 0 3px 6px rgba(0,0,0,0.06), 0 3px 6px rgba(0,0,0,0.03); padding: 0.25rem 1rem;">
                        <div class="tile__icon">
                            <img src="<?php echo base_url();?>/public/setorti_black.png" style="width:48px;">
                        </div>
                        <div class="tile__container">
                            <p class="tile__title u-no-margin"><b>uRadApi</b> - Sistema cliente de dados via API Restful</p>
                            <span class="info"></span>
                        </div>
                        <?php if (isset($token)){?>
                        <div class="tile__buttons">
                            <a href="<?php echo base_url();?>/public/about/index/<?php echo $token??'';?>"><button class="btn-plain btn-small uppercase">Sobre</button></a>
                        </div>
                        <?php }?>
                    </div>
                
    </div>
</div>