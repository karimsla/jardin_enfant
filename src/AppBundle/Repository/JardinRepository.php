<?php

namespace AppBundle\Repository;

/**
 * JardinRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JardinRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchJardins($search)
    {
        $q=$this->getEntityManager()->createQuery("SELECT m from AppBundle:Jardin m where (m.name like :motcle)")
            ->setParameter('motcle','%'.$search.'%');
        return $query=$q->getResult();

    }
    public function getme($id){

        //liste jardin pour un parent donné dans lesquelles ses enfants sont inscrit
        $q=$this->getEntityManager()->createQuery("SELECT m from AppBundle:Jardin m join m.abonnements ab 
        Join  ab.enfant e 
          where e.parent=:id ")
            ->setParameter('id',$id);
        return $query=$q->getResult();
    }
    public function getsMontant($id)
    {
        $q=$this->getEntityManager()->createQuery("SELECT e.tarif from AppBundle:Jardin e where e.id=:id")
            ->setParameter('id',$id);
        return $query=$q->getResult();

    }

    public function getJardins()
    {
        $q=$this->getEntityManager()->createQuery("SELECT e.name from AppBundle:Jardin e ");
        return $query=$q->getResult();

    }
}

