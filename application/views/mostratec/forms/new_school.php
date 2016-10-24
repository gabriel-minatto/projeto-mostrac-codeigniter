    <div class="container-fluid bd-example-row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name">Nome:</label>
                      <input id="name" name="name" type="text" placeholder="nome da escola" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="cidade">Cidade:</label>
                      <input id="cidade" name="cidade" type="text" placeholder="cidade da escola" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="rede">Rede de Ensino:</label>
                        <select id="rede" name="rede" class="form-control">
                          <option value="particular">Particular</option>
                          <option value="estadual">Estadual</option>
                          <option value="municipal">Municipal</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>