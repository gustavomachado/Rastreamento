<div class="logs view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Log'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Usuário Responsável'); ?></th>
                        <td style="width: 210px;">
                            <?php echo $this->Html->link($log['Usuario']['id'] . ' - ' . $log['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $log['Usuario']['id'])); ?>
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Data'); ?></th>
                        <td>
                            <?php echo h(date('d/m/Y H:i:s', strtotime($log['Log']['created']))); ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Ação'); ?></th>
                        <td style="width: 210px;">
                            <?php echo h($log['Log']['acao']); ?>
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Tabela'); ?></th>
                        <td>
                            <?php echo h($log['Log']['tabela']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Dispositivo'); ?></th>
                        <td style="width: 210px;">
                            <?php echo h($log['Log']['dispositivo']); ?>
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Informação Adicional'); ?></th>
                        <td>
                            <?php echo h($log['Log']['informacao_adicional']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">                            
                            <h3><?php echo __('Dados'); ?></h3>
                            <hr style="margin-top: 0px; margin-bottom: 5px">
                            <?php
                            foreach (json_decode($log['Log']['dados']) as $k => $valueJson) {
                                foreach ($valueJson as $key => $value) {
                                    if ($key == 'created') {
                                        $key = 'Data';
                                    } else {
                                        $key = str_replace('_', ' ', $key);
                                    }
                                    ?>
                                    <div class="col-md-3">
                                        <?php
                                        $isVerbo = in_array(substr($key, -2), array('ar', 'ir', 'er'));
                                        if ($isVerbo) {
                                            ($value == 1) ? $value = 'Sim' : $value = 'Não';
                                        }
                                        echo $this->Form->input($key, array('class' => 'form-control', 'value' => $value));
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

