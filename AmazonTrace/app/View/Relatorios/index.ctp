<div class="cadastros index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Relatórios'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div>
                <?php foreach ($paginas_permitidas as $pagina): ?>
                    <div class="col-md-3 icon-menu-cadastros">
                        <?php echo '<a href="' . $pagina['Pagina']['url'] . '">
                                        <div>
                                            <span class="' . $pagina['Pagina']['class_icon'] . '"></span><br/>
                                            <b>' . $pagina['Pagina']['nome'] . '</b>
                                        </div>
                                    </a>';
                        ?>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</div><!-- end containing of content -->