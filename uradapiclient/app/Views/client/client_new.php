<div class="hero bg-indigo-100" style="border-radius:.25rem">
  <div class="hero-body u-text-left">
    <div class="row u-items-center">
      <div class="col">
      
      <h3 class="title text-gray-800">Registro</h3>
      <h6 class="subtitle font-normal font-alt text-gray-600">Registre seus dados para mais informações.</h6>

      <form id="formBasic" action="<?php echo base_url() . '/public/client/postdo/' . $token; ?>">

          <label for="name">Nome</label>
          <input type="text" id="name" name="name"><br><br>

          <label for="mail">e-mail</label>
          <input type="text" id="mail" name="mail"><br><br>

          <label for="phone">Fone</label>
          <input type ="tel" placeholder="(00) 00000-0000"
            pattern="\(\{2}) +\d{5}-\d{4}" required/>
          <br><br>
          
          <label for="password">Senha</label>
          <input type="password" id="password" name="password"><br><br>

          <label for="password_confirm">Confirme sua senha</label>
          <input type="password" id="password_confirm" name="password_confirm"><br><br>

          <label for="type_of">Tipo</label>
          <input type="combo" id="type_of" name="type_of"><br><br>


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
  console.log( 'Programando listner');
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    return false;
  });

</script>