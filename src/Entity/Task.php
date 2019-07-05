<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

class Task
{
	
	
	/**
	  * @Assert\NotBlank(groups={"Default", "Cyclic"})
      */
    protected $task;
	
	/**
	  * @ORM\Column(type="text")
	  * @Assert\NotBlank(message="dffdfgdfg")
	  * @Assert\NotBlank(groups={"Cyclic"})
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
         $groups =  ['Default'];
         
         if ($form->getData()->getOpis) {
            $groups[] = 'Cyclic';
         }

         return $groups;
      }
	
	
}