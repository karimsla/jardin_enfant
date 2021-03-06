<?php

namespace AppBundle\Repository;

/**
 * PartActiviteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartActiviteRepository extends \Doctrine\ORM\EntityRepository
{


    public function getsParticipation()
    {
        $q=$this->getEntityManager()->createQuery("SELECT m.date , c.typeact , e.nom from AppBundle:PartActivite m , AppBundle:Activite c , AppBundle:Enfant e where m.Activite=c.id and m.enfant=e.id")
           ;

        return $query=$q->getResult();

    }

    public function verifier($id, $ida){
        $q=$this->getEntityManager()->createQuery("SELECT m.date , a.id, e.id AS d from AppBundle:PartActivite m , AppBundle:Enfant e , AppBundle:Activite a where m.enfant=e.id and m.Activite=a.id and m.enfant=:id and m.Activite=:ida")
            ->setParameter('id',$id)
            ->setParameter('ida',$ida);

        return $query=$q->getResult();

    }
}
