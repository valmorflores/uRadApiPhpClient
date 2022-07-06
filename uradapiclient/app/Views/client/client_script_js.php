
<script>
  /*
    SUBMIT : Listner information submit
  */
  
  /* Fiels */
  const form = document.getElementById('formBasic');
  const mail = document.getElementById('mail');
  const password = document.getElementById('password');
  const password_confirm = document.getElementById('password_confirm');
  const name = document.getElementById('name');
  const phone = document.getElementById('phone');
  // messages
  const msg_name = document.getElementById('msg_name');
  const msg_mail = document.getElementById('msg_mail');
  const msg_password = document.getElementById('msg_password');
  const msg_password_confirm = document.getElementById('msg_password_confirm');
  const msg_phone = document.getElementById('msg_phone');

  console.log( 'Programando listner');
  
  /*
  validate submit 
  */
  form.addEventListener('submit', (e) => {
    clearWarnings()
    lErro = false;
    if ( emailExists() ){
      lErro = true;
    }  
    if (phone.value.trim() == ''){
      phone.classList.add('input-error')
      msg_phone.classList.remove('u-none');
      lErro = true;
    }
    if (mail.value.trim() == ''){
      mail.classList.add('input-error')
      msg_mail.classList.remove('u-none');
      msg_mail.innerText = 'E-mail deve ser preenchido'
      lErro = true;
    }
    if (name.value.trim() == ''){
      name.classList.add('input-error')      
      msg_name.classList.remove('u-none');
      lErro = true;
    }
    if (!(password.value==password_confirm.value)){
      msg_password.classList.remove('u-none');
      msg_password_confirm.classList.remove('u-none');
      password.classList.add('input-error')
      password_confirm.classList.add('input-error')
      lErro = true;
    }
    if (lErro){
      e.preventDefault();
      return false;
    }
    else
    {
      return true;
    }
  });


  /*
  E-mail exists
  */
  function emailExists() {    
    /* Token from application defined */    
    const token = "<?php echo md5('ajksdkjaklda'.rand());?>";
    let lErro = false;
    let cUrl = '<?php echo base_url();?>/public/client/record_by_email/' + mail.value + '/' + token;
    console.log(cUrl);
    fetch(cUrl).then(function(response) {      
      return response.json();
    }).then(function(data) {
      console.log(data);
      if (data.data != null ){
        if (data.data[0].id>0){
            mail.classList.add('input-error')
            msg_mail.classList.remove('u-none')
            msg_mail.innerText = 'Já existe este e-mail no cadastro'
            console.log('Este e-mail já existe')
            lErro = true
            return true;
        }
        console.log(data.data);
      }
    }).catch(function(error) {
      console.log(error);
    });
    return lErro;
  }

  /*
  Clear fields for default state
  */
  function clearWarnings(){
    password.classList.remove('input-error')
    password_confirm.classList.remove('input-error')
    phone.classList.remove('input-error')
    mail.classList.remove('input-error')
    name.classList.remove('input-error')
    msg_name.classList.add('u-none');
    msg_password.classList.add('u-none');
    msg_password_confirm.classList.add('u-none');
    msg_mail.classList.add('u-none');
    msg_name.classList.add('u-none');
    msg_phone.classList.add('u-none');
  }


</script>