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
}
