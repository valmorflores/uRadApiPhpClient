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

<script>
// Get all the nav-btns in the page
let navBtns = document.querySelectorAll('.nav-btn');

// Add an event handler for all nav-btns to enable the dropdown functionality
navBtns.forEach(function (ele) {
    ele.addEventListener('click', function() {
        // Get the dropdown-menu associated with this nav button (insert the id of your menu)
        let dropDownMenu = document.getElementById('MENU_ID_HERE');

        // Toggle the nav-btn and the dropdown menu
        ele.classList.toggle('active');
        dropDownMenu.classList.toggle('active');
    });
});
</script>