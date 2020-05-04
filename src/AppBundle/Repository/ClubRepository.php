<?php

namespace AppBundle\Repository;

/**
 * ClubRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClubRepository extends \Doctrine\ORM\EntityRepository
{
    public function RechercheClub($search,$tri)
    {
        $q=$this->getEntityManager()->createQuery("SELECT m from AppBundle:Club m  where  (m.name like :motcle or m.description like :motcle) order by m.name ".$tri)
            ->setParameter('motcle','%'.$search.'%');

        return $query=$q->getResult();

    }

    public function getsClub()
    {
        $q=$this->getEntityManager()->createQuery("SELECT m.id , m.name , m.description , m.photo from AppBundle:Club m ");

        return $query=$q->getResult();

    }
}
