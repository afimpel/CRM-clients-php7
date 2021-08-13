<?php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ClientRepository")
 * @Entity @Table(name="clients")
 */
class Clients
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var integer
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $lastname;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @ManyToOne(targetEntity="GroupClient")
     */
    protected $groupClient;

    /**
     * @Column(type="text")
     * @var string
     */
    protected $observations;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGroupClient()
    {
        return $this->groupClient;
    }

    public function setGroupClient($groupClient)
    {
        $this->groupClient = $groupClient;
    }

    public function getObservations()
    {
        return $this->observations;
    }

    public function setObservations($observations)
    {
        $this->observations = $observations;
    }
    


}

class ClientRepository extends EntityRepository
{
	public function getLists($number = 30)
    {
        $dql = "SELECT c.id as DT_RowId, c.name, c.lastname, c.email, c.observations, gc.name as groupClient FROM clients c JOIN groupClient gc ON (gc.id = c.groupClient_id)";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();
    }
}