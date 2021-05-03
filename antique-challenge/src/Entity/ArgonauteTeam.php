<?php

namespace App\Entity;

use App\Repository\ArgonauteTeamRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArgonauteTeamRepository::class)
 */
class ArgonauteTeam
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La valeur {{ value }} n'est pas une saisie valide."
     * )
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}


//    {# //  * @Assert\Type(
//     //  * type="alpha",
//     //  * message="La valeur {{ value }} n'est pas une saisie valide."
//     //  * ) #}



    // * @Assert\Type(
    //     * type={"alpha","punct"}
    //     * message="La valeur {{ value }} n'est pas une saisie valide."
    //     * )


    // *     pattern= "/^[[:punct:]]([a-zA-Z])\d+$/",
    // *     match=false,
    // *     message="La valeur {{ value }} n'est pas une saisie valide."