<div class="cadastros index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Cadastros'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div>
                <?php foreach ($paginas_permitidas as $pagina): ?>
                    <div class="col-md-3 icon-menu-cadastros">
                       <?php echo '<a href="'.$pagina['Pagina']['url'].'">
                                        <div>
                                            <span class="'.$pagina['Pagina']['class_icon'].'"></span><br/>
                                            <b>'. utf8_encode($pagina['Pagina']['nome']).'</b>
                                        </div>
                                    </a>';
                       ?>
                        <?php /* echo '<a href="'.$pagina['Pagina']['url'].'"><div style="height: 50px; border: solid 1px darkgray;margin: auto; width: 190px; text-align: center;" class="btn btn-default">
                          <div style="bottom: 7px; position: absolute">'.$pagina['Pagina']['nome'].'</div>
                          </div></a>' */ ?>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</div><!-- end containing of content -->