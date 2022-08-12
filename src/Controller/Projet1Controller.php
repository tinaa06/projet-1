<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployerType;
use App\Controller\Projet1Controller;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Projet1Controller extends AbstractController
{
    #[Route('/', name: 'app_projet1')]
    public function index(EmployesRepository $repo): Response
    {
        $employer = $repo->findAll();

        return $this->render('projet1/index.html.twig', [
            'tabEmployes' => $employer,
        ]);
    }

    #[Route("/new", name :"create")]
    #[Route("/edit/{id}", name :"edit")]

    public function form(Request $superglobals,EntityManagerInterface $manager, Employes $employer = null )
    {
        if( $employer == null)
        {
        $employer = new Employes;
        $employer->setPoste('dev');
        }    

        $form = $this->createForm(EmployerType::class, $employer);
        $form->handleRequest($superglobals);

        if($form->isSubmitted() && $form->isValid())
        {
            //date d'insertions
            $manager->persist($employer);
            $manager->flush();
            return $this->redirectToRoute('app_projet1',[
                'id' =>$employer->getId()
            ]);
        }

        return $this->renderForm("projet1/form.html.twig", [

            'formEmployes' => $form,
            'editMode'=> $employer->getId() !== null
        
           
        ]);
}
        
#[Route("/delete/{id}", name:"delete")]
public function delet(EntityManagerInterface $manager, $id, EmployesRepository $repo)
{

    $employer = $repo->find($id);

    $manager->remove($employer);
    $manager->flush();

    $this->addFlash('success', "Employer a bien été supprimé");
    

    return $this->redirectToRoute("app_projet1");
   
}




 


}