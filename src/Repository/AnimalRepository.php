<?php

namespace App\Repository;

use App\Entity\Race;
use App\Entity\Image;
use App\Entity\Animal;
use App\Entity\Recherche;
use App\Entity\Typeanimal;
use App\Repository\RaceRepository;
use App\Repository\TypeanimalRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Animal>
 *
 * @method Animal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animal[]    findAll()
 * @method Animal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    public function save(Animal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Animal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Animal[] Returns an array of Animal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Animal
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function articleParSonIdUtilisateur($value): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.idUtilisateur = :val')
            ->setParameter('val', $value)
            ->Join(Image::class, 'i', 'WITH', 'a.idAnimal = i.idAnimal')
            ->addSelect('i.image')
            ->orderBy('i.idImage', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByTypeanimal($criteria): array
    {
        return $this->createQueryBuilder('a')
            ->Join(Race::class, 'i', 'WITH', 'a.idRace = i.idRace')
            // ->Join(Typeanimal::class, 'j', 'WITH', 'i.idTypeanimal = j.idTypeanimal')
            ->addSelect('i.idRace')
            ->where('i.idTypeanimal = :typeanimal')
            ->setParameter('typeanimal', $criteria[0])
            ->andWhere('a.isFeminin = :sexe')
            ->setParameter('sexe', $criteria['isFeminin'])
            ->andWhere('a.lofAnimal = :lof')
            ->setParameter('lof', $criteria['lofAnimal'])
            ->andWhere('a.idTaille = :taille')
            ->setParameter('taille', $criteria[['idTaille'][0]]->getIdTaille())
            ->andWhere('a.idTypepoils = :poils')
            ->setParameter('poils', $criteria[[['idTypepoils'][0]][0]]->getIdTypepoils())
            ->andWhere('a.idStatut = :statut')
            ->setParameter('statut', $criteria[['idStatut'][0]]->getIdStatut())
            ->getQuery()
            ->getResult()
        ;
    }

}