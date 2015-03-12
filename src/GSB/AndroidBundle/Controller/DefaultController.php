<?php

namespace GSB\AndroidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function connexionAction($matricule, $password) {
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('GSBAndroidBundle:Collaborateur');
        $result = $rp->findOneBy(array("colMatricule" => $matricule, "colMdp" => $password));
        $array = array("RESULT" => "REFUSED");
        if (is_object($result)) {
            if ($matricule === $result->getColMatricule() && $password === $result->getColMdp()) {
                $connection = $em->getConnection();
                $statement = $connection->prepare("SELECT TRA_ROLE FROM TRAVAILLER WHERE COL_MATRICULE = :colM");
                $statement->bindValue('colM', $result->getColMatricule());
                $statement->execute();
                $results = $statement->fetchAll();
                foreach ($results as $res) {
                    if ($res['TRA_ROLE'] === "Visiteur") {
                        $array = array("RESULT" => "ACCEPT", "MATRICULE" => $result->getColMatricule(), "NOM" => $result->getColNom(), "PRENOM" => $result->getColPrenom(), "MDP" => $result->getColMdp());
                    }
                }
            }
        }
        return new Response(json_encode($array));
    }

    public function listCRAction($year, $month, $matricule, $password) {
        $array = array();
        if ($this->verifyConnection($matricule, $password) == true) {
            $rp = $this->getDoctrine()->getManager()->getRepository('GSBAndroidBundle:RapportVisite');
            $result = $rp->findBy(array('colMatricule' => $matricule));
            foreach ($result as $res) {
                if ($res->getRapDate()->format('Y') == $year && $res->getRapDate()->format('m') == $month) {
                    array_push($array, array("NUM" => $res->getRapNum(),
                        "RAP_DATE" => $res->getRapDate()->format('d-m-Y'),
                        "DATE_VISITE" => $res->getDateVisite()->format('d-m-Y'),
                        "BILAN" => $res->getRapBilan(),
                        "COEFCONF" => $res->getCoefConf(),
                        "RAPLU" => $res->getRapEstLu(),
                        "NUMMOTIF" => $res->getRapMotif()->getMotNum(),
                        "LABELMOTIF" => $res->getRapMotif()->getMotLabel(),
                        "PRA_NUM" => $res->getPraNum()->getPraNum(),
                        "PRA_NOM" => $res->getPraNum()->getPraNom(),
                        "PRA_PRENOM" => $res->getPraNum()->getPraPrenom(),
                            "PRA_ADRESSE"=> $res->getPraNum()->getPraAdresse(),
                            "PRA_CP"=> $res->getPraNum()->getPraCp(),
                            "PRA_VILLE"=> $res->getPraNum()->getPraVille(),
                            "PRA_COEFN"=> $res->getPraNum()->getPraCoefnotoriete(),
                            "PRA_PROF"=> $res->getPraNum()->getTypCode()->getTypLibelle(),
                            "PRA_LIEU"=> $res->getPraNum()->getTypCode()->getTypLieu(),
                           ));
                }
            }
            if (empty($array)) {

                array_push($array, array("RESULT" => "NONE"));
            }
        } else {
            array_push($array, array("RESULT" => "NONE"));
        }
        return new Response(json_encode($array));
    }

    public function listMotif($matricule, $password) {
        $array = array();
        if ($this->verifyConnection($matricule, $password) == true) {
            $rp = $this->getDoctrine()->getManager()->getRepository('GSBAndroidBundle:Motif');
            $result = $rp->findAll();
            foreach ($result as $res) {
                array_push($array, array("NUM" => $res->getMotNum(),
                    "LABEL" => $res->getMotLabel()));
            }
        } else {
            array_push($array, array("RESULT" => "NONE"));
        }
        return $array;
    }

    public function listPraticien($matricule, $password) {
        $array = array();
        if ($this->verifyConnection($matricule, $password) == true) {
            $rp = $this->getDoctrine()->getManager()->getRepository('GSBAndroidBundle:Praticien');
            $result = $rp->findAll();
            foreach ($result as $res) {
                array_push($array, array("NUM" => $res->getPraNum(), "NOM" => $res->getPraNom(), "PRENOM" => $res->getPraPrenom()));
            }
        } else {
            array_push($array, array("RESULT" => "NONE"));
        }
        return $array;
    }

    public function listMedicamentAction($matricule, $password) {
        $array = array();
        if ($this->verifyConnection($matricule, $password) == true) {
            $rp = $this->getDoctrine()->getManager()->getRepository('GSBAndroidBundle:Medicament');
            $result = $rp->findAll();
            foreach ($result as $res) {
                array_push($array, array("DEPOTLEGAL" => $res->getMedDepotlegal(), "NOMCOMMERCIAL" => $res->getMedNomcommercial()));
            }
        } else {
            array_push($array, array("RESULT" => "NONE"));
        }
        return new Response(json_encode($array));
    }

    public function insertCRAction($matricule, $password) {
        if ($this->verifyConnection($matricule, $password) == true) {
            $request = $this->getRequest();
            $array = array();
            $objectCR = urldecode($request->request->get("CR"));
            $objectOffrir = urldecode($request->request->get("Echantillons"));
            $array2 = (array) json_decode($objectCR);
            $rp = $this->getDoctrine()->getManager();
            $repository = $rp->getRepository('GSBAndroidBundle:Collaborateur');
            $result = $repository->findOneBy(array("colMatricule" => $matricule, "colMdp" => $password));
            $repository1 = $rp->getRepository('GSBAndroidBundle:Praticien');
            $result2 = $repository1->findOneBy(array("praNum" => $array2['praNum']));
            $repository3 = $rp->getRepository('GSBAndroidBundle:Motif');
            $result3 = $repository3->findOneBy(array("motNum" => $array2['motif']));
            $cr = new \GSB\AndroidBundle\Entity\RapportVisite();
            $date = new \DateTime();
            $date->format('Y-m-d');
            $dateV = new \DateTime($array2['dateVisite']);
            $dateV->format('Y-m-d');
            $numMax = $this->getMaxRapNum();
            if ($array2['rapNum'] != $numMax) {
                $array2['rapNum'] = $numMax;
            }
            $cr->setColMatricule($result)
                    ->setRapNum($array2['rapNum'])
                    ->setDateVisite($dateV)
                    ->setPraNum($result2)
                    ->setCoefConf($array2['coefConf'])
                    ->setRapBilan($array2['rapBilan'])
                    ->setRapEstLu($array2['rapLu'])
                    ->setRapMotif($result3)
                    ->setRapDate($date);
            $rp->persist($cr);
            $rp->flush();
            $rpE = $rp->getRepository('GSBAndroidBundle:RapportVisite');
            $objectBDD = $rpE->find(array("colMatricule" => $matricule, "rapNum" => $array2['rapNum']));
            if ($objectBDD->getRapNum() == $array2['rapNum']) {
                $delegationToMedMethod = $this->insertOffrir($objectOffrir, $objectBDD, $matricule);
                if ($delegationToMedMethod == null) {
                    array_push($array, array("RESULT" => "SUCCESS"));
                } else {
                    array_push($array, array("RESULT" => $delegationToMedMethod));
                }
            } else {
                array_push($array, array("RESULT" => "ERROR [COMPTE-RENDU]"));
            }
        } else {
            array_push($array, array("RESULT" => "REFUSED"));
        }
        return new Response(json_encode($array));
    }

    public function insertOffrir($jsonObject, $rapport, $colMatricule) {
        $rp = $this->getDoctrine()->getManager();
        $objectA = json_decode($jsonObject);
        $objectArray = $objectA->Echantillon;
        $return = null;
        foreach ($objectArray as $singleObject) {
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('GSBAndroidBundle:Medicament');
            $resultMed = $rp->findOneBy(array("medDepotlegal" => $singleObject->medicament));
            $repository = $em->getRepository('GSBAndroidBundle:Collaborateur');
            $vis = $repository->findOneBy(array("colMatricule" => $colMatricule));
            $entity = new \GSB\AndroidBundle\Entity\Offrir();
            $entity->setColMatricule($vis)
                    ->setMedDepotlegal($resultMed)
                    ->setRapNum($rapport)
                    ->setOffQte($singleObject->quantite);
            $em->persist($entity);
            $em->flush();
            $rpE = $em->getRepository('GSBAndroidBundle:Offrir');
            $result = $rpE->find(array("colMatricule" => $singleObject->matricule, "medDepotlegal" => $singleObject->medicament, "rapNum" => $singleObject->rapNum, "offQte" => $singleObject->quantite));
            if (empty($result)) {
                $return = "ERROR [OFFRIR]";
            }
        }
        return $return;
    }

    public function getMaxRapNum() {
        $rp = $this->getDoctrine()->getManager()->getRepository('GSBAndroidBundle:RapportVisite');
        $result = $rp->findAll();
        $num = 0;
        foreach ($result as $res) {
            if ($res->getRapNum() > $num) {
                $num = $res->getRapNum();
            }
        }
        return $num + 1;
    }

    public function contentForCreateCRAction($matricule, $password) {
        $arrayPraticien = $this->listPraticien($matricule, $password);
        $arrayMotif = $this->listMotif($matricule, $password);
        $count = $this->getMaxRapNum();
        $array = array("COUNT_RAP" => $count, "PRA_LIST" => $arrayPraticien, "MOTIF_LIST" => $arrayMotif);
        return new Response(json_encode($array));
    }

    public function verifyConnection($matricule, $password) {
        $success = false;
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('GSBAndroidBundle:Collaborateur');
        $result = $rp->findOneBy(array("colMatricule" => $matricule, "colMdp" => $password));
        if (is_object($result)) {
            if ($matricule === $result->getColMatricule() && $password === $result->getColMdp()) {
                $success = true;
            }
            return $success;
        }
    }

}
