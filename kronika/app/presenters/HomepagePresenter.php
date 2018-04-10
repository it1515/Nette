<?php

namespace App\Presenters;

use Nette;
use App\Model\KurzyManager;
use Nette\Application\UI\Form;


class HomepagePresenter extends BasePresenter
{
        private $kurzyManager;
  
        function __construct(KurzyManager $kurzyManager) 
        {
                $this->kurzyManager = $kurzyManager;
        }
        
	public function renderDefault($order='nazev')
        {
		$this->template->data = $this->kurzyManager->readAll($order);
        }
        
        public function renderView($id) 
        {
                 $this->template->row = $this->kurzyManager->readOne($id);
        }
        
        public function actionDelete($id) 
        {
                $this->kurzyManager->delete($id);
                $this->flashMessage("Záznam byl úspěšně smazán");
                $this->redirect("Homepage:default");
        }
        
        public function renderInsert()
        {      
        }
        
        public function createComponentKurzyForm()
        {
                $form = new Form;

                $form->addText("nazev", "Titulek článku")
                     ->addRule(Form::MIN_LENGTH, "Titulek musí mít aspoň 5 znaků",5)
                     ->setRequired(TRUE);
                $jazyk = array("ANJ"=>"Angličtina",
                                "RUJ"=>"Ruština",
                                "SPJ"=>"Spanělština",
                                "NEJ"=>"Němčina"); 
                $form->addSelect("jazyk", "Jazyk", $jazyk)
                     ->setRequired(TRUE);
                $uroven = array("začátečníci"=>"začátečníci","pokročilí"=>"pokročilí");
                $form->addRadioList("uroven", "Úroveň", $uroven)
                     ->setRequired(TRUE);
                $form->addText("lektor", "Jméno lektora")
                     ->setRequired(TRUE);
                $form->addText("ucebna", "Označení učebny")
                     ->setRequired(TRUE);
                $form->addInteger("lekci","Počet lekcí")
                     ->setRequired(TRUE);
                $form->addSubmit("submit", "Odeslat");
                $form->onSuccess[] = array($this, "kurzyFormSucceeded");
                return $form;
        }
        
        public function kurzyFormSucceeded(Form $form, $values)                
        {
                  $data = $values;
                  $id_article = $this->getParameter('id');
                  if ($id_article) {
                      $this->kurzyManager->update($data, $id_article);  
                  } else {
                      $this->kurzyManager->insert($data);
                  }
                $this->redirect("Homepage:default");
        } 

}
