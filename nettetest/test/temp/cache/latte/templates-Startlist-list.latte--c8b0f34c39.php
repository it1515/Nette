<?php
// source: C:\xampp\htdocs\zavody-reseni\app\presenters/templates/Startlist/list.latte

use Latte\Runtime as LR;

class Templatec8b0f34c39 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['runner'])) trigger_error('Variable $runner overwritten in foreach on line 19');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Startovní listina</h2>
            <hr>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['prijmeni'])) ?>">Jméno</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['narozeni'])) ?>">Ročník narození</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['stat'])) ?>">Stát</a></th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
<?php
		$iterations = 0;
		foreach ($data as $runner) {
?>                    <tr>
                        <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("view", [$runner->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $runner->prijmeni)) /* line 20 */ ?>, <?php
			echo LR\Filters::escapeHtmlText($runner->jmeno) /* line 20 */ ?></a></td>
                        <td class="text-center"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $runner->narozeni, '%Y')) /* line 21 */ ?></td>
                        <td class="text-center"><?php echo LR\Filters::escapeHtmlText($runner->stat) /* line 22 */ ?></td>
                        <td><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("update", [$runner->id])) ?>"><span class="glyphicon glyphicon-pencil"></span> Upravit</a> 
                            | <a class="btn btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$runner->id])) ?>"><span class="glyphicon glyphicon-remove-sign"></span> Smazat</a></td>
                    </tr>
<?php
			$iterations++;
		}
?>
                </tbody>
            </table>
            <p><a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("insert")) ?>"><span class="glyphicon glyphicon-plus-sign"></span> Přidat běžce</a></p>
        </div>	
    </div>
</div>                                        
<?php
	}

}
