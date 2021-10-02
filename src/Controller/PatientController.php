<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Repository\DossierRepository;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="dossier_patient")
     */
    public function index(PatientRepository $repository ,DossierRepository $repository1) {
        $dossiers = $repository1->findAll();
        $patients = $repository->findAll();

        return $this->render('patient/index.html.twig', [
         'dossiers' => $dossiers,
         'patients' => $patients
        ]);
    }

    /**
     * @Route("/patient/{id}/", name="patient")
     */
    public function details(Patient $patient){
        return $this->render("patient/details.html.twig",[
            "patient"=>$patient
        ]);
    }
}
