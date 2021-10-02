<?php

namespace App\Controller;

use App\Repository\DossierRepository;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche_identifiant", name="recherche_id")
     */

    public function index(PatientRepository $repository, Request $request)
    {
        $patients = $repository->findAll();

        if($request->isMethod("POST")){
            $id = $request->get('R_ID');
            $patients = $repository->findBy(
                array('id' => $id),
            );;
        }
        return $this->render('recherche/recherche_id.html.twig', [
         'patients' => $patients,
        ]);
    }

    /**
     * @Route("/recherche_nom", name="recherche_nom")
     */

    public function rechercheNom(PatientRepository $repository, Request $request)
    {
        $patients = $repository->findAll();

        if($request->isMethod("POST")){
            $nom = $request->get('R_nom');
            $patients = $repository->findBy(
                array('nom' => $nom),
            );;
        }
        return $this->render('recherche/recherche_nom.html.twig', [
         'patients' => $patients,
        ]);
    }

    /**
     * @Route("/recherche_prenom", name="recherche_prenom")
     */

    public function recherchePrenom(PatientRepository $repository, Request $request)
    {
        $patients = $repository->findAll();

        if($request->isMethod("POST")){
            $prenom = $request->get('R_prenom');
            $patients = $repository->findBy(
                array('prenom' => $prenom),
            );;
        }
        return $this->render('recherche/recherche_prenom.html.twig', [
         'patients' => $patients,
        ]);
    }
}
