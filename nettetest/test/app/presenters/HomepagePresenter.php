<?php

namespace App\Presenters;

use Nette;
use App\Model\ZavodManager;
use Nette\Application\UI\Form;


class HomepagePresenter extends BasePresenter
{

	private $zavodManager;
  
        function __construct(ZavodManager $zavodManager) 
        {
                $this->zavodManager = $zavodManager;
        }
        
        public function renderDefault($order='jmeno')
        {
		$this->template->data = $this->zavodManager->readAll($order);
        }
        
        public function renderView($id) 
        {
                 $this->template->row = $this->zavodManager->readOne($id);
                 $article = $this->zavodManager->readOne($id);
                 if (!$article) {
                  $this->error('Příspěvek nebyl nalezen');
                }
                $article=$article->toArray();
                 $article['narozeni']=$article['narozeni']->format('j.n.Y');
        }
        
        public function actionDelete($id)
        {
                $this->zavodManager->delete($id);
                $this->flashMessage("Delete");
                $this->redirect("Homepage:default");
        }
        
        public function renderInsert()
        {      
        }
        
        public function renderUpdate($id)
        {      
                $article = $this->zavodManager->readOne($id);
                if (!$article) {
                  $this->error('Příspěvek nebyl nalezen');
                }
                $article=$article->toArray();
                // úprava času do požadovaného formátu
                $article['vykon']=$article['vykon']->format('%h:%I:%S');
                $article['narozeni']=$article['narozeni']->format('j.n.Y');
                $this['zavodForm']->setDefaults($article);
        }
        
        public function createComponentZavodForm()
        {
                $form = new Form;

                $form->addText("jmeno", "Jméno běžce")
                     ->setRequired(TRUE);
                $form->addText("prijmeni", "Příjmení běžce")
                     ->setRequired(TRUE);
                $stat = array("Česká republika"=>"Česká republika",
                                "Slovensko"=>"Slovensko",
                                "Maďarsko"=>"Maďarsko",
                                "Polsko"=>"Polsko"); 
                $form->addSelect("stat", "Stát", $stat)
                     ->setRequired(TRUE);
                $form->addText("narozeni", "Datum narození")
                     ->setAttribute('type','date')
                     ->setRequired(TRUE);
                $form->addText("kariera", "Kariéra")
                     ->setRequired(TRUE);
                $form->addText("vykon", "Výkon")
                     ->addRule(Form::PATTERN, 'Musí obsahovat čas v h:mm:ss', '[0-9]:[0-9][0-9]:[0-9][0-9]')
                     ->setRequired(TRUE);
                $form->addSubmit("submit", "Odeslat");
                $form->onSuccess[] = array($this, "zavodFormSucceeded");
                return $form;
        }
        
        public function zavodFormSucceeded(Form $form, $values)                
        {
                  $data = $values;
                  $id_article = $this->getParameter('id');
                  if ($id_article) {
                      $this->zavodManager->update($data, $id_article);  
                  } else {
                      $this->zavodManager->insert($data);
                  }
                $this->redirect("Homepage:default");
        }

}
