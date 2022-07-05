<div class="hero bg-indigo-100" style="border-radius:.25rem">
  <div class="hero-body u-text-left">
    <div class="row u-items-center">
      <div class="col">
      
      <h3 class="title text-gray-800">Registro</h3>
      <h6 class="subtitle font-normal font-alt text-gray-600">Registre seus dados para mais informações.</h6>

      <form id="formBasic" action="<?php echo base_url() . '/public/client/postdo/' . $token; ?>">


      <div class="input-container international nivel_conhecimento">
						<label class="input-label" for="nivel_conhecimento">Qual a situação de seu atendimento?</label>
						<div class="international-radio">
							<input id="iniciante" class="nivel-conhecimento" type="radio" name="nivel_conhecimento" checked="" value="1" required="required">
							<label class="input-radio" for="iniciante">Primeiro acesso</label>
						</div>
						<div class="international-radio">
							<input id="avancado" class="nivel-conhecimento" type="radio" name="nivel_conhecimento" value="2" required="required">
							<label class="input-radio" for="avancado">Já sou paciente</label>
						</div>	
					</div>

          <label for="name">Nome</label>
          <input type="text" id="name" name="name"><br>
          <small id="msg_name" class="u-none tag tag--danger text-light red-700">Preencha o nome</small><br>

          <label for="mail">e-mail</label>
          <input type="text" id="mail" name="mail"><br>
          <small id="msg_mail" class="u-none tag tag--danger text-light red-700">Preencha com um e-mail válido</small><br>

          <label for="phone">Fone</label>
          <input type ="tel" id="phone" placeholder="(00) 00000-0000"
            pattern="\(\{2}) +\d{5}-\d{4}" required/><br>
          <small id="msg_phone" class="u-none tag tag--danger text-light red-700">Preencha um telefone válido</small><br>
                   
          <label for="password">Senha</label>
          <input type="password" id="password" name="password"><br>
          <small id="msg_password" class="u-none tag tag--danger text-light red-700">Crie uma senha segura e repita a seguir</small><br>

          <label for="password_confirm">Confirme sua senha</label>
          <input type="password" id="password_confirm" name="password_confirm"><br>
          <small id="msg_password_confirm" class="u-none tag tag--danger text-light red-700">Repita a senha idêntica a que você criou acima</small><br>
        <br>  
          <input type="submit" value="Enviar">
        </form>      
      </div>
    </div>
  </div>
</div>


<script>
  /*
    SUBMIT : Listner information submit
  */
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
    let lErro = false;
    let cUrl = '<?php echo base_url();?>/public/client/record_by_email/' + mail.value + '/<?php echo $token; ?>';
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