<?php
// source: C:\xampp\htdocs\trasy-reseni\app\presenters/templates/Trasy/list.latte

use Latte\Runtime as LR;

class Template39d2648a50 extends Latte\Runtime\Template
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
		if (isset($this->params['trasa'])) trigger_error('Variable $trasa overwritten in foreach on line 19');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['nazev'])) ?>">Název trasy</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['delka DESC'])) ?>">Délka</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['prevyseni DESC'])) ?>">Převýšení</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['znaceni'])) ?>">Značení</a></th>
                        <th class="text-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list", ['narocnost'])) ?>">Náročnost</a></th>
                        <th class="text-center">Akce</th>
                    </tr>
                </thead>
                <tbody>
<?php
		$iterations = 0;
		foreach ($data as $trasa) {
?>                    <tr>
                        <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("view", [$trasa->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($trasa->nazev) /* line 20 */ ?></a></td>
                        <td class="text-right"><?php echo LR\Filters::escapeHtmlText($trasa->delka) /* line 21 */ ?> km</td>
                        <td><?php echo LR\Filters::escapeHtmlText($trasa->prevyseni) /* line 22 */ ?> m</td>
                        <td class="text-center"><?php echo LR\Filters::escapeHtmlText($trasa->znaceni) /* line 23 */ ?></td>
                        <td class="text-center"><?php echo LR\Filters::escapeHtmlText($trasa->narocnost) /* line 24 */ ?></td>
                        <td><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("update", [$trasa->id])) ?>"><span class="glyphicon glyphicon-pencil"></span> Upravit</a> 
                            | <a class="btn btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$trasa->id])) ?>"><span class="glyphicon glyphicon-remove-sign"></span> Smazat</a></td>
                    </tr>
<?php
			$iterations++;
		}
?>
                </tbody>
            </table>
            <p><a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("insert")) ?>"><span class="glyphicon glyphicon-plus-sign"></span> Nová trasa</a></p>
        </div>	
    </div>
</div>                                        
<?php
	}

}
