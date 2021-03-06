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

<?php echo view('client/client_script_js'); ?>