<?php

namespace AppBundle\Repository;

/**
 * RemarqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RemarqueRepository extends \Doctrine\ORM\EntityRepository
{

    public function getremarques($id)
    {
        $q=$this->getEntityManager()->createQuery("SELECT r.id,  ab.id as ab_id, tut.nom as tutnom,tut.prenom as tutprenom,
         r.description, r.date ,e.nom as enfantnom, e.prenom as enfantprenom
         
        from AppBundle:Parents p , AppBundle:Remarque r, AppBundle:Enfant e, AppBundle:Tuteur tut ,AppBundle:Abonnement ab
        where r.abonnement=ab.id AND ab.enfant=e.id AND e.parent=p.id AND r.tuteur=tut.id 
        
        AND e.parent=:id ")
            ->setParameter('id',$id);
        return $query=$q->getResult();



    }
}
