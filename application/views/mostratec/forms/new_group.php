<?php extract($data);?>
    <div class="container-fluid bd-example-row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name">Nome:</label> 
                      <input id="name" name="name" type="text" placeholder="nome do grupo" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="categoria">Categoria:</label>
                      <input id="categoria" name="categoria" type="text" placeholder="categoria do grupo" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="escola">Escola:</label>
                        <select id="escola" name="escola" class="form-control">
                          <?php foreach($new_group_modal_schools as $school){ ?>
                          <option value="<?= $school->id ?>"><?= $school->nome?></option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea class="form-control" type="textarea" id="description" name="description" placeholder="descrição"/></textarea>
                  </div>    
                </div>
            </form>
        </div>
    </div>