<div class="veiculos index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Veiculos Cliente: ' . $nome_cliente);
                    echo $this->Html->link('<span class="flaticon-add180"></span>', array('action' => 'add', $id_cliente), array('escape' => false));
                    ?>
                </h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <?php ?>


    <div class="row">
        <div class="">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('placa'); ?></th>
                        <th><?php echo $this->Paginator->sort('tipo_veiculo'); ?></th>
                        <th><?php echo $this->Paginator->sort('marca'); ?></th>
                        <th><?php echo $this->Paginator->sort('modelo'); ?></th>
                        <th><?php echo $this->Paginator->sort('cor'); ?></th>
                 <!--        <th><?php echo $this->Paginator->sort('ano_fabricacao'); ?></th>
                        <th><?php echo $this->Paginator->sort('ano_modelo'); ?></th> -->
                      
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($veiculos as $veiculo): ?>
                        <tr>
                            <td><?php echo h($veiculo['Veiculo']['placa']); ?>&nbsp;</td>
                            <td><?php echo h($veiculo['Veiculo']['tipo_veiculo']); ?>&nbsp;</td>
                            <td><?php echo h($veiculo['Veiculo']['marca']); ?>&nbsp;</td>
                            <td><?php echo h($veiculo['Veiculo']['modelo']); ?>&nbsp;</td>
                            <td><?php echo h($veiculo['Veiculo']['cor']); ?>&nbsp;</td>
                  <!--          <td><?php echo h($veiculo['Veiculo']['ano_fabricacao']); ?>&nbsp;</td>
                            <td><?php echo h($veiculo['Veiculo']['ano_modelo']); ?>&nbsp;</td> -->
                      
                            <td><?php echo h($veiculo['Veiculo']['status']); ?>&nbsp;</td>
                            <td class="actions">

                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'add', $id_cliente, $veiculo['Veiculo']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete',$id_cliente, $veiculo['Veiculo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $veiculo['Veiculo']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-11">
                    <p>
                        <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
                    </p>
                </div>
                <div class="col-md-1">
                    <?php echo $this->Html->link('Voltar',array('controller'=>'Clientes','action'=>'add',$id_cliente),array('class'=>'btn btn-default')); ?>
                </div>
            </div>
            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->