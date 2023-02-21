<?php

namespace App\Repository;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Typeanimal;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Typeanimal>
 *
 * @method Typeanimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeanimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeanimal[]    findAll()
 * @method Typeanimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeanimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeanimal::class);
    }

    public function save(Typeanimal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Typeanimal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Typeanimal[] Returns an array of Typeanimal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Typeanimal
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function filtrerPourLaRecherche($criteria): array{
        return $this->createQueryBuilder('a')
            ->Join(Race::class, 'i', 'WITH' , 'a.idTypeanimal = i.idTypeanimal')
            ->Join(Animal::class, 'j', 'WITH' , 'i.idRace = j.idRace')
            ->where('a.idTypeanimal = :typeanimal')
            ->setParameter('typeanimal' , $criteria[0])
            // ->where('j.isFeminin = :isFeminin')
            // ->setParameter('isFeminin' , $criteria['isFeminin'])
            // ->where('j.lofAnimal = :lofAnimal')
            // ->setParameter('lofAnimal' , $criteria['lofAnimal'])
            // ->where('j.idTaille = :idTaille')
            // ->setParameter('idTaille' , $criteria['idTaille'])
            // ->where('j.idTypepoils = :idTypepoils')
            // ->setParameter('idTypepoils' , $criteria['idTypepoils'])
            // ->where('j.idStatut = :idStatut')
            // ->setParameter('idStatut' , $criteria['idStatut']);
            ->getQuery()
            ->getResult()
            ;
        }
}
