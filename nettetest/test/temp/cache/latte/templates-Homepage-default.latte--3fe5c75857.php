<?php
// source: D:\www\kornika-test\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template3fe5c75857 extends Latte\Runtime\Template
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
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 17');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h2>Startovní listina</h2>
<br>
<div>
    <table class="table table-bordered">
       <thead>
        <tr>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['jmeno'])) ?>">Jméno</a></th>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['narozeni'])) ?>">Ročník narození</a></th>
            <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['stat'])) ?>">Stát</a></th>
            <th>Akce</th>
        </tr>    
       </thead>
       <tbody>    
<?php
		$iterations = 0;
		foreach ($data as $row) {
?>
        <tr>
            <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:view", [$row->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($row->jmeno) /* line 19 */ ?> <?php echo LR\Filters::escapeHtmlText($row->prijmeni) /* line 19 */ ?></a></td>
            <td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $row->narozeni, 'Y')) /* line 20 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($row->stat) /* line 21 */ ?></td>
            <td><a 
                   class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:update", [$row->id])) ?>">Upravit</a>
                   |
                <a 
                   class="btn btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:delete", [$row->id])) ?>">Smazat</a>
            </td>          
        </tr>    
<?php
			$iterations++;
		}
?>
        </tbody>
    </table>   
    <p><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:insert")) ?>">Přidat běžce</a></p>  
</div><?php
	}

}
