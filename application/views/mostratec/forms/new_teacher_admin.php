<?php extract($data);?>
    <div class="container-fluid bd-example-row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name">Nome:</label> 
                      <input id="name" name="name" type="text" placeholder="nome do usuario" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input id="email" name="email" type="email" placeholder="informe um email válido" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="senha">Senha:</label> 
                      <input id="senha" name="senha" type="password" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="type">Tipo:</label>
                        <select id="type" name="type" class="form-control">
                          <option value="teacher">Professor</option>
                          <?php if(is_admin()){ ?>
                          <option value="admin">Administrador</option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <!--<div class="row">-->
                    <!-- Text input-->
                <!--    <div class="form-group">-->
                <!--        <input id="terms" name="terms" type="checkbox" value='1' required="">-->
                <!--        <label for="terms">-->
                <!--            Li e concordo com os -->
                <!--            <a href="<//?= base_url('uploads/termos/terms.txt') ?>">-->
                <!--                termos-->
                <!--            </a>-->
                <!--            da Fundação Liberato.-->
                <!--        </label> -->
                <!--    </div>-->
                <!--</div>-->
            </form>
        </div>
    </div>