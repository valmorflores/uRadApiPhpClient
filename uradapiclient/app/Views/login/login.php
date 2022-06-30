<div class="hero fullscreen">
            <div class="row p-0">
                <div class="col-6 p-0 level">
                    <div class="u-text-left w-100">
                        <form action="<?php echo base_url();?>/public/login/auth" method="post">
                        <div class="content">
                            <img src="<?php echo base_url();?>/public/logo.png" style="width:150px"></img>
                            <h4> </h4>
                            <?php if ($error==1){ ?>
                                    <div class="toast toast--danger">
                                        <button class="btn-close"></button>
                                        <p><?php echo $message; ?></p>
                                    </div>
                            <?php } ?>
                            <h6 class="font-alt">Digite seu usuário e senha para acessar</h6>
                            <p>Em caso de dúvida, contacte o setor responsável pelos acessos e solicite autorização para este serviço.</p>

                            <div class="divider"></div>

                            <div class="form-section">
                                <label>Usuário</label>
                                <div class="input-control">
                                    <input class="input-contains-icon" id="username" name="username" placeholder="Usuário" type="text" value="">
                                    <span class="icon">
                                        <i class="far fa-wrapper fa-user small"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-section">
                                <label>Senha (primeiro acesso use seu CPF)</label>
                                <div class="input-control">
                                    <input class="input-contains-icon" id="password" name="password" placeholder="Password" type="password" value="">
                                    <span class="icon">
                                        <i class="fas fa-wrapper fa-key small"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-section u-text-right">
                                <div class="m-1 u-inline-block">
                                    <button class="btn-info">
                                        Login
                                    </button>
                                </div>
                                <div class="m-1 u-inline-block">
                                    <button class="btn-light">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="h-100" style="background: url(./login.jpg); background-size: cover; background-position: center; box-shadow: inset 5px 0px 9px 1px #00000017; min-height: 300px;">
                    </div>
                </div>
            </div>
        </div>