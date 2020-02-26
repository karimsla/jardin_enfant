<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * MessagesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessagesRepository extends \Doctrine\ORM\EntityRepository
{
    public function getmessages($id)
    {
        $q=$this->getEntityManager()->createQuery("SELECT m from AppBundle:Parents p , AppBundle:Messages m where m.parent=p AND m.parent=:id ")
            ->setParameter('id',$id);
        return $query=$q->getResult();


    }
    public function getallmess($id)
    {
        $q=$this->getEntityManager()->createQuery("SELECT m from AppBundle:Messages m 
         LEFT JOIN m.parent p where m.date in(select MAX(l.date) from AppBundle:Messages l Group by l.parent) AND  m.jardin=:id   ORDER BY m.date DESC 
            ")->setParameter('id',$id);

        return $query=$q->getResult();


    }

}
