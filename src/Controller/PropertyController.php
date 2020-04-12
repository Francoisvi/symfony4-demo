<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PropertyController extends AbstractController 
{

    /** 
     * @var PropertyRepository
     */
    private $repository;
    
    /** 
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index() : Response 
    {
        //afficher
        /*
        $property = $this->repository->findAllVisible();
        dump($property);
        $this->em->flush();
        */
        
        
        
        
        /*
        //inserer
        $property = new Property();
        $property->setTitle('Mon premier bien')
        ->setPrice('200000')
        ->setRooms(4)
        ->setBedrooms(3)
        ->setDescription('Une petite description')
                ->setSurface(60)
                ->setFloor(4)
                ->setHeat(1)
                ->setCity('Argonay')
                ->setAddress('75 allée de la Seigneurie')
                ->setPostalCode('74370');

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();
        */


        return $this->render('property/index.html.twig', [
                'current_menu' => 'properties'
            ]    
        );
    }
    
    /**
     *
     * @param  Property $property
     * @return Response
     */
    public function show(Property $property, $slug) : Response 
    {
        if($property->getSlug() !== $slug)
        {
            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }

        return $this->render('property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]    
        );
    }
    
}

?>