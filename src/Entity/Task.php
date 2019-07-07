<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Form\FormInterface;

class Task
{

	/**
	  * @Assert\NotBlank(groups={"Task"})
      */
    protected $task;
	
	/**
	  * @ORM\Column(type="text")
	  * @Assert\NotBlank(message="ala ma kota", groups={"Opis"})
      */
	protected $opis;

    protected $dueDate;
	protected $wybieranie;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

	public function getOpis()
    {
        return $this->opis;
    }
	
	public function setOpis($opis)
    {
        $this->opis = $opis;
    }
	
	public function getWybieranie()
    {
        return $this->wybieranie;
    }
	
	public function setWybieranie($wybieranie)
    {
        $this->wybieranie = $wybieranie;
    }
	
    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
	
	/** 
      * @param FormInterface $form 
      * @return array
      */
      public static function getValidationGroups(FormInterface $form)
      {
		 $groups =  [];
		 $formData = $form->getData();
		 
		 switch($formData->wybieranie){
			case '1':
				//validacja tasku
				$groups[] =  'Task';
				break;
			case '2':
				//validacja opisu
				$groups[] =  'Opis';
				break;
			case '3':
				//validacja tasku i opisu
				$groups[] =  'Task';
				$groups[] =  'Opis';
				break;
			case '4':
				//bez validacji
				$groups[] =  'Default';
				break;
			case '5':
				//bez validacji
				$groups[] =  'Default';
				$groups[] =  'Task';
				$groups[] =  'Opis';
				break;
		 }

         return $groups;
      }
	
	
}