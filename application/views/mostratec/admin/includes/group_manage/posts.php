<br>
<?php if($this->session->flashdata("selected_tab") == "posts"){  ?>
<div class="tab-pane fade in active" id="posts">
<?php }else{ ?>
<div class="tab-pane fade" id="posts">
<?php } ?>
    <div class="col-lg-12">
        <div class="row">
            <?php foreach($posts as $post){ ?>
                <div class="row">    
                    <div class="col-lg-12">
                        <!--<div class="col-lg-10">-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $post->title ?>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-2">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <img class="img-responsive img-border img-full" src="<?= base_url('uploads/groups/posts/'.string_to_slug($post->title).'_'.$post->post_id.'/cover/'.$post->image)?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <?= $post->description ?>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <?php if($post->post_status == 1){ ?>
                                        <a href='<?= base_url("admin/grupos/posts/desativar/".$grupo->id."/".$post->post_id) ?>'>
                                            <button type="button" class="btn btn-info">
                                			      Desativar
                                			</button>
                            			 </a>
                            			 <?php }else{ ?>
                            			 <a href='<?= base_url("admin/grupos/posts/ativar/".$grupo->id."/".$post->post_id) ?>'>
                                			 <button type="button" class="btn btn-success">
                                			      Ativar
                                			 </button>
                            			 </a>
                            			 <?php } ?>
                            			 <a href='<?= base_url("admin/grupos/posts/deletar/".$grupo->id."/".$post->post_id) ?>'>
                                            <button type="button" class="btn btn-warning btn-circle confirmation">
                                			      <i class="fa fa-times"></i>
                                			 </button>
                            			 </a>
                        			 </div>
                                </div>
                                <div class="panel-footer">
                                    Postado em <b><?= sql_date_to_br($post->date) ?></b> por <b><?= $post->nome ?></b>
                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>