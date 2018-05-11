<div class="row">
    <div class="col-3">
        <h1><?=$header;?></h1>
        <p><?=$text;?></p>
        <?php if ($debug): ?>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Exception class</th>
                    <td><?=get_class($exception);?></td>
                </tr>
                <tr>
                    <th>message</th>
                    <td><?=implode('<br>', explode(PHP_EOL, $exception->getMessage()));?></td>
                </tr>
                <tr>
                    <th>File : Line</th>
                    <td>
                        <?=str_replace(HOME, 'home:', $exception->getFile());?>
                        : <?=$exception->getLine();?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File:line</th>
                </tr>
                <tr>
                    <th>Cmd</th>
                    <th>Args</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($exception->getTrace() as $key => $line) : ?>
                <tr>
                    <th><?=$key;?></th>
                    <td><?=str_replace(HOME, 'home:', $line['file']).' : '.$line['line'];?></td>
                </tr>
                <tr>
                    <td>
                        <?=($line['class'] ?? '').($line['type'] ?? '').($line['function'] ?? '');?>
                    </td>
                    <td>
                        <?php if ($line['args']) : ?>
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <?php foreach ($line['args'] as $key => $value) : ?>
                                <tr>
                                    <th><?=$key;?></th>
                                    <td>
                                        <pre>
<?php var_dump($value);?>
                                        </pre>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
