<?php
// source: C:\xampp\htdocs\trasy-reseni\app\presenters/templates/Trasy/view.latte

use Latte\Runtime as LR;

class Template326c40459e extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
	<div class="col-md-12">
		<h2><?php echo LR\Filters::escapeHtmlText($trasa->nazev) /* line 7 */ ?></h2>
		<h5>Délka: <strong><?php echo LR\Filters::escapeHtmlText($trasa->delka) /* line 8 */ ?> km</strong>, převýšení: <strong><?php
		echo LR\Filters::escapeHtmlText($trasa->prevyseni) /* line 8 */ ?> m</strong>, 
                    značení: <strong><?php echo LR\Filters::escapeHtmlText($trasa->znaceni) /* line 9 */ ?></strong>, náročnost: <strong><?php
		echo LR\Filters::escapeHtmlText($trasa->narocnost) /* line 9 */ ?></strong></h5>
		<hr>
                <h3>Popis trasy</h3>
		<div><?php echo $trasa->popis /* line 12 */ ?></div>
		<p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list")) ?>">Zpět na seznam tras</a></p>
	</div>	
    </div>                
</div>
<?php
	}

}
