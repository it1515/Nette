<?php
// source: C:\xampp\htdocs\zavody-reseni\app\presenters/templates/Startlist/view.latte

use Latte\Runtime as LR;

class Template8384ae0546 extends Latte\Runtime\Template
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
		<h2><?php echo LR\Filters::escapeHtmlText($runner->jmeno) /* line 7 */ ?> <?php echo LR\Filters::escapeHtmlText($runner->prijmeni) /* line 7 */ ?> (<?php
		echo LR\Filters::escapeHtmlText($runner->stat) /* line 7 */ ?>)</h2>
                <p>Datum narození: <strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $runner->narozeni, '%d. %m. %Y')) /* line 8 */ ?></strong></p>
                <p>Výkon: <strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $runner->vykon, '%h:%i:%s')) /* line 9 */ ?></strong></p>
		<hr>
                <h3>Kariéra</h3>
		<div><?php echo $runner->kariera /* line 12 */ ?></div>
		<p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("list")) ?>">Zpět na seznam závodníků</a></p>
	</div>	
    </div>                
</div>
<?php
	}

}
